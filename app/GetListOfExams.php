<?php
	include ("app/Dispatcher.php");
	include ("app/model/db/DbService.php");
	include ("app/model/Exam/ExamHandler.php");
	

	$request=json_decode($_POST['request']);
	$dbService=new DbService();
	$examHandler=new ExamHandler($dbService->getDbConnection());

	$listOfExams=$examHandler->retrieveListOfExams();
	$response=array("Controller"=>$request->Controller, "exams"=>$listOfExams);
	Dispatcher::dispatch("response", json_encode($response));
?>