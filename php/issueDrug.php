<!DOCTYPE html>
<html>
<head>
	<title>Issue Drug</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 200px;">
		<div>
 		 	<div class="row">
    			<div class="col">
      				<h3 style="text-align: center;">Drug Name</h3>
    			</div>
    			<div class="col">
      				<h3 style="text-align: center;">Quantity</h3>
    			</div>
    			<div class="col">
      				<h3>Action</h3>
    			</div>
  			</div>
  		</div>
		<form method="post">
 		 	<div class="row">
    			<div class="col">
      				<select class="form-control" name="drug_name">
						<?php
							include ('include/connection.php');
							$sql = "SELECT * FROM batch";
							$result = mysqli_query($con,$sql);
							while ($row = mysqli_fetch_array($result)) {
							$dName = $row['drug_name'];
							echo '<option value="'.$dName.'">'.$dName.'</option>';
						}
					?>
						
						</select>
    			</div>
    			<div class="col">
      				<input type="number" name="qty" class="form-control" placeholder="Quantity">
    			</div>
    			<div class="col">
      				<input type="submit" name="submit" class="btn btn-primary" value="Add" style="width: 100px;" >
    			</div>
  			</div>
		</form>


	</div>
	<?php
	$total =0 ;
	if (isset($_POST['submit'])) {
		$drug_name = $_POST['drug_name'];
		$qty = $_POST['qty'];
		$sq = "SELECT * FROM batch";
		$re = mysqli_query($con,$sq);
		$row = mysqli_fetch_array($re);
			$drug_id = $row['drug_id'];
			$price = $row['sales_value'];
			$avail = $row['available_quantity'];
			$total = $qty * $price;

			$s = "INSERT INTO invoice_temp(drug_id,drug_name,price,qty,total)VALUES('$drug_id','$drug_name','$price','$qty','$total')";
			$r = mysqli_query($con,$s);
			if ($r) {
				echo "<script>window.open('issueDrug.php','_self')</script>";
				}
			}

			echo "<table>
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
									<input class=\"btn\" type=\"submit\" name=\"deli\" value=\"remove\">
								</form>

					</td>
					
				</tr>

				<tr></tr>
				"; 
				$total += $row1['total'];
				
}
				echo "
					<tr>
						<td>Total</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>".$total."</td>
					</tr>

					<tr>
						<td></td>
						<td></td>
						<td>
						<form method=\"post\" action=\"issue.php\">
						<input type=\"submit\" name=\"btn\" class=\"btn btn-primary\" value=\"Sell\" style=\"width:100px;\">
						</form>
						</td>
					</tr>

				";
		
 ?>
 
 	

 <?php 

if (isset($_POST['deli'])) {
	$d_id = $_POST['del'];
	$delete_query ="DELETE FROM invoice_temp WHERE id = '$d_id' ";
	$delete_result = mysqli_query($con,$delete_query);
	
	if ($delete_result) {
		echo "<script>window.open('issueDrug.php','_self')</script>";
	}
}
 ?>
	
</body>
</html>
