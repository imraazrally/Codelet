
<?php
//sendding userid and pass to middle
	require_once("AfsConfigs.php");
	class Dispatcher{
		public static function dispatch($type, $message){
			$dispatcher=curl_init(CONTROLLER_ROUTER_URL);
			curl_setopt($dispatcher,CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($dispatcher, CURLOPT_POSTREDIR, 3);
			curl_setopt($dispatcher, CURLOPT_CUSTOMREQUEST, "POST"); 
			$options=array(
				CURLOPT_POST=>true,
				CURLOPT_POSTFIELDS=>array($type=>$message),
				CURLOPT_RETURNTRANSFER, false
			);
			curl_setopt_array($dispatcher, $options);
			curl_exec($dispatcher);
			curl_close($dispatcher);
		}
	}

?>
