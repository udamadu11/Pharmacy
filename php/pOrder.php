<!DOCTYPE html>
<html>
<head>
	<title>Purchase Order</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top: 100px;">
	<table class="table table-hover">
		<tr>
			<th>Supplier Name</th>
			<th>Location</th>
			<th>Email</th>
			<th>Contact</th>
			<th>Generate Purchase Order</th>
		</tr>
			<?php 
				include("include/connection.php");
				$supplier_query = "SELECT * FROM supplier";
				$supplier_result = mysqli_query($con,$supplier_query); 
				while($row = mysqli_fetch_assoc($supplier_result)){
					$supplier_id = $row['supplier_id'];
					echo "
					<tr>
						<td>".$row['supplier_name']."</td>
						<td>".$row['location']."</td>
						<td>".$row['email']."</td>
						<td>".$row['contact_no']."</td>
						<td>
							<form method=\"post\" action=\"purchaseOrder.php\">
								<input class=\"btn btn-info\" type=\"submit\" name=\"supplier\" value=\"Generate\">
								<input type=\"hidden\" value=".$row['supplier_id']." name=\"supplier_id\">
							</form>
						</td>
					</tr>

					";
				}
			?>
	</table>
</div>
</body>
</html>
