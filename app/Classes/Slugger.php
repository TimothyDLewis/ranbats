<?php 

namespace RanBats\Classes;

class Slugger {

	public function __construct(){}

	public function sluggify($text) {
		$text = str_replace("'", "", $text);
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		$text = preg_replace('~[^-\w]+~', '', $text);
		$text = trim($text, '-');
		$text = preg_replace('~-+~', '-', $text);
		$text = strtolower($text);

		if (empty($text)) {
			return null;
		}
		
		return $text;
	}

	public function filenameify($text){
		$text = str_replace("'", "", $text);
		$text = preg_replace('~[^\pL\d]+~u', '_', $text);
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		$text = preg_replace('~[^-\w]+~', '', $text);
		$text = trim($text, '_');
		$text = preg_replace('~-+~', '_', $text);
		$text = strtolower($text);

		if (empty($text)) {
			return null;
		}
		
		return $text;
	}
}