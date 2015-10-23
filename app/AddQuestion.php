<?php

	include ("app/Dispatcher.php");
	include ("app/model/db/DbService.php");
	include ("app/model/QuestionBank/QuestionHandler.php");
	include ("app/model/QuestionBank/MultipleChoiceAnswer.php");
	include ("app/model/QuestionBank/OpenEndedAnswer.php");

	$request=json_decode($_POST['request']);
	$dbService=new DbService();
	$questionHandler=new QuestionHandler($dbService->getDbConnection());
	

	if($request->type==2){ // Code for True or False goes here
		//Building a Question based on request parameters 
		$question=new Question($request->instructor, $request->question, new GenericAnswer($request->answer),$request->type,$request->difficulty);
		
		//Injecting the Question into the Database and returning success/failure message
		if($questionHandler->addQuestion($question)){
			$response=array("Controller"=>$request->Controller, "success"=>true);
		}else{
			$response=array("Controller"=>$request->Controller, "success"=>false);
		}

	}

	if ($request->type==1){
		$question=new Question($request->instructor, $request->question, new MultipleChoiceAnswer($request->answerA, $request->answerB, $request->answerC, $request->answerD, $request->answer), $request->type, $request->difficulty);
		if($questionHandler->addQuestion($question)){
			$response=array("Controller"=>$request->Controller, "success"=>true);
		}else{
			$response=array("Controller"=>$request->Controller, "success"=>false);
		}
	}

	if ($request->type==4){
		echo $_POST['request'];
		$question=new Question($request->instructor, $request->question, new OpenEndedAnswer($request->case1, $request->case2, $request->case3, $request->answer1, $request->answer2, $request->answer3), $request->type, $request->difficulty);
		
		if($questionHandler->addQuestion($question)){
			$response=array("Controller"=>$request->Controller, "success"=>true);
		}else{
			$response=array("Controller"=>$request->Controller, "success"=>false);
		}
	}

	Dispatcher::dispatch("response", json_encode($response));

	
?>