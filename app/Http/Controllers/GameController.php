<?php

namespace RanBats\Http\Controllers;

use Sentinel;

use RanBats\Http\Controllers\Controller;
use RanBats\Classes\RecordFetcher;

use RanBats\Classes\FeedbackObject;

class GameController extends Controller {
	private $recordFetcher = null;

	public function __construct(){
		$this->recordFetcher = new RecordFetcher();
	}

	private function constructWiths($additional = []){
		$user = Sentinel::getUser();

		$showAdminControls = false;
		if($user && ($user->inRole("super-user") || $user->inRole("admin"))){
			$showAdminControls = true;
		}

		return array_merge($additional, [
			"showAdminControls" => $showAdminControls
		]);
	}

	public function getGames(){
		$games = $this->recordFetcher->getGames();

		return view("games.index")->with($this->constructWiths([
			"games" => $games
		]));
	}

	public function getDetail($slug){
		$game = $this->recordFetcher->getGameBySlug($slug);

		if(!$game){
			$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Unable to Find Game from Slug <strong>".$slug."</strong>.<br/>Please try again.");
			return redirect("/games")->with(["feedback" => $feedback]);
		}

		return view("games.detail")->with($this->constructWiths([
			"game" => $game
		]));
	}
}