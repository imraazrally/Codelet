<?php
		$uu_id = "0xACA021";
		$njitLoginUrl = "http://cp4.njit.edu/cp/home/login";

		$loginInfo=array(
							"user"=>$response->username,
							"pass"=>$response->password,
							"uuid" => $uu_id 
						);

		$options=array(
							CURLOPT_POST=>true,
							CURLOPT_URL=>$njitLoginUrl,
							CURLOPT_REFERER=>$njitLoginUrl,
							CURLOPT_RETURNTRANSFER=>true,
							CURLOPT_POSTFIELDS=>http_build_query($loginInfo)
					  );

		
		$ch = curl_init();
		curl_setopt_array($ch, $options);
		$results=curl_exec($ch);
		curl_close($ch);
?>