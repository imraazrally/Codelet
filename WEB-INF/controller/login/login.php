<?php
	//please ignore the code quality in this file. Just for a demo exmaple to show how to insert a student.
	// Sample sign up controller; 
	// please be sure to handle exceptions
	require_once ("../../model/db/DbService.php");
	require_once ("../../model/login/LoginService.php");

	$username=$_POST['username'];
	$password=$_POST['password'];
	$loginService=new LoginService(new DbService());

	$code=$loginService->verify($username,$password);
	
	switch($code){
		case LoginService::$USER_NOT_FOUND:
			echo "USER_NOT_FOUND";
			break;
		case LoginService::$USER_FOUND:
			echo "great";
			break;
		case LoginService::$PASSWORD_MISMATCH:
			echo "wrong password";
			break;
		default:
			echo "WTF";
	}

?>