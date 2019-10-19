<?php require_once('include/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Batch</title>
	<link rel="stylesheet" type="text/css" href="../css/searchBatch.css">
</head>
<body>
	<form class="SearchId" method="post">
		<h2>Search By Id</h2>
		<div class="search_id">
			<input type="text" class="input" name="search_batch" placeholder="Search By Id" id="search_batch">
			<input type="submit" name="submit" value="Search">
		</div>
	</form>

	<?php 
		if (isset($_POST['submit'])) {
			$batch_no = $_POST['search_batch'];
			$search_query = "SELECT * FROM batch WHERE batch_no = '$batch_no'";
			$query = mysqli_query($con,$search_query);

			echo "<table>
				<tr>
					<th>Batch No</th>
					<th>Drug Name</th>
					<th>Brand</th>
					<th>Quantity</th>
					<th>Box</th>
					<th>Manufacuring Date</th>
					<th>Expiry Date</th>
					<th>value</th>
					<th>Supplier Id</th>
					<th>Delete</th>
				</tr>
			";

			if (mysqli_num_rows($query) > 0) {
						while($row = mysqli_fetch_assoc($query)){
							echo "<tr>
									<td>".$row['batch_no']."</td>
									<td>".$row['drug_name']."</td>
									<td>".$row['brand']."</td>
									<td>".$row['quantity_box']."</td>
									<td>".$row['no_of_boxes']."</td>
									<td>".$row['manu_date']."</td>
									<td>".$row['ex_date']."</td>
									<td>".$row['sales_value']."</td>
									<td>".$row['supplier_id']."</td>
									<td>
										<form method=\"post\" class=\"delete\">
										<input type=\"hidden\" value=".$row['batch_no']." name=\"delete\">
										<input class=\"btn\" type=\"submit\" name=\"submit1\" value=\"Delete\">
										</form>
									</td>
								</tr>";
						}
					}
		}
		if (isset($_POST['submit1'])) {
			$batch = $_POST['delete'];
			$delete_batch_query = "DELETE FROM batch WHERE batch_no = '$batch'";
			mysqli_query($con,$delete_batch_query);

		}
		mysqli_close($con);

	?>
</body>
</html>