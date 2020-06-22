<?php include_once('inc/connection.php'); ?>

<?php 
	$query = "SELECT id, name, email_id, home_address FROM user_registration";

	$result_set = mysqli_query($connection, $query);

	if($result_set){
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
		echo "Query is failed";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Select Query</title>
	<style>
		table {border-collapse: collapse;}
		td, th { border:1px solid black; }
		td { padding: 5px; }
	</style>
</head>
<body>
	<?php echo $table; ?>
</body>
</html>

<?php mysqli_close($connection); ?>