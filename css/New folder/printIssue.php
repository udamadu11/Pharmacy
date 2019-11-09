<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
	<body>
		<div class="container" style="margin-top: 100px;">
		<table class="table" style="margin-top: 10px;border: 2px solid green;padding: 40px;">
		<tr>
			<th>Id</th>
			<th>Drug Id</th>
			<th>Drug Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total</th>
			
		</tr>
				<div class="alert alert-info" role="alert" style="text-align: center;">
				  	<h2>Invoice</h2>
				 </div>
		<?php
			include('include/connection.php');
			$q = "SELECT * FROM invoice_temp";
				$rr =mysqli_query($con,$q);
				$total = 0;
		while($row1 = mysqli_fetch_array($rr)){
					echo "
		
				<tr>
					<td>".$row1['id']."</td>
					<td>".$row1['drug_id']."</td>
					<td>".$row1['drug_name']."</td>
					<td>".$row1['price']."</td>
					<td>".$row1['qty']."</td>
					<td>".$row1['total']."</td>
					
					
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

				";
				?>
			</table>
		</div>
	</body>
</html>