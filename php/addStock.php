<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	

	<div class="container" style="margin-top: 200px">
		<div class="alert alert-primary" role="alert" style="text-align: center;">
  					<h2>Add Stock</h2>
  			</div>
	<form class="form-group" method="post" action="addStock.php">
		<div class="row">
		<div class="col-md-6">
      		<select class="form-control" name="drug_id" style="margin-left: 150px;">
			<?php
				include ('include/connection.php');
				$sql = "SELECT * FROM stock";
				$result = mysqli_query($con,$sql);
				while ($row = mysqli_fetch_array($result)) {
	
				echo '<option value="'.$row['drug_id'].'">'.$row['drug_id'].'</option>';
			}
		?>			
			</select>
    	</div>
    	<div class="col-md-6">
    		<input type="submit" name="submit" value="Search" class="btn btn-info" style="width: 200px;margin-left: 150px;">
    	</div>
		</div>
	</form>
	<hr>

	<?php

	if (isset($_POST['submit'])) {
			$drug_id = $_POST['drug_id'];
			$search_id = "SELECT * FROM stock WHERE drug_id ='$drug_id'";
			$query= mysqli_query($con,$search_id);

			echo "<table class=\"table\">
				<tr>
					<th>Drug Id</th>
					<th>Drug Name</th>
					<th>Drug Category</th>
					<th>Drug Quantity</th>
					<th>Drug Price</th>
					
				</tr>";

			if (mysqli_num_rows($query) > 0) {
						while($row = mysqli_fetch_assoc($query)){
							echo "<tr>
									<td>".$row['drug_id']."</td>
									<td>".$row['drug_name']."</td>
									<td>".$row['category']."</td>
									<td>".$row['current_stock']."</td>
									<td>".$row['price']."</td>
								</tr>
								<tr>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td>
										<form method=\"post\">
											<div class=\"form-group\">
	    								
	    										<input type=\"number\" class=\"form-control\"  placeholder=\"Add Stock Quantity\" name=\"quantity\">
	 										</div>
	 								</td>
	 								<td>
											<input type=\"hidden\" value=".$row['drug_id']." name=\"adStk\">
											<input type=\"submit\" name=\"btn\" class=\"btn btn-success\" value=\"Add Stock\">
										

									</td>
										</form>

								</tr>
								";
						}
					}else{
			$message = base64_encode(urlencode("Invalid Drug id"));
        	header('Location:addStock.php?msg=' . $message);
        	exit();
		}		
		}

	if (isset($_POST['btn'])) {
		$drugId = $_POST['adStk'];
		$qty = $_POST['quantity'];

		$sele = "SELECT * FROM stock WHERE drug_id = '$drugId'";
		$ress = mysqli_query($con,$sele);
		$rows = mysqli_fetch_array($ress);
		$avail = $rows['current_stock'];

		

		$available = $avail + $qty;

		$updateQury = "UPDATE stock SET current_stock = '$available' WHERE drug_id = '$drugId'";
		$updateRe = mysqli_query($con,$updateQury);

		$message = base64_encode(urlencode("Successfully Updated stock"));
        	header('Location:addStock.php?msg=' . $message);
        	exit();
	}


 ?>
	</div>



</body>
</html>
