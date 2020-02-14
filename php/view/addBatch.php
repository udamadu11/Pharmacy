<!DOCTYPE html>
<html>
<head>
	<title>Add batch </title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
	<form class="form-1" method="post" action="../query/addBatchQuery.php">
		<h2>Add New Stock</h2>
	<div class="input-field-1">
		<p>Batch No</p>
		<input type="text" name="batch_no">

		<p>Purchase Id</p>
				<select class="form-control" name="purchase_id">
						<?php
							include ('../include/connection.php');
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
							include ('../include/connection.php');
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
								include ('../include/connection.php');
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
		<input type="number" name="no_of_boxes" min="1">
		<p>Quantity Box</p>
		<input type="number" name="quantity_box" min="1">
		<p>Expiry Date</p>
		<input type="date" name="ex_date" min="2019-11-20">
	</div>
		<input type="submit" name="submit" value="Add" class="btn-1">
		<input type="reset" name="reset" value="reset" class="btn-2">
	
	</form>
</body>
</html>