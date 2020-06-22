<?php include_once('inc/connection.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Filter</title>
	<style>
		table {border-collapse: collapse;}
		td, th { border:1px solid black; }
		td { padding: 5px; }
	</style>
</head>
<body>
	<h3>Data Sorting System</h3><hr>
	<button><a href="sort_printer.php">Sort</a></button>
	<button><a href="sort_lowest_price.php">Sort by Lowest Price</a></button>
	<button><a href="sort_highest_price.php">Sort by Highest Prce</a></button>
	
</body>
</html>

<?php  
	//echo $type;
?>