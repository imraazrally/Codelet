<?php
	class Hashing{
		public function getHashedPassword($userInfo){
			//Prepending Username and Appending Registration time as Salts before hashing & storing the password
			return password_hash(
									 $userInfo->getUsername().     
									 $userInfo->getPassword().
									 $userInfo->getRegTime()
									 , PASSWORD_DEFAULT
								 );
		}
	}

?>