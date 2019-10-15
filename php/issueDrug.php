<!DOCTYPE html>
<html>
<head>
	<title>Issue Drug</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 50px;">
		
  			<form method="post">
  		<div class="row">
			<div class="col-md-4">
      			<select class="form-control" name="drug_id" style="margin-left: 300px;">
					<?php
						include ('include/connection.php');
						$sql = "SELECT * FROM batch";
						$result = mysqli_query($con,$sql);
						while ($row = mysqli_fetch_array($result)) {
			
						echo '<option value="'.$row['drug_id'].'">'.$row['drug_id'].'</option>';
				}
				?>			
				</select>
    		</div>
    	<div class="col-md-6">
    		<input type="submit" name="submit" value="Search" class="btn btn-info" style="width: 150px;margin-left: 300px;">
    	</div>
    </div>
    </form>
    	<hr>

	<?php

	if (isset($_POST['submit'])) {
			$drug_id = $_POST['drug_id'];
			$search_id = "SELECT * FROM batch WHERE drug_id ='$drug_id'";
			$query= mysqli_query($con,$search_id);

			echo "<table class=\"table\">
				<tr>
					<th>Batch No</th>
					<th>Drug Id</th>
					<th>Drug Name</th>
					<th>Available</th>
					<th>Issue Quantity</th>
					<th>Action</th>
					
				</tr>";

			if (mysqli_num_rows($query) > 0) {
						while($row = mysqli_fetch_assoc($query)){
							echo "<tr>
									<td>".$row['batch_no']."</td>
									<td>".$row['drug_id']."</td>
									<td>".$row['drug_name']."</td>
									<td>".$row['available_quantity']."</td>
									<td>
										<form method=\"post\">
											<div class=\"form-group\">
	    								
	    										<input type=\"number\" class=\"form-control\"  placeholder=\"Issue Drug Quantity\" name=\"quantity\">
	 										</div>
	 								</td>
	 								<td>
											<input type=\"hidden\" value=".$row['batch_no']." name=\"batch_no\">
											<input type=\"hidden\" value=".$row['available_quantity']." name=\"available_quantity\">
											<input type=\"hidden\" value=".$row['drug_id']." name=\"drug_id\">
											<input type=\"submit\" name=\"btn\" class=\"btn btn-success\" value=\"Issue\">
										

									</td>
										</form>
								</tr>
								
								";
						}
					}else{
			$message = base64_encode(urlencode("Invalid Drug id"));
        	header('Location:issueDrug.php?msg=' . $message);
        	exit();
		}		
		}

		$total =0 ;
		if (isset($_POST['btn'])) {
		$drug_id = $_POST['drug_id'];
		$available_quantity = $_POST['available_quantity'];
		$batch_no = $_POST['batch_no'];
		$qty = $_POST['quantity'];

				if ($available_quantity > $qty) {
					$sq = "SELECT * FROM drug WHERE drug_id = '$drug_id'";
					$re = mysqli_query($con,$sq);
					$row = mysqli_fetch_array($re);

					$drug_name = $row['drug_name'];
					$price = $row['price'];
					$total = $qty * $price;

				
					$s = "INSERT INTO invoice_temp(drug_id,drug_name,price,qty,total,batch_no)VALUES('$drug_id','$drug_name','$price','$qty','$total','$batch_no')";
					$r = mysqli_query($con,$s);

					$available = $available_quantity - $qty;
					$updateQury = "UPDATE batch SET available_quantity = '$available' WHERE drug_id = '$drug_id' AND batch_no = '$batch_no'";
					$updateRe = mysqli_query($con,$updateQury);


					$sqlStock = "SELECT * FROM stock WHERE drug_id = '$drug_id'";
					$resultStock = mysqli_query($con,$sqlStock);
					$rowStock = mysqli_fetch_array($resultStock);
					$avail = $rowStock['current_stock'];

					$available = $avail - $qty;
					$updateStock = "UPDATE stock SET current_stock = '$available' WHERE drug_id = '$drug_id'";
					$updateResultStock = mysqli_query($con,$updateStock);
		}
	}

		echo "

		<table class=\"table\" style=\"margin-top: 10px;border: 2px solid green;padding: 40px;\">
		<tr>
			<th>Id</th>
			<th>Drug Id</th>
			<th>Drug Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
			<th>Action</th>
		</tr>";
				echo "
				<div class=\"alert alert-info\" role=\"alert\" style=\"text-align: center;\">
				  	<h2>Issue Drug Table</h2>
				 </div>
				";
		
			$q = "SELECT * FROM invoice_temp";
				$rr =mysqli_query($con,$q);
		while($row1 = mysqli_fetch_array($rr)){
					echo "
		
				<tr>
					<td>".$row1['id']."</td>
					<td>".$row1['drug_id']."</td>
					<td>".$row1['drug_name']."</td>
					<td>".$row1['price']."</td>
					<td>".$row1['qty']."</td>
					<td>".$row1['total']."</td>
					<td>
								<form method=\"post\" class=\"delete\">
									<input type=\"hidden\" value=".$row1['drug_id']." name=\"drug_id\">
									<input type=\"hidden\" value=".$row1['batch_no']." name=\"batch_no\">
									<input type=\"hidden\" value=".$row1['qty']." name=\"qty\">
									<input class=\"btn btn-danger\" type=\"submit\" name=\"deli\" value=\"remove\">
								</form>

					</td>
					
				</tr>

				<tr></tr>
				"; 
				$total += $row1['total'];
				
}
				echo "
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Total</td>
						<td>".$total."</td>
						<td>
							<form method=\"post\">
							<input type=\"submit\" name=\"btn2\" class=\"btn btn-success\" value=\"Issue\" style=\"width:80px;\">
							</form>
						</td>
					</tr>

				";

	if (isset($_POST['deli'])) {
	$drug_id = $_POST['drug_id'];
	$qty = $_POST['qty'];
	$batch_no = $_POST['batch_no'];


	$sele = "SELECT * FROM batch WHERE drug_id = '$drug_id' AND batch_no = '$batch_no'";
	$ress = mysqli_query($con,$sele);
	$rows = mysqli_fetch_array($ress);
	$available_quantity = $rows['available_quantity'];

	$available = $available_quantity + $qty;
	$updateQury2 = "UPDATE batch SET available_quantity = '$available' WHERE drug_id = '$drug_id' AND batch_no ='$batch_no'";
	$updateRe2 = mysqli_query($con,$updateQury2);


	$sqlStock2 = "SELECT * FROM stock WHERE drug_id = '$drug_id'";
	$resultStock2 = mysqli_query($con,$sqlStock2);
	$rowStock2 = mysqli_fetch_array($resultStock2);
	$avail = $rowStock2['current_stock'];

	$available = $avail + $qty;
	$updateStock2 = "UPDATE stock SET current_stock = '$available' WHERE drug_id = '$drug_id'";
	$updateResultStock2 = mysqli_query($con,$updateStock2);

	$delete_query ="DELETE FROM invoice_temp WHERE drug_id = '$drug_id'  AND batch_no ='$batch_no'";
	$delete_result = mysqli_query($con,$delete_query);
	
	
	
	if ($delete_result) {
		echo "<script>window.open('issueDrug.php','_self')</script>";
	}
}
if (isset($_POST['btn2'])) {
 		
 		$sqlIssue = "SELECT * FROM invoice_temp";
		$resIssue = mysqli_query($con,$sqlIssue);
		
		while($rowIssue=mysqli_fetch_array($resIssue)){
			$id = $rowIssue['id'];
			$drug_id = $rowIssue['drug_id'];
			$qty = $rowIssue['qty'];

			$sq = "INSERT INTO invoice_items(invoice_no,drug_id,qty)VALUES('$id','$drug_id','$qty')";
			$query = mysqli_query($con,$sq);		
 	}
 		$today = date('Y-m-d');
		$issueSql = "INSERT INTO invoice(date,total)VALUES('$today','$total')";
		$IssuResult = mysqli_query($con,$issueSql);

		$delete_query ="DELETE FROM invoice_temp";
		$delete_result = mysqli_query($con,$delete_query);

		if ($delete_query) {
			echo "<script>alert('Issue succesfully')</script>";
			echo "<script>window.open('issueDrug.php','_self')</script>";
		}

 }
		?>
		</div>
</body>
</html>

