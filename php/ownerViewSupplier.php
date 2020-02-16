<?php include('include/session.php') ?>
<?php include('include/connection.php') ?>

<?php
    //Unauthorized Access_Check
    checkSession();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != '1'){
       header("Location:login.php");
       exit();
       }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Owner Remove Supplier</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container"  style="margin-top: 100px;">
	<div class="alert alert-primary" role="alert" style="font-weight: bold;font-size: 24px;">
  		<center>List of Suppliers</center>
	</div>
	<table class="table table-hover">
	<tr style="font-size: 16px;font-weight: bold;background-color: lightblue;padding: 10 10px;">
		<th>Supplier Name</th>
		<th>Location</th>
		<th>Email</th>
		<th>Contact No</th>
		<th>Credit Period</th>
		
		
	</tr>
	<?php 
		//Retrive Data from supplier table
		$sql = "SELECT * FROM supplier";
		//Performs query on database
		$result = $con->query($sql);
		if($result-> num_rows > 0){//Return the number of rows in result set
			while ($row = $result-> fetch_assoc()) {//Fetch a result row as an associative array
				//Show Supplier data as table with edit and delte button
				echo "<tr>
					<td>".$row['supplier_name']."</td>
					<td>".$row['location']."</td>
					<td>".$row['email']."</td>
					<td>".$row['contact_no']."</td>
					<td>".$row['credit_period_allowed']."</td>
					
					
				</tr>
		";
				}	
		} 
	
		echo "</table>";
		echo "<hr  style=\"margin-top:50px;\">";
		//echo"<a href=\"addSupplier.php\"><button class=\"btn btn-success\" style=\"margin-left:935px;\">Add New Supplier</button></a>";

	?>
	</div>
</body>
</html>
<?php 
if (isset($_POST['submit2'])) {
	$d_id = $_POST['delete'];
	//Delete Data from employee table by id After clicking delete button
	$delete_query ="DELETE FROM supplier WHERE supplier_id = '$d_id' ";
	$delete_result = mysqli_query($con,$delete_query);
	if ($delete_result) {
		//after performs a query on database get alet 
		echo "<script>alert('Successfuly Removed...')</script>";
            echo "<script>window.open('ownerViewSupplier.php','_self')</script>";
	}
	}
	mysqli_close($con);

?>

<!-- <td>
					  	<form method=\"post\" action=\"ownerEditSupplier.php\">
						<input type=\"hidden\" name=\"edit\" value=".$row['supplier_id'].">
						<input type=\"submit\" name=\"submit1\" class=\"btn btn-primary\" value=\"Edit\" style=\"width:70px;\">
						</form>
					</td>  -->

				<!-- 	<td>
						<form method=\"post\">
						<input type=\"hidden\" name=\"delete\" value=".$row['supplier_id'].">
						<input type=\"submit\" name=\"submit2\" class=\"btn btn-danger\" value=\"Delete\">
						</form>
					</td> -->