<?php	
	require_once("app/DisplayErrorConfig.php");
	require_once("app/AfsConfigs.php");
	
	if (isset($_POST['request'])){
		$request=json_decode($_POST['request']);
		//Passing Control to the Controller that's specified in the request message
		include("app/controller/" . $request->Controller);
		die();
	}

	if (isset($_POST['response'])){
		$response=json_decode($_POST['response']);
		//Passing Control to the Controller that's specified in the response message
		include("app/controller/" . $response->Controller);
		die();
	}

?>