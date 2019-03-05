<?php

namespace RanBats\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model {

	use SoftDeletes;

	protected $connection = "mysql";
	protected $table = "players";
	protected $primaryKey = "id";
	
	public function user(){
    	return $this->hasOne(User::class);
    }
}