<?php
	/*
		This class contains information regarding the exam and a list of questions (ids) that contain in this exam.
	*/
	class Exam{
		private $id;
		private $title; //@paramType=String
		private $instructorUsername;
		private $listOfQuestions; // @paramType=array(int)
		private $description;

		public function __construct($title, $instructorUsername, $listOfQuestions, $description){
			$this->title=$title;
			$this->instructorUsername=$instructorUsername;
			$this->listOfQuestions=$listOfQuestions;
			$this->description=$description;
		}

		public function setId($id){
			$this->id=$id;
		}

		public function getId(){
			return $this->id;
		}

		public function setTitle($title){
			$this->title=$title;
		}

		public function getTitle(){
			return $this->title;
		}

		public function setInstructorUsername($instructorUsername){
			$this->instructorUsername=$instructorUsername;
		}

		public function getInstructorUsername(){
			return $this->instructorUsername;
		}

		public function setListOfQuestions($listOfQuestions){
			$this->listOfQuestions=$listOfQuestions;
		}

		public function getListOfQuestions(){
			return $this->listOfQuestions;
		}

		public function setDescription($description){
			$this->description=$description;
		}

		public function getDescription(){
			return $this->description;
		}
	}

?>