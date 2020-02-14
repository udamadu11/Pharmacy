<?php include('include/connection.php'); ?><!-- Include database connection -->
<?php include('include/session.php'); ?><!-- Include session -->
<?php 
	if(isset($_POST['submit'])){ 
		
		$drug_id=$_POST['drug_id'];
		$drug_name=$_POST['drug_name'];
		$brand=$_POST['brand'];
		$category=$_POST['category'];
		$supplier_id=$_POST['supplier_id'];
		$reorder_level=$_POST['reorder_level'];
		$price=$_POST['price'];
		
		//Insert temporary table to approve from owner
		$sql = "INSERT INTO drug (drug_id,drug_name,brand,category,supplier_id,reorder_level,price) VALUES ('$drug_id','$drug_name','$brand','$category','$supplier_id','$reorder_level','$price')";

		//performs a query on the database
		$result = mysqli_query($con, $sql);
		if ($result) {
            echo "<script>alert('Successfuly Added...')</script>";
            echo "<script>window.open('ownerViewDrug.php','_self')</script>";
        }
        else{
            echo "<script>alert('Unsuccessfuly Added...')</script>";
            echo "<script>window.open('ownerViewDrug.php','_self')</script>";
        }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Drug </title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<form class="form-2" method="post">
		<img src="../img/pharmacist.png">
		<h2>Add Drug</h2>
		<div class="input_field-2">
				
				<p>Drug Id</p>
				<input type="number" class="input-1" name="drug_id" id="drug_id" placeholder="Enter Drug Id">

				<p>Drug Name</p>
				<input type="text" class="input-1" name="drug_name" id="drug_name" placeholder="Enter Drug Name">

				<p>Brand</p>
				<input type="text" class="input-1" name="brand" id="brand" placeholder="Enter the Brand Name">

				<p>Category</p>
				<input type="text" class="input-1" name="category" id="category" placeholder="Enter  Category Name">

				<p>Supplier Id</p>
				<select class="form-control" name="supplier_id">
						<?php
							include ('include/connection.php');
							$sqlSupplier = "SELECT * FROM supplier";
							$resultSupplier = mysqli_query($con,$sqlSupplier);
							while ($row = mysqli_fetch_array($resultSupplier)) {
							$sName = $row['supplier_name'];
							$sid = $row['supplier_id'];
							echo '<option value="'.$sid.'">'.$sName.'</option>';
						}
					?>
						
				</select>

				<p>Reorder Level</p>
				<input type="number" class="input-1" name="reorder_level" id="reorder_level" placeholder="Enter Reorder level">
				
				<p>Price</p>
				<input type="number" class="input-1" name="price" id="price" placeholder="Enter the Price">
				
		</div>
		<input type="submit" name="submit" value="Add Drug" class="btn-3">
	</form>
</body>
</html>