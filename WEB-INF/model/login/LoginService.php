<?php
	require_once("UserInfo.php");
	require_once("../../model/db/DbService.php");
	include("../../model/login/Roles.php");
	include("../../model/login/Hashing.php");

	class LoginService{
		private $dbConnection;
		public static $USER_NOT_FOUND=-1;
		public static $PASSWORD_MISMATCH=0;
		public static $USER_FOUND=1;
		//Retrieve a PDO Connection 
		function __construct(DbService $dbService){$this->dbConnection=$dbService->getDbConnection();}

		public function verify($username, $password){
			try{
				/*Given a username and password,
				  We will query the Database to get the user with that username;
				*/
				$SQL="SELECT * FROM users WHERE username=:username";

				$statement=$this->dbConnection->prepare($SQL);
				$statement->bindParam(":username", $username);
				$statement->execute();

				// If no rows were returned, that means there exists no such user.
				if ($statement->rowCount()==0) return LoginService::$USER_NOT_FOUND;
				// If user exists, we construct a user object.
				$user=$statement->fetch(PDO::FETCH_OBJ);
				// Verify 
				if(Hashing::verifyHash($username.$password.$user->reg_time, $user->password)) return LoginService::$USER_FOUND;
				// If we failed to verify
				return LoginService::$PASSWORD_MISMATCH;

			}catch(Exception $e){
				// In any other event, throw an exception
				throw $e;
			}
		}

	}

?>