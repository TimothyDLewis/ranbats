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

	public function tournaments(){
		return $this->hasMany(Tournament::class)->orderBy("date");
	}

	public function entrants(){
		return $this->belongsToMany(Player::class, "series_standings", "series_id", "player_id")
		->withPivot(["wins", "losses", "ties", "points"]);
	}
}