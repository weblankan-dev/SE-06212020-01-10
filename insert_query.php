<?php include_once('inc/connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Insert Query</title>
</head>
<body>
	<h3>Member Registration</h3><hr>
	<form action="insert_query.php" method="post">
		Name: <input type="text" name="name"><br>
		Email ID: <input type="text" name="email_id"><br>
		Contact No: <input type="text" name="contact_no"><br>
		Home Address: <input type="text" name="home_address"><br>
		Password: <input type="password" name="password"><br>
		Confirm Passward: <input type="password" name="confirm_password"><br>
		<input type="submit" value="Register">
	</form>
</body>
</html>
<?php 
	//print_r($_POST);
	if($_POST){
		if($_POST['password']!=$_POST['confirm_password']){
			echo "Check user password";
		}else{
			$name = $_POST['name'];
			$email_id = $_POST['email_id'] ;
			$contact_no = $_POST['contact_no'];
			$home_address = $_POST['home_address'];
			$password = $_POST['password'];
			$is_deleted = 0;

			$hashed_password = sha1($password);

			$query = "INSERT INTO user_registration (name, email_id, contact_no, home_address, password, is_deleted) VALUES ('{$name}', '{$email_id}', {$contact_no}, '{$home_address}', '{$hashed_password}', {$is_deleted})";

			$result = mysqli_query($connection, $query);

			if ($result) {
				echo "Member is Added";
			}else{
				echo "Query Failed";
			}
		
		}
	}
		
	

 ?>
<?php mysqli_close($connection); ?>