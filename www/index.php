<html>
<body>

	<h1>Login</h1>
	<form action="dispatcher.php?url=AUTH" method="POST">
		Username: <input type="text" name="username"/><br>
		Password: <input type="password" name="password"/><br>
		<input type="submit">
	</form>
	<hr>


	<h1>Sign-up</h1>
	<form action="../WEB-INF/controller/login/signup.php" method="POST">
		First Name: <input type="text" name="fName"/> <br>
		Last Name: <input type="text" name="lName"/>  <br>
		E-mail:	<input type="text" name="email"/><br>
		Phone: <input type="text" name="phone"/><br>
		Username:<input type="text" name="username"/ requried><br>
		Password:<input type="password" name="password"/ requried><br>
		<input type="submit"/>
	</form>

</body>