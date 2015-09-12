<?php
	require_once("DbLoginConsts.php");

	class DbService{
		private $dbConnection=null;

		public function getDbConnection(){
			if (is_null($this->dbConnection)){
				$this->dbConnection=new PDO(DbLoginConsts::$url, DbLoginConsts::$username, DbLoginConsts::$password);
				$this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			return $this->dbConnection;
		}
	}
?>