<?php
	//please ignore the code quality in this file. Just for a demo exmaple to show how to insert a student.
	// Sample sign up controller; 
	// please be sure to handle exceptions
	require_once ("../../model/db/DbService.php");
	require_once ("../../model/login/SignUpService.php");
	
	$fName=$_POST['fName'];
	$lName=$_POST['lName'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$username=$_POST['username'];
	$password=$_POST['password'];

	$userInfo=new UserInfo($fName, $lName, $email, $phone, $username, $password, date("Y-m-d H:i:s"));
	$signupservice=new SignUpService(new DbService());
	
	$signupservice->register($userInfo);


?>