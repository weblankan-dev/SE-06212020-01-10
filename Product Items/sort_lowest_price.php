<?php include_once('inc/connection.php'); ?>

<?php 
	if($_POST){
		if($_POST['printer_type'] == "Laser"){
			$type = "Laser Printer";
		}else if($_POST['printer_type'] == "Ink Jet"){
			$type = "Ink Jet Printer";
		}else if($_POST['printer_type'] == "Dot-Matrix"){
			$type = "Dot Matrix Printer";
		}else{
			$query = "SELECT Product, Type, Price, Status FROM items";

		}
		if($_POST['printer_type'] != "All"){
			$query = "SELECT Product, Type, Price, Status FROM items WHERE Product = '{$type}' ORDER BY Price ASC";
		}
		$result_set = mysqli_query($connection, $query);

		if($result_set){
			//echo mysqli_num_rows($result_set) . "Records found <hr>";
			
			$table = '<table>';
			$table .= '<tr><th>Product</th><th>Type</th><th>Price</th><th>Status</th></tr>';

			while($record = mysqli_fetch_assoc($result_set)){
				

				$table .= '<tr>';
				$table .= '<td>' . $record['Product'] . '</td>';
				$table .= '<td>' . $record['Type'] . '</td>';
				$table .= '<td>' . $record['Price'] . '</td>';
				$table .= '<td>' . $record['Status'] . '</td>';
				$table .= '</tr>';
			}

			$table .= '</table>';
			
		}else{
			echo "Query is failed";
		}
	}
?>


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
	Filter by Lowest Price:
	<form action="sort_lowest_price.php" method="post">
		<select name="printer_type">
			<option value="Laser">Laser</option>
			<option value="Ink Jet">Ink Jet</option>
			<option value="Dot-Matrix">Dot-Matrix</option>
			<option value="All">All</option>
		</select>
		<input type="submit" value="Search">
		<br>

		<?php 
			if($_POST){
				echo $table;
			}	
		?>
	</form>
</body>
</html>

<?php  
	//echo $type;
?>