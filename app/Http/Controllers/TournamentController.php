<?php

namespace RanBats\Http\Controllers;

use Sentinel;

use RanBats\Http\Controllers\Controller;
use RanBats\Classes\RecordFetcher;

use RanBats\Classes\FeedbackObject;

class TournamentController extends Controller {
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

	public function getCreateTournament($seriesSlug){
		$series = $this->recordFetcher->getSeriesBySlug($seriesSlug);

		if(!$series){
			$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Unable to Find Series from Slug <strong>".$slug."</strong>.<br/>Please try again.");
			return redirect("/series")->with(["feedback" => $feedback]);
		}

		return view("tournaments.create")->with($this->constructWiths([
			"series" => $series,
		]));
	}

	public function getDetail($seriesSlug, $tournamentSlug){
		$series = $this->recordFetcher->getSeriesBySlug($seriesSlug, ["tournaments" => function($subQuery) use($tournamentSlug){
			$subQuery->with(["entrants" => function($subSubQuery){
				$subSubQuery->orderBy("points", "DESC")->orderBy("name");
			}])->where("slug", "=", $tournamentSlug);
		}]);

		if(!$series){
			$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Unable to Find Series from Slug <strong>".$seriesSlug."</strong>.<br/>Please try again.");
			return redirect("/series")->with(["feedback" => $feedback]);
		} else if(count($series->tournaments) == 0){
			$feedback = new FeedbackObject("danger", "fa fa-times-circle", "Unable to Find Series from Slug <strong>".$tournamentSlug."</strong>.<br/>Please try again.");
			return redirect("/series/".$series->slug)->with(["feedback" => $feedback]);
		}

		return view("tournaments.detail")->with($this->constructWiths([
			"series" => $series,
			"tournament" => $series->tournaments->first()
		]));
	}
}