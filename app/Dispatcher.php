<?php
	require_once("AfsConfigs.php");
	class Dispatcher{
		public static function dispatch($type, $message){
			$dispatcher=curl_init(CONTROLLER_ROUTER_URL);
			curl_setopt($dispatcher, CURLOPT_FOLLOWLOCATION,false);
			curl_setopt($dispatcher, CURLOPT_POSTREDIR, 3);
			curl_setopt($dispatcher, CURLOPT_CUSTOMREQUEST, "POST"); 

			$options=array(
				CURLOPT_POST=>true,
				CURLOPT_POSTFIELDS=>array($type=>$message),
				CURLOPT_RETURNTRANSFER, true
			);
			
			curl_setopt_array($dispatcher, $options);
			$result=curl_exec($dispatcher);
			curl_close($dispatcher);
			return $result;
		}

		public static function forward($url){
			$forward=curl_init($url);
			curl_setopt($forward,CURLOPT_FOLLOWLOCATION,true);
			curl_setopt($forward, CURLOPT_POSTREDIR, 3);
			curl_setopt($forward, CURLOPT_CUSTOMREQUEST, "POST"); 
			$options=array(
				CURLOPT_POST=>true,
				CURLOPT_RETURNTRANSFER=>false
			);
			curl_setopt_array($forward, $options);
			curl_exec($forward);
			curl_close($forward);
		}
	}

?>