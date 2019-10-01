<?php include('include/connection.php'); ?>
<?php 
	if(isset($_POST['submit'])){ 

		$supplier_id=$_POST['supplier_id'];
		$date= date("Y-m-d H:i:s");
		$invoice=$_POST['invoice'];
		

		$sql = "INSERT INTO purchase (supplier_id,date,invoice) VALUES ('$supplier_id','$date','$invoice')";
		mysqli_query($con, $sql);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Purchase</title>
	<link rel="stylesheet" type="text/css" href="../css/addPurchase.css">
</head>
<body>
	<form class="addPurchase" method="post">
		<img src="../img/shopping-cart.png">
		<h2>Add Purchase</h2>
		<div class="input_fields">
				
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
				
				<p>Price</p>
				<input type="text" class="input" name="invoice" id="invoice" placeholder="Enter the Invoice price">
				
		</div>
		<input type="submit" name="submit" value="Add Purchase">
	</form>
</body>
</html>