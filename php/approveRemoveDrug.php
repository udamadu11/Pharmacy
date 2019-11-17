<?php include('include/connection.php') ?><!-- include database connection -->
<!DOCTYPE html>
<html>
<head>
	<title>Approval list..</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container" style="margin-top: 50px">
		<table class="table">
		<tr>
			<th>Drug Id</th>
			<th>Drug Name</th>
			<th>Category</th>
			<th>Reoder Level</th>
			<th>Supplier Id</th>
			<th>Price</th>
			<th>Brand</th>
			<th>Approve</th>
			<th>Decline</th>
		</tr>
		<?php
			//Select data from tem4 table and reTrive data
			$sql = "SELECT * FROM tem4";
			//Performs a query on database
			$result = $con->query($sql);
			//Return number of rows in result set
			if($result-> num_rows > 0 ){
				//Fetch data result row as a associative array
				while ($row = $result-> fetch_assoc()){
					//Display drug table data with remove button and decline button
					echo "<tr>
							<td>".$row['drug_id']."</td>
							<td>".$row['drug_name']."</td>
							<td>".$row['category']."</td>
							<td>".$row['reorder_level']."</td>
							<td>".$row['supplier_id']."</td>
							<td>".$row['price']."</td>
							<td>".$row['brand']."</td>
							<td>
								<form method=\"post\">
								<input type=\"hidden\" name=\"remove\" value=".$row['drug_id'].">
								<input type=\"submit\" name=\"removeDrug\" value=\"Approve\" class=\"btn btn-primary\">
								</form>
							</td>
							<td>
								<form method=\"post\">
								<input type=\"hidden\" name=\"remove1\" value=".$row['drug_id'].">
								<input type=\"submit\" name=\"notRemoveDrug\" value=\"Decline\" class=\"btn btn-danger\">
								</form>
							</td>
						</tr>";
				}
			echo "</table";
			}
			else{
				echo "0 result";
			}
		?>		

	</table>
	</div>
</body>
</html>
<?php 
if (isset($_POST['removeDrug'])) {
	$drug_id = $_POST['remove'];
	//Delete Data from tem4(temporary) table by drug id
	$delete_query ="DELETE FROM tem4 WHERE drug_id = '$drug_id' ";
	//Performs a query on database
	$delete_result = mysqli_query($con,$delete_query);

	//Delete Data from drug table by drug id
	$delete_query2 ="DELETE FROM drug WHERE drug_id = '$drug_id' ";
	//Performs a query on database
	$delete_result2 = mysqli_query($con,$delete_query2);

	if ($delete_result2) {
			echo "<script>alert('Approval Successfully..')</script>";
			echo "<script>window.open('approveRemoveDrug.php','_self')</script>";
		}
	
	}
if (isset($_POST['notRemoveDrug'])) {
	$id = $_POST['remove1'];
	//If not delete drug data , delete that data from tem4 table
	$no_query ="DELETE FROM tem4 WHERE drug_id = '$id' ";
	$no_result = mysqli_query($con,$no_query);
	if ($no_result) {
			echo "<script>alert('Decline approval Successfully..')</script>";
			echo "<script>window.open('approveRemoveDrug.php','_self')</script>";
		}
}

?>
