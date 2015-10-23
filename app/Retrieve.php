<?php
	include ("app/Dispatcher.php");
	include ("app/model/db/DbService.php");
	include ("app/model/QuestionBank/QuestionHandler.php");

	$request=json_decode($_POST['request']);
	$dbService=new DbService();
	$questionHandler=new QuestionHandler($dbService->getDbConnection());
	
	//Retrieving a list of Question () Objects 
	$listOfQuestions=$questionHandler->retrieveQuestionsUsingInstructorName($request->instructor);
	$questions=array();
	/*For each question, we pass to the controller
			1) The Question ID (id)
			2) The Question itself (question)
	*/
	foreach($listOfQuestions as $question){
		array_push($questions, array(
								  	"id"=>$question->getId(),
								  	"question"=>$question->getQuestion()
							  ));
	
	}
	$response=array("Controller"=>"Retrieve.php", "questions"=>$questions);
	$response=json_encode($response);
	Dispatcher::dispatch('response', $response);
?>