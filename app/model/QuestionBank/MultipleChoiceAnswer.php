<?php
	require_once("GenericAnswer.php");
	
	class MultipleChoiceAnswer extends GenericAnswer{
		private $answerA;
		private $answerB;
		private $answerC;
		private $answerD;

		public function __construct($answerA, $answerB, $answerC, $answerD, $correctAnswer){
			$this->answerA=$answerA;
			$this->answerB=$answerB;
			$this->answerC=$answerC;
			$this->answerD=$answerD;
			parent::__construct($correctAnswer);
		}

		public function getAnswerA(){
			return $this->answerA;
		}

		public function getAnswerB(){
			return $this->answerB;
		}

		public function getAnswerC(){
			return $this->answerC;
		}

		public function getAnswerD(){
			return $this->answerD;
		}
	}
?>