<?php
	require_once("Question.php");
	require_once("GenericAnswer.php");

	class QuestionHandler{
		//@Override, @ReturnParam=boolean
		private $dbConnection;

		public function __construct($dbConnection){
			$this->dbConnection=$dbConnection;
		}

		//@returnParam=boolean
		public function addQuestion(Question $question){

			try{
				$SQL="INSERT INTO question_bank (instructor_username, question, answer, type, difficulty) VALUES (:instructor_username, :question, :answer, :type, :difficulty);";
				$statement=$this->dbConnection->prepare($SQL);
				$statement->bindParam(":instructor_username" ,$question->getInstructorUsername());
				$statement->bindParam(":question" ,$question->getQuestion());
				$statement->bindParam(":answer" ,$question->getSerializedAnswer());
				$statement->bindParam(":type" ,$question->getType());
				$statement->bindParam(":difficulty", $question->getDifficulty());
				$statement->execute();
				return true;

			}catch(Exception $e){
				return false;
			}

		}

		public function dropQuestion($questionId){
			return $this->dbConnection->exec("DELETE FROM question_bank WHERE id=$questionId");
		}

		//This function will retrieve all the questions per specified instructor and return an array() of Question objects.
		public function retrieveQuestionsUsingInstructorName($instructor_username){
			//@paramType=Question Object array();
			$questions=array();

			$SQL="SELECT * FROM question_bank WHERE instructor_username=:instructor_username";
			$statement=$this->dbConnection->prepare($SQL);
			$statement->bindParam(":instructor_username", $instructor_username);
			$statement->execute();
			

			while($row=$statement->fetch(PDO::FETCH_OBJ)){
				//for each row, we're building a question object.
				$question=$this->buildQuestion($row);
				array_push($questions,$question);
			}
			return $questions;
		}

		public function retrieveQuestionUsingAListOfIds($listOfIds){
			//@paramType=Question Object array();
			$questions=array();
			foreach($listOfIds as $id){
				array_push($questions,$this->retrieveQuestionUsingId($id));
			}
			return $questions;
		}

		public function retrieveQuestionUsingId($id){
			$SQL="SELECT * FROM question_bank WHERE id=:id";
			$statement=$this->dbConnection->prepare($SQL);
			$statement->bindParam(":id", $id);
			$statement->execute();
		
			$row=$statement->fetch(PDO::FETCH_OBJ);
			$question=$this->buildQuestion($row);
			return $question;
		}

		public function getAnswerUsingQuestionId($id){
			$question=retrieveQuestionUsingId($id);
			return $question->getAnswer();
		}

		public function buildQuestion($row){
			$question=new Question
								(
										$row->instructor_username, 
										$row->question, 
										unserialize($row->answer), 
										$row->type,
										$row->difficulty
								);
			$question->setId($row->id);
			return $question;
		}

	}


?>