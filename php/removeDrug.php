<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/removeDrug.css">
</head>
<body>
<form class="search_name" method="post">
	<h2>Search by Name</h2>
	<input type="text" class="input1" name="search_name" id="search_name" placeholder="Enter the Drug Name">
	<input type="submit" name="submit1" value="Search">
</form>

<form class="search_category" method="post">
	<h2>Search by Category</h2>
	<input type="text" class="input2" name="search_category" id="search_category" placeholder="Enter the Drug Category">
	<input type="submit" name="submit2" value="Search">
</form>

<?php 
	if (isset($_POST['submit1'])) {
		$drug_name = $_POST['search_name'];
		$search_drug = "SELECT * FROM drug WHERE drug_name = '$drug_name'";
		$query = mysqli_query($con,$search_drug);

		echo "<table>
		<tr>
			<th>Drug Id</th>
			<th>Drug Name</th>
			<th>Category</th>
			<th>Reoder Level</th>
			<th>Price</th>
			<th>Brand</th>
			<th>Drug Delete</th>
		</tr>";
		
		if(mysqli_num_rows($query) > 0){
			while($row = mysqli_fetch_assoc($query)){
				echo "
				<tr>
					<td>".$row['drug_id']."</td>
					<td>".$row['drug_name']."</td>
					<td>".$row['category']."</td>
					<td>".$row['reorder_level']."</td>
					<td>".$row['price']."</td>
					<td>".$row['brand']."</td>
					<td>
						<form method=\"post\" class=\"delete\">
						<input type=\"hidden\" value=".$row['drug_name']." name=\"delete\">
						<input class=\"btn\" type=\"submit\" name=\"submit\" value=\"Delete\">
						</form>
					</td>
					</tr>
				";
			}	
		}

	}

		if (isset($_POST['submit2'])) {
		$drug_category = $_POST['search_category'];
		$search_category = "SELECT * FROM drug WHERE category = '$drug_category'";
		$query = mysqli_query($con,$search_category);

		echo "<table>
		<tr>
			<th>Drug Id</th>
			<th>Drug Name</th>
			<th>Category</th>
			<th>Reoder Level</th>
			<th>Price</th>
			<th>Brand</th>
			<th>Drug Delete</th>
		</tr>";
		
		if(mysqli_num_rows($query) > 0){
			while($row = mysqli_fetch_assoc($query)){
				echo "
				<tr>
					<td>".$row['drug_id']."</td>
					<td>".$row['drug_name']."</td>
					<td>".$row['category']."</td>
					<td>".$row['reorder_level']."</td>
					<td>".$row['price']."</td>
					<td>".$row['brand']."</td>
					<td>
						<form method=\"post\" class=\"delete\">
						<input type=\"hidden\" value=".$row['drug_name']." name=\"delete\">
						<input class=\"btn\" type=\"submit\" name=\"submit\" value=\"Delete\">
						</form>
					</td>
					</tr>
				";
			}	
		}

	}
	if (isset($_POST['submit'])) {
	$d_id = $_POST['delete'];
	$delete_query ="DELETE FROM drug WHERE drug_name = '$d_id' ";
	$delete_result = mysqli_query($con,$delete_query);
	}
	mysqli_close($con);

?>

</body>
</html>