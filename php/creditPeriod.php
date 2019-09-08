<?php 
include('include/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Credi period notification</title>
</head>
<body>

	<table>
			<tr>
					<th>Batch No</th>
					<th>Drug Name</th>
					<th>Brand</th>
					
					
			</tr>
<?php 
include('include/connection.php');
$query = "SELECT * FROM broughtin";
$result = mysqli_query($con,$query);


while($row = mysqli_fetch_assoc($result)){
		$exp_date = $row['credit_period'];
		$today = date('Y-m-d');
		$exp =strtotime($exp_date);
		$td = strtotime($today);

		$warning_days = 22;
		$seconds_diff = $warning_days * 24 * 3600;
		$warning_timestamp = $exp - $seconds_diff;
		$warning_date = date('Y-m-d', $warning_timestamp);
		
		if ($warning_date == $today) {
			echo "
			<tr>
				<td>".$row['invoice_no']."</td>
				<td>".$row['date']."</td>
				<td>".$row['supplier_id']."</td>
								
			</tr>
			</table>
			";
		}
			
		}


?>


</body>
</html>