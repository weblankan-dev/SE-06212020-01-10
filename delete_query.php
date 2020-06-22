<?php include_once('inc/connection.php'); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Delete Query</title>
</head>
<body>
	<form action="delete_query.php" method="post">
		ID: <input type="text" name="id"><br>
		<input type="submit" value="Delete">
	</form>
</body>
</html>
<?php 
	if($_POST){
		$id = $_POST['id'];
		$query = "DELETE FROM user_registration  WHERE id = {$id} LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			echo mysqli_affected_rows($connection) . "Records Deleted. "; 
		}else{
			echo "Delete Failed";
		}
	}
?>

<?php mysqli_close($connection); ?>