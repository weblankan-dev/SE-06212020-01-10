<?php include_once('inc/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Is Deleted</title>
</head>
<body>
	<form action="is_deleted.php" method="post">
		ID: <input type="text" name="id"><br>
		<input type="submit" value="Delete">
	</form>
</body>
</html>
<?php 
	
	if($_POST){
		$id = $_POST['id'];
		$is_deleted = 1;
		$query = "UPDATE user_registration SET is_deleted = '{$is_deleted}' WHERE id = {$id}";
		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			echo mysqli_affected_rows($connection) . "Records Updated. "; 
		}else{
			echo "Update Failed";
		}
	}
	
?>
<?php mysqli_close($connection); ?>