<?php
	require_once("UserInfo.php");
	require_once("../../model/db/DbService.php");
	include("../../model/login/LoginConsts.php");

	class SignUpService{
		private $userInfo;
		private $dbConnection;
		public $exceptionMessage;

		function __construct($userInfo){
			$this->userInfo=$userInfo;
			$dbService=new DbService();
			$this->dbConnection=$dbService->getDbConnection();
		}

		public function register(){
			try{
				$this->execute();
				return true;
			}catch(Exception $e){
				throw $e;
			}
		}


		private function execute(){
				$statement=$this->dbConnection->prepare("INSERT INTO users (username,password,f_name, l_name, email, phone, reg_time, role) 
												   VALUES (:username, :password, :f_name, :l_name, :email, :phone, :reg_time, :role)");
				$statement->bindParam(":username", $this->userInfo->getUsername());
				$statement->bindParam(":password", $this->getHashedPassword());
				$statement->bindParam(":f_name",   $this->userInfo->getFName());
				$statement->bindParam(":l_name",   $this->userInfo->getLName());
				$statement->bindParam(":email" ,   $this->userInfo->getEmail());
				$statement->bindParam(":phone",    $this->userInfo->getPhone());
				$statement->bindParam(":reg_time", $this->userInfo->getRegTime());
				$statement->bindParam(":role", LoginConsts::$STUDENT);
				$statement->execute();
		}

		private function getHashedPassword(){
			return password_hash($this->userInfo->getUsername().   $this->userInfo->getRegTime().   $this->userInfo->getPassword(), PASSWORD_DEFAULT);
		}

		private function getExceptionMessage(){
			return $this->exceptionMessage;
		}

	}

?>