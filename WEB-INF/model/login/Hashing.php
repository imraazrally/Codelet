<?php
	class Hashing{
		public static function getHashedPassword($username, $password, $regTime){
			//Prepending Username and Appending Registration time as Salts before hashing & storing the password
			return password_hash($username.$password.$regTime, PASSWORD_DEFAULT);
		}

		public static function verifyHash($password, $hash){
			return password_verify($password,$hash);
		}
	}

?>