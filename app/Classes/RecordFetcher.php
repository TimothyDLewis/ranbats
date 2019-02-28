<?php 

namespace RanBats\Classes;

use RanBats\Models\Game;
use Carbon\Carbon;

class RecordFetcher {

	private $currentTimestamp = null;

	public function __construct(){
		$this->currentTimestamp = Carbon::now();
	}

	public function getGames(){
		return Game::orderBy("name")->get();
	}

	public function getGameBySlug($slug){
		return Game::where("slug", "=", $slug)->first();
	}
}