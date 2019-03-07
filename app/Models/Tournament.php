<?php

namespace RanBats\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tournament extends Model {

	use SoftDeletes;

	protected $connection = "mysql";
	protected $table = "tournaments";
	protected $primaryKey = "id";

	protected $dates = [
		"date"
	];

	public function series(){
		return $this->belongsTo(Series::class);
	}

	public function entrants(){
		return $this->belongsToMany(Player::class, "tournament_standings", "tournament_id", "player_id")
		->withPivot(["wins", "losses", "ties", "points"]);
	}
}