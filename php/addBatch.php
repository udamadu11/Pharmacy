<?php require_once('include/connection.php'); ?><!-- include database connection -->
<?php 
	if (isset($_POST['submit'])) {
	$batch_no = $_POST['batch_no'];
	$purchase_id = $_POST['purchase_id'];
	$drug_id = $_POST['drug_id'];
	$drug_name = $_POST['drug_name'];
	$brand = $_POST['brand'];
	$no_of_boxes = $_POST['no_of_boxes'];
	$quantity_box = $_POST['quantity_box'];
	$ex_date = $_POST['ex_date'];
	$available_quantity = $quantity_box * $no_of_boxes;

	//Insert query to batch table to add batch data
	$sql = "INSERT INTO batch(batch_no,purchase_id,drug_id,drug_name,brand,no_of_boxes,quantity_box,ex_date,available_quantity) VALUES('$batch_no','$purchase_id','$drug_id','$drug_name','$brand','$no_of_boxes','$quantity_box','$ex_date','$available_quantity')";

	//Performs a query on Database
	$result = mysqli_query($con,$sql);

	//after inserting to batch , updating stock here...
	if ($result) {
	$sql2 = "SELECT * FROM drug WHERE drug_id = '$drug_id'";
	$result2 = mysqli_query($con,$sql2);
	$rows = mysqli_fetch_array($result2);
	$category = $rows['category'];
	$price = $rows['price'];

	//Insert query to add batch data to stock
	$sql3 = "INSERT INTO stock(drug_id,drug_name,price,category) VALUES('$drug_id','$drug_name','$price','$category')";
	$result3 = mysqli_query($con,$sql3);
	
	}
	
	//update stock quantity
	$sql4 = "SELECT available_quantity FROM batch WHERE drug_id = '$drug_id'";
	$result4 = mysqli_query($con,$sql4);
	$array = array();
	while ($data = mysqli_fetch_assoc($result4)) {
		$array[] = $data;
	}
	
	$total = 0;
	foreach ($array as $arr1) {
		$total = $total + $arr1['available_quantity'];
	}
	$sql5 = "UPDATE stock SET current_stock = '$total' WHERE drug_id = '$drug_id'";
	$result5 = mysqli_query($con,$sql5);
	if ($result5) {
		echo "<script>alert('Add new Stock SuccessFully')</script>";
		echo "<script>window.open('addBatch.php','_self')</script>";
	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add batch </title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<form class="form-1" method="post">
		<h2>Add New Stock</h2>
	<div class="input-field-1">
		<p>Batch No</p>
		<input type="text" name="batch_no">

		<p>Purchase Id</p>
				<select class="form-control" name="purchase_id">
						<?php
							include ('include/connection.php');
							$sqlPurchase = "SELECT * FROM purchase";
							$resultPurchase = mysqli_query($con,$sqlPurchase);
							while ($row = mysqli_fetch_array($resultPurchase)) {
							$pid = $row['purchase_id'];
							echo '<option value="'.$pid.'">'.$pid.'</option>';
						}
					?>
						
				</select>

		<p>Drug Id</p>
				<select class="form-control" name="drug_id">
						<?php
							include ('include/connection.php');
							$sqlDrug = "SELECT * FROM drug";
							$resultDrug = mysqli_query($con,$sqlDrug);
							while ($row = mysqli_fetch_array($resultDrug)) {
							$did = $row['drug_id'];
							echo '<option value="'.$did.'">'.$did.'</option>';
						}
					?>
						
				</select>
		<p>Drug Name</p>
			<select class="form-control" name="drug_name">
							<?php
								include ('include/connection.php');
								$sqlDrug1 = "SELECT * FROM drug";
								$resultDrug1 = mysqli_query($con,$sqlDrug1);
								while ($row = mysqli_fetch_array($resultDrug1)) {
								$dname = $row['drug_name'];
								echo '<option value="'.$dname.'">'.$dname.'</option>';
							}
						?>
							
					</select>
		<p>Brand</p>
		<input type="text" name="brand">
		<p>NO of Boxes</p>
		<input type="number" name="no_of_boxes">
		<p>Quantity Box</p>
		<input type="number" name="quantity_box">
		<p>Expiry Date</p>
		<input type="date" name="ex_date">
	</div>
		<input type="submit" name="submit" value="Add" class="btn-1">
		<input type="reset" name="reset" value="reset" class="btn-2">
	
	</form>
</body>
</html>