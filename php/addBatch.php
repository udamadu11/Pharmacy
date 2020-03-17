<?php require_once('include/connection.php') ?>
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

	$sql = "INSERT INTO batch(batch_no,purchase_id,drug_id,drug_name,brand,no_of_boxes,quantity_box,ex_date,available_quantity) VALUES('$batch_no','$purchase_id','$drug_id','$drug_name','$brand','$no_of_boxes','$quantity_box','$ex_date','$available_quantity')";
	$result = mysqli_query($con,$sql);
	if ($result) {
		echo "<script>window.open('addBatch.php','_self')</script>";
	}

	if ($result) {
	$sql2 = "SELECT * FROM drug WHERE drug_id = '$drug_id'";
	$result2 = mysqli_query($con,$sql2);
	$rows = mysqli_fetch_array($result2);
	$category = $rows['category'];
	$price = $rows['price'];

	$sql3 = "INSERT INTO stock(drug_id,drug_name,price,category) VALUES('$drug_id','$drug_name','$price','$category')";
	$result3 = mysqli_query($con,$sql3);
	
	}
	
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
		echo "<script>window.open('addBatch.php','_self')</script>";
	}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add batch </title>
	<link rel="stylesheet" type="text/css" href="../css/addBatch.css">
</head>
<body>
	<form class="addBatch" method="post">
		<h2>Add Batch</h2>
	<div class="input-field">
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
		<input type="submit" name="submit" value="Add">
		<input type="reset" name="reset" value="reset">
	
	</form>
</body>
</html>