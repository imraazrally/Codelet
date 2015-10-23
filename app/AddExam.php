<?php
	include ("app/Dispatcher.php");
	include ("app/model/db/DbService.php");
	include ("app/model/Exam/ExamHandler.php");
	

	$request=json_decode($_POST['request']);
	$dbService=new DbService();
	$examHandler=new ExamHandler($dbService->getDbConnection());
	$exam=new Exam($request->title, $request->instructor, $request->questions, $request->description);


	
	if($examHandler->saveExam($exam)){
		$response=array("Controller"=>$request->Controller, "success"=>true);
	}else{
		$response=array("Controller"=>$request->Controller, "success"=>false);
	}

	Dispatcher::dispatch("response",json_encode($response));

?>