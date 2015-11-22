<?php	
	//Imraaz
	include("app/DisplayErrorConfig.php");
	include("app/AfsConfigs.php");

	if (isset($_POST['request'])){
		$request=json_decode($_POST['request']);
		include("app/" . $request->Controller);
		die();
	}

	if (isset($_POST['response'])){
		$response=json_decode($_POST['response']);
		include("app/" . $response->Controller);
		die();
	}
?>
