<?php
	// When a student attempts an Exam, all the Attempt information such as the answers provided by the student are stored here.
	class Attempt{
		private $studentUsername;
		private $examId;
		private $listOfAnswers; 

		public function __construct($studentUsername, $examId, $listOfAnswers){
			$this->studentUsername=$studentUsername;
			$this->examId=$examId;
			$this->listOfAnswers=$listOfAnswers;
		}

		public function getStudentUsername(){
			return $this->studentUsername;
		}

		public function getExamId(){
			return $this->examId;
		}

		public function getListOfAnswers(){
			return $this->listOfAnswers;
		}
	}

?>