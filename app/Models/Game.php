<?php

namespace RanBats\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model {

	use SoftDeletes;

	protected $connection = "mysql";
	protected $table = "games";
	protected $primaryKey = "id";

	protected $dates = [
        "release_date"
    ];

	public function boxartSrc(){
		if($this->boxart){
			return url($this->boxart);
		}

		return url("/img/boxarts/no_boxart.gif");
	}

	public function renderPlatforms(){
		$html = "";
		foreach(explode(",", $this->platforms) AS $platform){
			$html .= '<span class="badge badge-secondary">'.__("lookups.platforms.".$platform)."</span>&nbsp;";
		}

		return $html;
	}
}