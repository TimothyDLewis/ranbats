<?php 

namespace RanBats\Classes;

class FeedbackObject {

	public $class;
	public $icon;
	public $message;

	public function __construct($class, $icon, $message){
		$this->setClass($class);
		$this->setIcon($icon);
		$this->setMessage($message);

		$feedbackObject = (object)[
			"class" => $this->getClass(),
			"icon" => $this->getIcon(),
			"message" => $this->getMessage()
		];

		return $feedbackObject;
	}

	protected function setClass($class){
		$this->class = $class;
	}

	protected function setIcon($icon){
		$this->icon = $icon;
	}

	protected function setMessage($message){
		$this->message = $message;
	}

	protected function getClass(){
		return $this->class;
	}

	protected function getIcon(){
		return $this->icon;
	}

	protected function getMessage(){
		return $this->message;
	}

}