

<?php
	include ("Dispatcher.php");
	//The user enters the Username and Password. The parameters are passed to the controller (using the dispatcher)
	if (!isset($_POST['username']) || !isset($_POST['password'])) die();
	$username=mysqli_real_escape_string(htmlspecialchars($_POST['username']));
	$password=mysqli_real_escape_string(htmlspecialchars($_POST['password']));
	//Encode to JSON and pass to controller Auth.
	$request=json_encode(array('Controller'=>'Auth.php', 'username'=>$username, 'password'=>$password));
	Dispatcher::dispatch("request",$request);		
?>