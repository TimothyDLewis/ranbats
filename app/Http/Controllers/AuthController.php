<?php

namespace RanBats\Http\Controllers;

use Sentinel;

use RanBats\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

use RanBats\Classes\FeedbackObject;

use RanBats\Models\User;
use RanBats\Models\Role;
use RanBats\Models\Reminder;

class AuthController extends Controller {
	private $emailController = null;

	public function __construct(Request $request){
		$this->emailController = app()->make(EmailController::class);
	}

	public function getRegister(){
		return view("auth.register");
	}

	public function postRegister(Request $request){
		$rules = [
			"email" => "required|email|unique:users,email",
			"first_name" => "required",
			"last_name" => "required",
			"password" => "required|confirmed"
		];

		$validator = \Validator::make($request->all(), $rules);

		if($validator->passes()){
			\DB::beginTransaction();

			try {
				$user = new User();

				$user->email = $request->input("email");
				$user->first_name = $request->input("first_name");
				$user->last_name = $request->input("last_name");
				$user->password = \Hash::make($request->input("password"));

				$user->save();

				$role = Role::where("slug", "=", "user")->first();
				$role->users()->attach($user, [
					"created_at" => date("Y-m-d H:i:s"),
					"updated_at" => date("Y-m-d H:i:s"),
				]);

				$activation = \Activation::create($user);
				\Activation::complete($user, $activation->code);
			} catch (\Exception $ex){
				\DB::rollBack();

				\Log::info("Error Regisering new User: ".$ex->getMessage()." in ".$ex->getFile()." at line ".$ex->getLine());
				$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Unable to Register new User.<br/>Please contact Support.");
				return redirect("/register")->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
			}

			\DB::commit();

			Sentinel::login($user);

			if($redirect = session()->get("loginRedirect")){
	        	session()->forget("loginRedirect");
	        	return redirect($redirect);
	        }

			$feedback = new FeedbackObject("success", "fa fa-check-circle", "New User registered!");
			return redirect("/")->with(["feedback" => $feedback]);
		} else {
			$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Please fix the errors below.");
			return redirect("/register")->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
		}
	}

	public function getLogin(){
		return view("auth.login");
	}

	public function postLogin(Request $request){

		$redirect = "/login";

		$rules = [
            "email" => "required|email",
            "password" => "required",
        ];

        $validator = \Validator::make($request->all(), $rules);

        if($validator->passes()){
        	$user = Sentinel::findUserByCredentials([
        		"email" => $request->input("email")
    		]);

    		$forceReset = false;

    		if(!$user){
                $feedback = new FeedbackObject("danger", "fa fa-times-circle", "Unable to find user with the supplied email address.<br/>Please check your email and try again.");
    			return redirect($redirect)->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
    		} else {
                if(!$user->isActivated()){
                    $feedback = new FeedbackObject("danger", "fa fa-times-circle", "User account is currently inactive.<br/>Please contact Support.");
                    return redirect($redirect)->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
                } else {
                    try {
                        $isAuthenticated = Sentinel::authenticate([
                            "email" => $request->input("email"),
                            "password" => $request->input("password")
                        ]);

                        if(!$isAuthenticated){
                            $feedback = new FeedbackObject("danger", "fa fa-times-circle", "Incorrect email and password combination.<br/>Please re-enter your email and/or password and try again.");
                            return redirect($redirect)->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
                        }
                    } catch (\CartalystSentinel\Checkpoints\ThrottlingException $te){
                        $string = $te->getDelay()." second".($te->getDelay() == 1 ? "" : "s");
                        $feedback = new FeedbackObject("danger", "fa fa-times-circle", "Suspicious activity has been detected and you have been denied access.<br/>Please try again in <b>".$string."</b>, or contact Support.");
                        return redirect($redirect)->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
                    } catch (\CartalystSentinel\Checkpoints\NotActivatedException $nae){
                        $feedback = new FeedbackObject("danger", "fa fa-times-circle", "Your account has not been activated.<br/>Please contact Support.");
                        return redirect($redirect)->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
                    }
                }
    		}

    		return redirect($redirect);
        } else {
            $feedback = new FeedbackObject("danger", "fa fa-times-circle", "Please fix the errors below.");
        	return redirect($redirect)->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
        }
	}

