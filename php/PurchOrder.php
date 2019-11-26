<?php include('include/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Purchase Order</title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 50px;">
	<form method="post">
  		<div class="form-row">
			<div class="col-md-4" style="margin-left: 300px;">
				 <select class="form-control" name="supplier_id">
					<?php
						$sql = "SELECT * FROM supplier";
						$result = mysqli_query($con,$sql);
						while ($row = mysqli_fetch_array($result)) {
							$supplier_id = $row['supplier_id'];
							$supplier_name = $row['supplier_name'];
								echo '<option value="'.$supplier_id.'">'.$supplier_name.'</option>';
											}
					?>
				</select>
			</div>
				<div class="col-md-4">
					<input type="submit" name="submit" value="Search" class="btn btn-info" style="width: 150px;">
				</div>
    		</div>
    </form>
    	<hr>
<div class="card" style="box-shadow: 0 0 15px 0 lightgrey;">
    <div class="card-header">
		<h4>New order</h4>
	</div>
	<div class="card-body">
    	<?php
			if (isset($_POST['submit'])) {
				$supplier = $_POST['supplier_id'];
				$search_id = "SELECT supplier.supplier_id,supplier.supplier_name, drug.drug_id,drug.drug_name,drug.price  FROM supplier INNER JOIN drug ON supplier.supplier_id = drug.supplier_id AND supplier.supplier_id = '$supplier'";
				$query= mysqli_query($con,$search_id);
				$pdate =date("y-d-m");
				echo "<table class=\"table\">
						<tr>
							<th>Drug Id</th>
							<th>Drug Name</th>
							<th>Date</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Action</th>
							
						</tr>";
					if (mysqli_num_rows($query) > 0) {
						while($row = mysqli_fetch_assoc($query)){
							echo "<tr>
									<td>".$row['drug_id']."</td>
									<td>".$row['drug_name']."</td>
									<td>
										<input type=\"text\" readonly class=\"form-control\" value=$pdate>
									</td>
									<td>".$row['price']."</td>
									<td>
										<form method=\"post\">
											<div class=\"form-group\">
	    										<input type=\"number\" class=\"form-control\"  placeholder=\"Add Drug Quantity\" name=\"quantity\" min=\"1\">
	 										</div>
	 								</td>
	 								<td>
										<input type=\"hidden\" value=".$row['drug_id']." name=\"drug_id\">
										<input type=\"hidden\" value=".$row['drug_name']." name=\"drug_name\">
										<input type=\"hidden\" value=".$row['price']." name=\"price\">
										<input type=\"hidden\" value=".$pdate." name=\"pdate\">
										<input type=\"submit\" name=\"btn\" class=\"btn btn-success\" value=\"Add\">
									</td>
										</form>
								</tr>";
						}
					}else{
						echo "<script>alert('There is no Drug')</script>";
					}		
				}
		?>
	</div>
	</div>
	<br><br>
		<table class="table table-hover" style="box-shadow: 0 0 15px 0 lightgrey;">
		<tr>
			<th>Drug_id</th>
			<th>Drug_name</th>
			<th>Date</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
		</tr>
			<?php 
				$sub_total = 0;
				$sql_show = "SELECT * FROM purchase_item";
				$sql_show_result = mysqli_query($con,$sql_show);
				if ($sql_show_result -> num_rows > 0) {
					while ($num_rows = mysqli_fetch_assoc($sql_show_result)) {
						echo "<tr>
								<td>".$num_rows['drug_id']."</td>
								<td>".$num_rows['drug_name']."</td>
								<td>".$num_rows['pdate']."</td>
								<td>".$num_rows['price']."</td>
								<td>".$num_rows['qty']."</td>
								<td>".$num_rows['total']."</td>
								<td>
									<form method=\"post\">
										<input type=\"submit\" name=\"delete\" value=\"Remove\" class=\"btn btn-danger\">
										<input type=\"hidden\" value=".$num_rows['id']." name=\"id\">
									</form>
								</td>

						</tr>";
						$sub_total += $num_rows['total'];

					}
				}
 
			?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td>Sub Total</td>
				<td></td>
				<td><?php echo $sub_total?></td>
			</tr>

		</table>
</div>
</body>
</html>
<?php
	if (isset($_POST['btn'])) {
		$drug_id = $_POST['drug_id'];
		$drug_name = $_POST['drug_name'];
		$pdate = $_POST['pdate'];
		$price = $_POST['price']; 
		$quantity = $_POST['quantity'];
		$total = $price * $quantity;

		$sql_drug = "INSERT INTO purchase_item(drug_id,drug_name,pdate,price,qty,total)VALUES('$drug_id','$drug_name','$pdate','$price','$quantity','$total')";
		$result_drug = mysqli_query($con,$sql_drug);
		if ($result_drug) {
			echo"<script>window.open('PurchOrder.php','_self')</script>";
		}
	}
	if (isset($_POST['delete'])) {
		$id = $_POST['id'];
		$sql_delete = "DELETE FROM purchase_item WHERE id = '$id'";
		$result_delete = mysqli_query($con,$sql_delete);

		if ($result_delete) {
			echo"<script>window.open('PurchOrder.php','_self')</script>";
		}
	}


?>