<!DOCTYPE html>
<html>
<head>
	<title>Issue Drug</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 120px;">
			<div class="alert alert-primary" role="alert" style="text-align: center;">
  					<h2>Issue Drug</h2>
  			</div>
		<hr>
		<div>
 		 	<div class="row">
    			<div class="col">
      				<h3 style="text-align: center;">Drug Name</h3>
    			</div>
    			<div class="col">
      				<h3 style="text-align: center;">Quantity</h3>
    			</div>
    			<div class="col">
      				<h3></h3>
    			</div>
  			</div>
  		</div>
		<form method="post">
 		 	<div class="row">
    			<div class="col">
      				<select class="form-control" name="drug_name">
						<?php
							include ('include/connection.php');
							$sql = "SELECT * FROM stock";
							$result = mysqli_query($con,$sql);
							while ($row = mysqli_fetch_array($result)) {
	
							echo '<option value="'.$row['drug_name'].'">'.$row['drug_name'].'</option>';
						}
					?>
						
						</select>
    			</div>
    			<div class="col">
      				<input type="number" name="qty" class="form-control" placeholder="Quantity">
    			</div>
    			<div class="col">
      				<input type="submit" name="submit" class="btn btn-primary" value="Add" style="margin-left: 150px;width: 80px;" >
    			</div>
  			</div>
		</form>
		<hr>
		
		<?php
	$total =0 ;
	if (isset($_POST['submit'])) {
		$drug_name = $_POST['drug_name'];
		$qty = $_POST['qty'];
		$sq = "SELECT * FROM stock WHERE drug_name = '$drug_name'";
		$re = mysqli_query($con,$sq);
		$row = mysqli_fetch_array($re);
			$drug_id = $row['drug_id'];
			$price = $row['price'];
			$avail = $row['current_stock'];
			$total = $qty * $price;

			if ($qty <=$avail) {
				$s = "INSERT INTO invoice_temp(drug_id,drug_name,price,qty,total)VALUES('$drug_id','$drug_name','$price','$qty','$total')";
				$r = mysqli_query($con,$s);

				$available = $avail - $qty;
				$updateQury = "UPDATE stock SET current_stock = '$available' WHERE drug_name = '$drug_name'";
				$updateRe = mysqli_query($con,$updateQury);
				if ($r ||$updateRe) {
				echo "<script>window.open('issueDrug.php','_self')</script>";
				}
			}
		}

			echo "<table class=\"table\">
		<tr>
			<th>Id</th>
			<th>Drug Id</th>
			<th>Drug Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
			<th>Action</th>
		</tr>";
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
									<input type=\"hidden\" value=".$row1['id']." name=\"del\">
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
							<input type=\"submit\" name=\"btn\" class=\"btn btn-success\" value=\"Issue\" style=\"width:80px;\">
							</form>
						</td>
					</tr>

				";
		
 

if (isset($_POST['deli'])) {
	$d_id = $_POST['del'];
	$delete_query ="DELETE FROM invoice_temp WHERE id = '$d_id' ";
	$delete_result = mysqli_query($con,$delete_query);
	
	//$sele = "SELECT * FROM stock WHERE ";

	//$availabl = $avail - $qty;
	//$updateQury = "UPDATE stock SET current_stock = '$availabl' WHERE drug_name = '$drug_name'";
//	$updateRe = mysqli_query($con,$updateQury);
	
	if ($delete_result) {
		echo "<script>window.open('issueDrug.php','_self')</script>";
	}
}
 ?>
 <?php 
 	if (isset($_POST['btn'])) {
 		
 		$sql = "SELECT * FROM invoice_temp";
		$res = mysqli_query($con,$sql);
		
		while($row=mysqli_fetch_array($res)){
			$id = $row['id'];
			$drug_id = $row['drug_id'];
			$qty = $row['qty'];

			$sq = "INSERT INTO invoice_items(invoice_no,drug_id,qty)VALUES('$id','$drug_id','$qty')";
			$query = mysqli_query($con,$sq);		
 	}
 		$today = date('Y-m-d');
		$tod =strtotime($today);
		$issueSql = "INSERT INTO invoice(date,total)VALUES('$today','$total')";
		$IssuResult = mysqli_query($con,$issueSql);

		$delete_query ="DELETE FROM invoice_temp";
		$delete_result = mysqli_query($con,$delete_query);

		if ($delete_query) {
			echo "<script>alert('Purchase succesfully')</script>";
			echo "<script>window.open('issueDrug.php','_self')</script>";
		}

 }
 ?>

	</div>
	
	
</body>
</html>
