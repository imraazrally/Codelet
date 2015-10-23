<?php
	include ("GetQuestions.php");
	include ("app/Dispatcher.php");
	include ("app/model/db/DbService.php");
	include ("app/model/QuestionBank/QuestionHandler.php");
	include ("app/model/QuestionBank/MultipleChoiceAnswer.php");
	include ("app/model/QuestionBank/OpenEndedAnswer.php");

	$request=json_decode($_POST['request']);
	$dbService=new DbService();
	$questionHandler=new QuestionHandler($dbService->getDbConnection());
	$questions=$questionHandler->retrieveQuestionsUsingInstructorName($request->instructor);

	//The get() functions are defined in include ("GetQuestions.php");
	if($request->type==1)$listOfQuestionsCreatedByInstructor=getMCQuestions($questions);
	if($request->type==2)$listOfQuestionsCreatedByInstructor=getTFQuestions($questions);
	if($request->type==4)$listOfQuestionsCreatedByInstructor=getOpenEndedQuestions($questions);

	 $response=array('Controller'=>$request->Controller, 'questions'=>$listOfQuestionsCreatedByInstructor);
	 Dispatcher::dispatch('response',json_encode($response));
?>