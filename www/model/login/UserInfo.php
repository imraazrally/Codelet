<?php
	class UserInfo{
		private $fName;
		private $lName;
		private $email;
		private $phone;
		private $username;
		private $password;
		private $regTime;

		function __construct($fName, $lName, $email, $phone, $username, $password, $regTime){
			$this->fName=$fName;
			$this->lName=$lName;
			$this->email=$email;
			$this->phone=$phone;
			$this->username=$username;
			$this->password=$password;
			$this->regTime=$regTime;
		}

		public function getFName(){
			return $this->fName;
		}

		public function getLName(){
			return $this->lName;
		}

		public function getEmail(){
			return $this->email;
		}

		public function getPhone(){
			return $this->phone;
		}

		public function getUsername(){
			return $this->username;
		}

		public function getPassword(){
			return $this->password;
		}

		public function getRegTime(){
			return $this->regTime;
		}
	}


?>