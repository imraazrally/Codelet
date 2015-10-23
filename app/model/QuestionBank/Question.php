<?php
	class Question{
		private $id;
		private $instructorUsername;
		private $question;
		//@paramType=Answer
		private $answer;
		private $type;
		private $difficulty;

		public function __construct($instructorUsername, $question, $answer, $type, $difficulty){
			$this->setInstructorUsername($instructorUsername);
			$this->setQuestion($question);
			$this->setAnswer($answer);
			$this->setType($type);
			$this->setDifficulty($difficulty);
		}

		public function setId($id){
			$this->id=$id;
		}

		public function getId(){
			return $this->id;
		}

		public function setInstructorUsername($instructorUsername){
			$this->instructorUsername=$instructorUsername;
		}

		public function getInstructorUsername(){
			return $this->instructorUsername;
		}

		public function setQuestion($question){
			$this->question=$question;
		}

		public function getQuestion(){
			return $this->question;
		}

		public function setAnswer($answer){
			$this->answer=$answer;
		}

		public function getAnswer(){
			return $this->answer;
		}

		public function getSerializedAnswer(){
			return serialize($this->answer);
		}

		public function setType($type){
			$this->type=$type;
		}
	
		public function getType(){
			return $this->type;
		}

		public function setDifficulty($difficulty){
			$this->difficulty=$difficulty;
		}

		public function getDifficulty(){
			return $this->difficulty;
		}
	}

?>