	public function getRemind(){
		return view("auth.remind");
	}

	public function postRemind(Request $request){

		$redirect = "/remind";
		$resetUrl = "/reset";

		$rules = [
            "email" => "required|email",
        ];

        $validator = \Validator::make($request->all(), $rules);

        if($validator->passes()){
        	$info = [
        		"email" => $request->input("email")
        	];

        	$user = Sentinel::findByCredentials($info);
        	if(!$user){
        		$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Unable to find user with that email address.");
    			return redirect($redirect)->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
    		} else {

    			// Remove older reminder records.
                $reminder = \Reminder::exists($user);
                if($reminder){
                    $reminder->delete();
                }

                // Create new reminder record
                $reminder = \Reminder::create($user);
    		}

    		try {
    			$this->emailController->sendPasswordReset($user, $reminder, $resetUrl);
    		} catch(\Exception $ex){
    			\Log::error("Error in postReminder() (sendPasswordReset()): ".$ex->getMessage()." in ".$ex->getFile()." at line ".$ex->getLine());
    		}

			if(env("APP_ENV") == "local"){
				return redirect($resetUrl."/".$reminder->code);
            } else {
                $feedback = new FeedbackObject("danger", "fa fa-times-circle", "Password reset email sent to <b>".$user->email."</b>.<br/>Please follow the link in the email to reset your password.");
            	return redirect("/remind")->with(["feedback" => $feedback]);
            }
        } else {
        	$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Please fix the errors below.");
        	return redirect($redirect)->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
        }
	}

	public function getReset($code){
		$check = Reminder::where("code", "=", $code)->first();

		if(!$check){
        	$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Unable to find password reset from supplied code.<br/>Please check your code and try again.");
        	return redirect("/")->with(["feedback" => $feedback]);
        } else {
            if($check->isExpired() || $check->isCompleted() ){
            	$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Supplied code is expired, completed or otherwise invalid. Please generate a new password reset code.");
            	return redirect("/")->with(["feedback" => $feedback]);
            }
        }

		return view("auth.reset");
	}

	public function postReset(Request $request, $code){

		$redirect = "/reset/".$code;
        $check = Reminder::where("code", "=", $code)->first();

        if(!$check){
        	$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Unable to find password reset from supplied code.<br/>Please check your code and try again.");
        	return redirect("/")->with(["feedback" => $feedback]);
        } else {
            if($check->isExpired() || $check->isCompleted() ){
            	$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Supplied code is expired, completed or otherwise invalid. Please generate a new password reset code.");
            	return redirect("/")->with(["feedback" => $feedback]);
            }
        }

        $rules = [
            "email" => "required|email",
            "password" => "required|confirmed",
        ];

		$validator = \Validator::make($request->all(), $rules);

        if($validator->passes()){
        	$user = Sentinel::findByCredentials([
        		"email" => $request->input("email")
    		]);

    		if(!$user){
    			$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Unable to find user with that email address.");
    			return redirect($redirect)->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
    		} else {
    			if($check->user->id !== $user->id){
    				$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Incorrect email supplied for reset token.");
    				return redirect($redirect)->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
    			} else {
	    			$validatedUser = Sentinel::validateCredentials($user, [
	    				"email" => $request->input("email"),
	    				"password" => $request->input("password")
					]);

					if($validatedUser){
						$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Please select a new password.");
						return redirect($redirect)->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
					} else {
						$reminder = \Reminder::complete($user, $code, $request->input("password"));
						if(!$reminder){
							$feedback = new FeedbackObject("danger", "fa fa-times-circle", "There was an error updating your password.<br/>Please contact an administrator.");
							return redirect($redirect)->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
						}
					}
				}
    		}

    		$user->last_login = Carbon::now();
    		$user->save();

    		Sentinel::login($user);

			$redirect = "/login";

            $feedback = new FeedbackObject("info", "fa fa-info-circle", "Password has been reset.<br/>You have been logged in.");
			return redirect($redirect)->with(["feedback" => $feedback]);
        } else {
        	$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Please fix the errors below.");
        	return redirect($redirect)->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
        }
	}

	public function anyLogout(){
		$user = Sentinel::getUser();

		if($user){
			$redirect = "/login";
			Sentinel::logout();
			return redirect($redirect);
		}

		return redirect("/login");
	}
}