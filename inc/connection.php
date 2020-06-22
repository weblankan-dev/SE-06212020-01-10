<?php 
	//$connection = mysqli_connect('dbserver', 'dbuser', 'dbpass', 'dbname');
	$connection = mysqli_connect('localhost', 'root', '', 'se-06212020-01-10'); 

	if (mysqli_connect_errno()) {
		die('Database connection failed'. mysqli_connection_error());
	}else{
		//echo "Connection Successful";
	}
?>