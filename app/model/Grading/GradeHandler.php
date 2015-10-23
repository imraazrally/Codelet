<?php
	class GradeHandler{
		private $dbConnection;
		private $examHandler;
		private $questionHandler;

		public function __construct($dbConnection, $examHandler, $questionHandler){
			$this->dbConnection=$dbConnection;
			$this->examHandler=$examHandler;
			$this->questionHandler=$questionHandler;
		}

		public function gradeIt(Attempt $attempt){
			$finalGrade=0;

			$exam=$this->examHandler->retrieveExamById($attempt->getExamId());
			$listOfQuestionIds=$exam->getListOfQuestions();
			
			//A list of questions and a List of Answers in Order
			$listOfQuestions=array();
			foreach($listOfQuestionIds as $id) array_push($listOfQuestions,$this->questionHandler->retrieveQuestionUsingId($id));
			$listOfAnswers=$attempt->getListOfAnswers();


			for ($i=0; $i<count($listOfQuestions); $i++){
				//Calling the compiler for OE Questions.
				if($listOfQuestions[$i]->getType()==4){
					dispatcher::dispatch("request",json_encode(array("args"=>array("5","3","2"), "code"=>"System.out.println(args[0]);")));
					
				}else{
					if($listOfQuestions[$i]->getAnswer()->getAnswer()==$listOfAnswers[$i]) $finalGrade++;
				}
			}



		}

	}

?>