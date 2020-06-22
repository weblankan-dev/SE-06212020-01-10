<?php include_once('inc/connection.php'); ?>
<?php
	if($_POST){
		$email_id = $_POST['email_id'] ;
		$password = $_POST['password'];
		//var_dump($password);
		$hashed_password = sha1($password);
		//var_dump($hashed_password);
		$query = "SELECT password FROM user_registration WHERE email_id = '{$email_id}'";
		$result_set = mysqli_query($connection, $query);
		$login_suc = 0;
		//echo "password from database: ";
		$db_pw = mysqli_fetch_assoc($result_set)['password'];
		//print_r(mysqli_fetch_assoc($result_set)['password']);
		//echo '<br>';
		//echo "password from post: ";
		//echo $hashed_password;
		echo '<br>';
		if($db_pw == $hashed_password){
			echo "Login Successful.";
			$login_suc = 1;
		}else{
			echo "Invalid Email or Password.";
		}
		/*
		if($result_set){
			//echo mysqli_num_rows($result_set) . "Records found <hr>";
		}else{
			echo "Invalid Email or Password";
		}*/
	} 
	
?>

<?php 
	$query = "SELECT id, name, email_id, home_address FROM user_registration";

	$result_set = mysqli_query($connection, $query);

	if($result_set && $login_suc == 1){
		//echo mysqli_num_rows($result_set) . "Records found <hr>";
		
		$table = '<table>';
		$table .= '<tr><th>ID</th><th>Name</th><th>E-mail</th><th>Address</th></tr>';

		while($record = mysqli_fetch_assoc($result_set)){
			

			$table .= '<tr>';
			$table .= '<td>' . $record['id'] . '</td>';
			$table .= '<td>' . $record['name'] . '</td>';
			$table .= '<td>' . $record['email_id'] . '</td>';
			$table .= '<td>' . $record['home_address'] . '</td>';
			$table .= '</tr>';
		}

		$table .= '</table>';
		
	}else{
		//echo "Query is failed";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Form</title>
	<style>
		table {border-collapse: collapse;}
		td, th { border:1px solid black; }
		td { padding: 5px; }
	</style>
</head>
<body>
	
	<h3>Member Details</h3><hr>
	<button><a href="insert_query.php">Add Member</a></button>
	<button><a href="update_query.php">Edit Details</a></button>
	<button><a href="delete.php">Delete Member</a></button>
	
	<br><br><br>
	<?php
		if($login_suc){
			echo $table;
		}
	?>
	
</body>
</html>

<?php mysqli_close($connection); ?>