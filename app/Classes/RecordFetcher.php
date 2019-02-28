<?php 

namespace RanBats\Classes;

use RanBats\Models\Event;
use Carbon\Carbon;

class RecordFetcher {

	private $currentTimestamp = null;

	public function __construct(){
		$this->currentTimestamp = Carbon::now();
	}
}