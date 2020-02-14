<?php include('include/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Supplier</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<table class="table table-hover">
			<tr>
				<th>Supplier ID</th>
				<th>Supplier Name</th>
				<th>Location</th>
				<th>Email</th>
				<th>Contact No</th>
				<th>Credit Period</th>
				<th>Action</th>
			</tr>
				<?php
					$supplier_query = "SELECT * FROM supplier";
					$supplier_result = mysqli_query($con,$supplier_query);
					if($supplier_result -> num_rows > 0){
						while ($row = $supplier_result -> fetch_assoc()) {
							echo "
								<tr>
									<td>".$row['supplier_id']."</td>
									<td>".$row['supplier_name']."</td>
									<td>".$row['location']."</td>
									<td>".$row['email']."</td>
									<td>".$row['contact_no']."</td>
									<td>".$row['credit_period_allowed']."</td>
									<td>
										<input type=\"submit\" class=\"btn btn-primary\" name=\"Edit\" value=\"Edit\" style=\"width: 80px;\">
									</td>
									<td>
										<input type=\"submit\" class=\"btn btn-danger\" name=\"Delete\" value=\"Delete\" style=\"width: 80px;\">
									</td>
								</tr>";
						}
					}			 
				 ?>
		</table>
		<hr style= margin-top:50px;>
		<a href="addSupplier.php"><button class="btn btn-success" style="margin-left:940px;">Add New Supplier</button></a>
	</div>
</body>
</html>