<?php
	require_once ("../../model/login/SignUpService.php");
	
	$fName=$_POST['fName'];
	$lName=$_POST['lName'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$username=$_POST['username'];
	$password=$_POST['password'];

	$userInfo=new UserInfo($fName, $lName, $email, $phone, $username, $password, date("Y-m-d H:i:s"));
	$signupservice=new SignUpService($userInfo);
	$signupservice->register();


?>