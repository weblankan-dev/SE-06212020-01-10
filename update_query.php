<?php include_once('inc/connection.php'); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Edit Details</title>
</head>
<body>
	<h3>Edit Member</h3><hr>
	<p>ID and atleast one detail must be entered to edit</p>
	<form action="update_query.php" method="post">
		ID: <input type="text" name="id"><br>
		Name: <input type="text" name="name"><br>
		Email ID: <input type="text" name="email_id"><br>
		Contact No: <input type="text" name="contact_no"><br>
		Home Address: <input type="text" name="home_address"><br>
		<input type="submit" value="Update">
	</form>
</body>
</html>
<?php //email_id ='{$email_id}' , contact_no= '{contact_no}', home_address= '{home_address}'
	
	if($_POST){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$email_id = $_POST['email_id'] ;
		$contact_no = $_POST['contact_no'];
		$home_address = $_POST['home_address'];
		if($_POST['name']){
			$query = "UPDATE user_registration SET name = '{$name}' WHERE id = {$id}";
		}
		if($_POST['email_id']){
			$query = "UPDATE user_registration SET email_id = '{$email_id}' WHERE id = {$id}";
		}
		if($_POST['contact_no']){
			$query = "UPDATE user_registration SET contact_no = {$contact_no} WHERE id = {$id}";
		}
		if($_POST['home_address']){
			$query = "UPDATE user_registration SET home_address = '{$home_address}' WHERE id = {$id}";
		}
		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			echo mysqli_affected_rows($connection) . "Records Updated. "; 
		}else{
			echo "Update Failed";
		}
	}
	

?>
<?php mysqli_close($connection); ?>