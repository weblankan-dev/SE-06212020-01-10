<?php include_once('inc/connection.php'); ?>



<!DOCTYPE html>
<html>
<head>
	<title>Register Form</title>
	
</head>
<body>	
	<h3>Member Login</h3><hr>
	<form action="login.php" method="post">
		Email ID: <input type="text" name="email_id"><br>
		Password: <input type="password" name="password"><br>
		<input type="submit" value="Login">
	</form>
	<br><br><br>
	
	
</body>
</html>

<?php mysqli_close($connection); ?>