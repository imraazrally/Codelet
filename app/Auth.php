<?php
	//@Service - Checking the username/password in the database to verify credentials.
	require_once("app/model/login/LoginService.php");
	require_once("Dispatcher.php");

	/*
		*The Controller passes the $username & $password at $_POST[request] in JSON format to us.
	 	*We decode into JSON and verify if the user exists in the database using - LoginService->Verify();
	*/
	 	
	$request=json_decode($_POST['request']);
	$loginService=new LoginService();
	$verify=$loginService->verify($request->username, $request->password);
	
	/*
		Upon verifying, if the user exists in the database or not, We need to communicate the "response" back to the Controller.
		So we define $response array in JSON and pass the information back to the controller as $_POST['response'];
	*/

	$response= array();
	$response['Controller']="Auth.php"; 
	$response['username']=$request->username;
	$response['password']=$request->password;
	
	session_start();

	switch($verify){
		case LoginService::$USER_NOT_FOUND:
					$response['error']='USER_NOT_FOUND';
					break;
		case LoginService::$PASSWORD_MISMATCH:
					$response['error']= "PASSWORD_MISMATCH";
					break;
		case "Teacher":
					$response['role']="Teacher";
					$response['username']=$request->username;
					break;
		case "Student":
					$response['role']="Student";
					$response['username']=$request->username;
					break;
		default:
					$response['error']="UNKNOWN_ERROR";
					break;
	};

	$response=json_encode($response);
	Dispatcher::dispatch("response", $response);

?>