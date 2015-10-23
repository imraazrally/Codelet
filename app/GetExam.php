<?php
	include ("app/Dispatcher.php");
	include ("app/model/db/DbService.php");
	include ("app/model/Exam/ExamHandler.php");
	include ("app/model/QuestionBank/MultipleChoiceAnswer.php");
	include ("app/model/QuestionBank/QuestionHandler.php");

	$request=json_decode($_POST['request']);
	$dbService=new DbService();
	$examHandler=new ExamHandler($dbService->getDbConnection());
	$questionHandler=new QuestionHandler($dbService->getDbConnection());

	$exam=$examHandler->retrieveExamById($request->examId);
	$title=$exam->getTitle();

	$listOfMCQuestions=array();
	$listOfTFuestions=array();
	$listOfOEQuestions=array();
	$listOfQuestionsInExam=array();


	foreach ($exam->getListOfQuestions() as $id){
		$question=$questionHandler->retrieveQuestionUsingId($id);
		if($question->getType()==1) array_push($listOfMCQuestions, getMCQuestion($question));
		if($question->getType()==2) array_push($listOfTFuestions, getTFQuestion($question));
		if($question->getType()==4) array_push($listOfOEQuestions, getOEQuestion($question));
	}


	function getMCQuestion($question){
		return array(
								"id"=>$question->getId(),
								"question"=>$question->getQuestion(),
								"answerA"=>$question->getAnswer()->getAnswerA(),
								"answerB"=>$question->getAnswer()->getAnswerB(),
								"answerC"=>$question->getAnswer()->getAnswerC(),
								"answerD"=>$question->getAnswer()->getAnswerD()
			  		);
	}

	function getTFQuestion($question){
		return array(
								"id"=>$question->getId(),
								"question"=>$question->getQuestion(),
								"answerA"=>"True",
								"answerB"=>"False",
								"answerC"=>null,
								"answerD"=>null,
			  		);
	}

	function getOEQuestion($question){
		return array(
								"id"=>$question->getId(),
								"question"=>$question->getQuestion(),
								"answerA"=>null,
								"answerB"=>null,
								"answerC"=>null,
								"answerD"=>null,
			  		);
	}

	$response=array("Controller"=>$request->Controller, "examId"=>$request->examId,"title"=>$title, "MC"=>$listOfMCQuestions, "TF"=>$listOfTFuestions, "OE"=>$listOfOEQuestions);
	Dispatcher::dispatch("response",json_encode($response));

?>