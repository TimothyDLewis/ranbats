<?php 

namespace RanBats\Classes;

use RanBats\Models\Game;
use Carbon\Carbon;

class RecordFetcher {

	private $currentTimestamp = null;

	public function __construct(){
		$this->currentTimestamp = Carbon::now();
	}

	public function getGames($withs = []){
		return Game::orderBy("name")->with($withs)->get();
	}

	public function getGameBySlug($slug, $withs = []){

		return Game::where("slug", "=", $slug)->with($withs)->first();
	}
}