<?php

namespace RanBats\Http\Controllers;

use RanBats\Http\Controllers\Controller;
use RanBats\Classes\RecordFetcher;

class DefaultController extends Controller {
	private $recordFetcher = null;

	public function __construct(){
		$this->recordFetcher = new RecordFetcher();
	}

	public function getIndex(){
		return view("index");
	}
}