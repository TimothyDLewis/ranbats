<?php

namespace RanBats\Http\Controllers;

use RanBats\Http\Controllers\Controller;
use RanBats\Models\User;

class EmailController extends Controller {
	private $environment = "";
	private $mailDriver = null;
	private $overrideEmail = null;
	private $admin = null;
	private $admins = [];

	public $response = [];

	public function __construct(){
		$this->environment = env("APP_ENV", "local");

		$this->mailDriver = env("MAIL_DRIVER", "log");
		if($this->environment == "local"){
			$this->overrideEmail = env("MAIL_LOCAL_EMAIL", null);

			if(!$this->overrideEmail){
				throw new \Exception("Local Email Not Configured");
			}
		}

		$this->response = (object)[
			"hasError" => false,
			"errorMessage" => "",
			"emailTemplate" => "",
			"includes" => [],
			"sendInfo" => (object)[]
		];
	}

	public function getMailDriver(){
		return $this->mailDriver;
	}
	
	public function setMailDriver($mailDriver){
		$this->mailDriver = $mailDriver;
	}

	public function getOverrideEmail(){
		return $this->overrideEmail;
	}
	
	public function setOverrideEmail($overrideEmail){
		$this->overrideEmail = $overrideEmail;
	}

	// Generic Emails - Password Reset
	public function sendPasswordReset($user, $reminder, $resetUrl, $byAdmin = false, $byApi = false){
		return $this->sendEmail("emails.auth.password-reset", ["user" => $user, "reminder" => $reminder, "resetUrl" => $resetUrl, "byAdmin" => $byAdmin, "byApi" => $byApi], (object)[ 
			"toAddress" => $this->determineEmail($user->email),
			"subject" => "Notice of Password Reset"
		]);
	}

	private function constructAdmins(){
		$this->admins = User::whereHas("roles", function($subQuery){ 
			$subQuery->where("slug", "=", "admin");
		})->get();

		$this->admin = $this->admins->first();

		if(count($this->admins) == 0 || !$this->admin){
			$this->response->hasError = true;
			$this->response->errorMessage = "Unable to determine Admin email and CC addresses.";
		}
	}

	private function determineEmail($email){
		if($this->overrideEmail){
			return $this->overrideEmail;
		}

		return $email;
	}

	private function determineCCAddresses($initial, $others){
		if($this->overrideEmail){
			return [];
		}

		$ccAddresses = [];
		foreach($others AS $other){
			if($initial->email != $other->email){
				$ccAddresses[] = $other->email;
			}
		}

		return $ccAddresses;
	}

	private function sendEmail($emailTemplate, $includes, $sendInfo){
		try {
			config()->set("mail.driver", $this->mailDriver);

			\Mail::send($emailTemplate, $includes, function($message) use($sendInfo){
				$message->to($sendInfo->toAddress);
				if(isset($sendInfo->ccAddresses) && is_array($sendInfo->ccAddresses)){
					$message->cc($sendInfo->ccAddresses);
				}
				$message->subject($sendInfo->subject);
			});
		} catch(\Exception $ex){
			\Log::error("Error in EmailController.php sendEmail() (Called from ".debug_backtrace()[1]["function"]."): ".$ex->getMessage()." in ".$ex->getFile()." at line ".$ex->getLine());
			$this->response->hasError = true;
			$this->response->errorMessage = $ex->getMessage();
		}

		$this->response->emailTemplate = $emailTemplate;
		$this->response->includes = $includes;
		$this->response->sendInfo = $sendInfo;

		return $this->response;
	}
}