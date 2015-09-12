<?php
	require_once("UserInfo.php");
	require_once("../../model/db/DbService.php");
	include("../../model/login/Roles.php");
	include("../../model/login/Hashing.php");

	class SignUpService{
		private $userInfo;
		private $dbConnection;

		// On init, we recieve a UserInfo Object and store it.
		// Next we retrieve a PDO Connection from DbService().getDbConnection.
		function __construct($userInfo){
			$this->userInfo=$userInfo;
			$dbService=new DbService();
			$this->dbConnection=$dbService->getDbConnection();
		}

		// We try to store the new user in the database,
		public function register(){
			try{
				$this->execute();
				return true;
			}catch(Exception $e){
				throw $e;
			}
		}


		private function execute(){
				$SQL="INSERT INTO users (username,password,f_name, l_name, email, phone, reg_time, role) 
							 VALUES (:username, :password, :f_name, :l_name, :email, :phone, :reg_time, :role)";
				$statement=$this->dbConnection->prepare($SQL);
				$statement->bindParam(":username", $this->userInfo->getUsername());
				$statement->bindParam(":password", $this->getHashedPassword());
				$statement->bindParam(":f_name",   $this->userInfo->getFName());
				$statement->bindParam(":l_name",   $this->userInfo->getLName());
				$statement->bindParam(":email" ,   $this->userInfo->getEmail());
				$statement->bindParam(":phone",    $this->userInfo->getPhone());
				$statement->bindParam(":reg_time", $this->userInfo->getRegTime());
				$statement->bindParam(":role", Roles::$STUDENT);
				$statement->execute();
		}

		private function getHashedPassword(){
			$hashing=new Hashing();
			return $hashing->getHashedPassword($this->userInfo);
		}

	}

?>