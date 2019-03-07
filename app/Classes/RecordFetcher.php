<?php 

namespace RanBats\Classes;

use Carbon\Carbon;

use RanBats\Models\Game;
use RanBats\Models\Series;

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

	public function getSeries($withs = []){
		return Series::orderBy("name")->with($withs)->get();
	}

	public function getSeriesBySlug($slug, $withs = []){
		return Series::where("slug", "=", $slug)->with($withs)->first();
	}
}