<?php

namespace RanBats\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Series extends Model {

	use SoftDeletes;

	protected $connection = "mysql";
	protected $table = "series";
	protected $primaryKey = "id";

	public function returnStandingsTabs($showTieBreakers){
		$standingsTabs = ["points", "wins", "losses", "ties"];

		if($showTieBreakers){
			$standingsTabs = ["points", "wins", "tie_breakers", "losses", "ties"];
		} else {
			$standingsTabs = ["points", "wins", "losses", "ties"];
		}

		return $standingsTabs;
	}

	public function getStartDateAttribute(){
		if(count($this->tournaments) != 0){
			return Carbon::parse($this->tournaments->first()->date);
		}

		return null;
	}

	public function getEndDateAttribute(){
		if(count($this->tournaments) != 0){
			return Carbon::parse($this->tournaments->last()->date);
		}

		return null;
	}

	public function renderDateRange(){
		if($this->start_date){
			if($this->start_date == $this->end_date){
				return $this->start_date->format("M. jS, Y");
			} else {
				return $this->start_date->format("M. jS, Y").'<br/><em class="text-muted">to</em><br/>'.$this->end_date->format("M. jS, Y");;
			}
		} else {
			return '<em class="text-muted">Unavailable</em>';
		}
	}

	public function game(){
		return $this->belongsTo(Game::class);
	}

	public function tournaments(){
		return $this->hasMany(Tournament::class)->orderBy("date");
	}

	public function entrants(){
		return $this->belongsToMany(Player::class, "series_standings", "series_id", "player_id")
		->withPivot(["wins", "losses", "ties", "points", "tie_breakers"]);
	}
}