<?php require_once('include/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Search Batch</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
	<form class="form" method="post">
		<h2>Search By Id</h2>
		<div class="row">
			<input type="text" class="form-control" name="search_batch" placeholder="Search By Id" id="search_batch">
			<input type="submit" name="submit" value="Search" class="btn btn-info" style="margin-left: 20px;">
		</div>
	</form>

	<?php 
		if (isset($_POST['submit'])) {
			$batch_no = $_POST['search_batch'];
			//Retrive data from batch table by batch no 
			$search_query = "SELECT * FROM batch WHERE batch_no = '$batch_no'";
			//Performs a query on Database
			$query = mysqli_query($con,$search_query);

		
			if (mysqli_num_rows($query) > 0) {//Return the number of rows in result set
						while($row = mysqli_fetch_assoc($query)){//Fetch a result row as an associative array
							echo "
							<br>
								<table class=\"table table-hover\">
								<tr>
									<th>Batch No</th>
									<th>Purchase Id</th>
									<th>Drug Id</th>
									<th>Drug Name</th>
									<th>Brand</th>
									<th>Quantity</th>
									<th>Box</th>
									<th>Expiry Date</th>
									<th>Available Quantity</th>
									<th>Delete</th>
								</tr>

								<tr>
									<td>".$row['batch_no']."</td>
									<td>".$row['purchase_id']."</td>
									<td>".$row['drug_id']."</td>
									<td>".$row['drug_name']."</td>
									<td>".$row['brand']."</td>
									<td>".$row['quantity_box']."</td>
									<td>".$row['no_of_boxes']."</td>
									<td>".$row['ex_date']."</td>
									<td>".$row['available_quantity']."</td>
									<td>
										<form method=\"post\">
										<input type=\"hidden\" value=".$row['batch_no']." name=\"delete\">
										<input type=\"hidden\" value=".$row['drug_id']." name=\"deleteDrugId\">
										<input type=\"hidden\" value=".$row['available_quantity']." name=\"deleteAvailable\">
										<input class=\"btn btn-danger\" type=\"submit\" name=\"submit1\" value=\"Delete\">
										</form>
									</td>
								</tr>";
						}
					}else{
			echo "<script>alert('Inavlid Batch Id')</script>";
		}
		}
		if (isset($_POST['submit1'])) {
			$batch = $_POST['delete'];
			$drug_id = $_POST['deleteDrugId'];
			$deleteAvailable = $_POST['deleteAvailable'];

			//Delete Data from batch table 
			$delete_batch_query = "DELETE FROM batch WHERE batch_no = '$batch'";
			//Performs a query on Database
			$resultDel = mysqli_query($con,$delete_batch_query);

			if ($resultDel) {
				echo "<script>alert('Delete Successfully')</script>";
			}
					//After deleting Batch upadte stock level
					$sqlStock = "SELECT * FROM stock WHERE drug_id = '$drug_id'";
					$resultStock = mysqli_query($con,$sqlStock);
					$rowStock = mysqli_fetch_array($resultStock);
					$avail = $rowStock['current_stock'];

					$available = $avail - $deleteAvailable;
					$updateStock = "UPDATE stock SET current_stock = '$available' WHERE drug_id = '$drug_id'";
					$updateResultStock = mysqli_query($con,$updateStock);

		}
		mysqli_close($con);

	?>
	</div>
</body>
</html>