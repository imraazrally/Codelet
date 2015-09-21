<?php
//@Controller	
	//The controller does nothing with the username/password yet. We are directly forwarding the request to the model;
	require_once("app/Dispatcher.php");

	if(isset($_POST['request']))  request();
	if(isset($_POST['response'])) response();

	function request(){
		Dispatcher::dispatch(MODEL_ROUTER_URL,"request", $_POST['request']);	
	}

	function response(){

		$response=json_decode($_POST['response']);
		include("NjitAuth.php");

		$njitLogin=strpos($results, "Failed");
		$message="";

		if(isset($response->error)) $message=$message." <font color='#DE421F'>Database Login Failed.</font>";
		
		if (isset($response->permission)) $message=$message." <font color='#C0EDA1'>Database Login Success</font>";
	
		if($njitLogin!==false){
			$message=$message." <font color='#DE421F'>NJIT Login Failed.</font>";
		}else{
			$message=$message." <font color='#C0EDA1'>NJIT Login Success.</font>";
		}

		echo $message;
	}

?>
