<?php
	//Login Information for the PDO
	class DbLoginConsts{
		public $loginInfo;

		function __construct(){
			$this->loginInfo=simplexml_load_file("../../../WEB-INF/configs/mysql.xml");
		}

		public function getUrl(){
			return $this->loginInfo->url;
		}

		public function getUsername(){
			return $this->loginInfo->username;
		}

		public function getPassword(){
			return $this->loginInfo->password;
		}

	}

?>