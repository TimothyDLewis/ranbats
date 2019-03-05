<?php

namespace RanBats\Http\Controllers;

use RanBats\Http\Controllers\Controller;
use RanBats\Classes\RecordFetcher;

use RanBats\Classes\FeedbackObject;

class GameController extends Controller {
	private $recordFetcher = null;

	public function __construct(){
		$this->recordFetcher = new RecordFetcher();
	}

	private function constructWiths($additional = []){
		return array_merge($additional, [
			
		]);
	}

	public function getIndex(){
		$games = $this->recordFetcher->getGames();

		return view("games.index")->with(["games" => $games]);
	}

	public function getDetail($slug){
		$game = $this->recordFetcher->getGameBySlug($slug);

		if(!$game){
			$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Unable to Find Game from Slug <strong>".$slug."</strong>.<br/>Please try again.");
			return redirect("/games")->with(["feedback" => $feedback]);
		}

		return view("games.detail")->with(["game" => $game]);
	}
}