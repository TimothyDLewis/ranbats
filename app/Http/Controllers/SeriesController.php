<?php

namespace RanBats\Http\Controllers;

use Sentinel;

use RanBats\Http\Controllers\Controller;
use RanBats\Classes\RecordFetcher;

use RanBats\Classes\FeedbackObject;

class SeriesController extends Controller {
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

	public function getSeries(){
		$series = $this->recordFetcher->getSeries(["game", "tournaments", "entrants"]);

		return view("series.index")->with($this->constructWiths([
			"series" => $series
		]));
	}

	public function getDetail($slug){
		$series = $this->recordFetcher->getSeriesBySlug($slug, ["game", "tournaments", "entrants" => function($subQuery){
			$subQuery->with(["tournaments"])->orderBy("points", "DESC")->orderBy("name");
		}]);

		if(!$series){
			$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Unable to Find Series from Slug <strong>".$slug."</strong>.<br/>Please try again.");
			return redirect("/series")->with(["feedback" => $feedback]);
		}

		return view("series.detail")->with($this->constructWiths([
			"series" => $series
		]));
	}
}