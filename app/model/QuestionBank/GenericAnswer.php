<?php
class GenericAnswer{
	private $answer;
	
	public function __construct($answer){
		$this->answer=$answer;
	}

	public function getAnswer(){
		return $this->answer;
	}

	//@returnParam=boolean
	public function verifyAnswer($answer){
		if($answer==$this->answer)return true;
		return false;
	}

}

?>