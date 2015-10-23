<?php
	require_once ("Exam.php");
	require_once ("Attempt.php");
	
	class ExamHandler{
		private $dbConnection;


		public function __construct($dbConnection/*@paramType=PDO*/){
			$this->dbConnection=$dbConnection;
		}

		public function saveExam(Exam $exam){
			$SQL="INSERT INTO exams (title, instructor_username, questions, description) VALUES (:title, :instructor_username, :questions, :description);";
			
			try{
				$statement=$this->dbConnection->prepare($SQL);
				$statement->bindParam(":title", $exam->getTitle());
				$statement->bindParam(":instructor_username", $exam->getInstructorUsername());
				$statement->bindParam(":questions",serialize($exam->getListOfQuestions()));
				$statement->bindParam(":description",$exam->getDescription());
				$statement->execute();
				return true;

			}catch(Exception $e){
				return false;
			}
		}

		public function saveAttempt(Attempt $attempt){
			$SQL="INSERT INTO attempt (student_username, exam_id, answers) VALUES (:student_username, :exam_id, :answers)";
			try{
				$statement=$this->dbConnection->prepare($SQL);
				$statement->bindParam(":student_username",$attempt->getStudentUsername());
				$statement->bindParam(":exam_id",$attempt->getExamId());
				$statement->bindParam(":answers",serialize($attempt->getListOfAnswers()));
				$statement->execute();
				//Todo: Here we shold place a $this->gradeAttempt($attempt); 
				return true;
			}catch(Exception $e){
				return false;
			}
		}

		public function retrieveExamById($id){
			$SQL="SELECT * FROM exams WHERE id=:id";
			$statement=$this->dbConnection->prepare($SQL);
			$statement->bindParam(":id",$id);
			return $this->retrieveExam($statement);
		}

		public function retrieveExam($statement){
			$statement->execute();
			$row=$statement->fetch(PDO::FETCH_OBJ);
			$exam= new Exam($row->title, $row->instructor_username, unserialize($row->questions), $row->description);
			$exam->setId($row->id);
			return $exam;
		}

		public function retrieveListOfExams(){
			$listOfExams=array();

			$SQL="SELECT id, title, instructor_username, description FROM exams";
			$statement=$this->dbConnection->prepare($SQL);
			$statement->execute();

			while($row=$statement->fetch(PDO::FETCH_OBJ)){
				array_push($listOfExams, array("id"=>$row->id, "title"=>$row->title, "instructor"=>$row->instructor_username, "description"=>$row->description));
			}

			return $listOfExams;

		}

	}

?>