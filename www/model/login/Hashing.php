<?php
	class Hashing{
		public function getHashedPassword($userInfo){
			return password_hash($userInfo->getUsername().   $userInfo->getRegTime().   $userInfo->getPassword(), PASSWORD_DEFAULT);
		}
	}

?>