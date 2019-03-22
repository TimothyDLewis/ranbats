<?php

namespace RanBats\Http\Controllers;

use Sentinel;

use RanBats\Http\Controllers\Controller;
use RanBats\Classes\RecordFetcher;
use Illuminate\Http\Request;

use RanBats\Classes\FeedbackObject;

class SeriesController extends Controller {
	private $recordFetcher = null;

	public function __construct(){
		$this->recordFetcher = new RecordFetcher();
	}

	private function constructWiths($additional = []){
		$user = Sentinel::getUser();

		$showAdminControls = false;
		if($user && ($user->inRole("superuser") || $user->inRole("admin"))){
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

	public function getCreate(){
		$games = $this->recordFetcher->getGames();

		return view("series.create")->with($this->constructWiths([
			"games" => $games
		]));
	}

	public function postCreate(Request $request){

	}

	public function getDetail($seriesSlug){
		$standingsSort = session()->get("standingsSort", "points");
		$standingsOrder = session()->get("standingsOrder", "DESC");

		$series = $this->recordFetcher->getSeriesBySlug($seriesSlug, ["game", "tournaments", "entrants" => function($subQuery) use($standingsSort, $standingsOrder){
			$subQuery->with(["tournaments"])->orderBy($standingsSort, $standingsOrder)->orderBy("name");
		}]);

		if(!$series){
			$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Unable to Find Series from Slug <strong>".$seriesSlug."</strong>.<br/>Please try again.");
			return redirect("/series")->with(["feedback" => $feedback]);
		}

		$showTieBreakers = $series->tournaments->first(function($tournament){
			return $tournament->format == "round_robin";
		}) != null;

		return view("series.detail")->with($this->constructWiths([
			"series" => $series,
			"showTieBreakers" => $showTieBreakers,
			"standingsSort" => $standingsSort,
			"standingsOrder" => $standingsOrder
		]));
	}

	public function postDetail(Request $request, $seriesSlug){
		$series = $this->recordFetcher->getSeriesBySlug($seriesSlug);
		if(!$series){
			$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Unable to Find Series from Slug <strong>".$seriesSlug."</strong>.<br/>Please try again.");
			return redirect("/series")->with(["feedback" => $feedback]);
		}

		session()->put("standingsSort", $request->input("standingsSort", "name"));
		session()->put("standingsOrder", $request->input("standingsOrder", "DESC"));

		return redirect("/series/".$seriesSlug);
	}
}