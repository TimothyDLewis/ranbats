<?php

namespace RanBats\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model {

	use SoftDeletes;

	protected $table = "games";

	public function boxartSrc(){
		if($this->boxart){
			return url($this->boxart);
		}

		return url("/img/boxarts/no_boxart.jpg");
	}
}