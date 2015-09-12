<?php
	require_once("DbLoginConsts.php");

	// Using Singleton Pattern
	// Whenever a PDO connection is required, we aqquire the connection by calling new DbSerive()->getDbConnection();
	// This reassures that we are not creating multiple open connections. 
	// Use closeDbConnection() to deallocate resources. 
	class DbService{
		private $dbConnection=null;

		public function getDbConnection(){
			//Retreiving Settings from Configs/mysql.xml file
			$dbLoginInfo=new DbLoginConsts();
			
			if (is_null($this->dbConnection)){
				$this->dbConnection=new PDO($dbLoginInfo->getUrl(), $dbLoginInfo->getUsername(), $dbLoginInfo->getPassword());
				// Allowing PDO to throw Exceptions
				$this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			//Returning an Instance of a PDO Object. 
			return $this->dbConnection;
		}

		public function closeDbConnection(){
			$this->dbConnection=null;
		}
	}
?>