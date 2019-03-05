<?php

namespace RanBats\Http\Controllers;

use Sentinel;
use Validator;
use Hash;
use Illuminate\Http\Request;

use RanBats\Http\Controllers\Controller;
use RanBats\Classes\RecordFetcher;
use RanBats\Classes\FeedbackObject;

use RanBats\Models\Player;

class AccountController extends Controller {
	private $recordFetcher = null;

	public function __construct(){
		$this->recordFetcher = new RecordFetcher();
	}

	private function constructWiths($additional = []){
		return array_merge($additional, [
			"user" => Sentinel::getUser()
		]);
	}

	public function getProfile(){
		$user = \Sentinel::getUser();
		$player = $user->player;

		return view("account.profile")->with($this->constructWiths([
			"player" => $player
		]));
	}

	public function postProfile(Request $request){
		$user = \Sentinel::getUser();
		$player = $user->player;

		$action = $request->input("action");
		if($action == "account"){
			$rules = [
				"email" => "required|email|unique:users,email,".$user->id.",id",
				"first_name" => "required",
				"last_name" => "required"
			];
		} else if($action == "password"){
			$rules = [
				"new_password" => "required|confirmed"
			];
		} else if($action == "player"){
			$nameRule = "required|unique:players,name";
			if($player){
				$nameRule .= ",".$player->id.",id";
			}

			$rules = [
				"name" => $nameRule
			];
		}

		$validator = Validator::make($request->all(), $rules);

		if($validator->passes()){
			if($action == "account"){
				$user->email = $request->input("email");
				$user->first_name = $request->input("first_name");
				$user->last_name = $request->input("last_name");
				$user->save();

				$feedback = new FeedbackObject("success", "fa fa-check-circle", "Account Settings Updated!");
				return redirect("/profile")->with(["feedback" => $feedback]);
			} else if($action == "password"){
				$user->password = Hash::make($request->input("new_password"));
				$user->save();

				$feedback = new FeedbackObject("success", "fa fa-check-circle", "Password Settings Updated!");
				return redirect("/profile")->with(["feedback" => $feedback]);
			} else if($action == "player"){
				$save = false;
				if(!$player){
					$player = new Player();
					$save = true;
				}

				$player->prefix = $request->input("prefix");
				$player->name = $request->input("name");

				$player->save();

				if($save){
					$user->player_id = $player->id;
					$user->save();
				}

				$feedback = new FeedbackObject("success", "fa fa-check-circle", "Player Settings Updated!");
				return redirect("/profile")->with(["feedback" => $feedback]);
			}
		} else {
			$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Please fix the errors below.");
			return redirect("/profile")->withErrors($validator)->withInput()->with(["feedback" => $feedback]);
		}
	}
}