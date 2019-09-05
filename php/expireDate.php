<?php 
include('include/connection.php');
$query = "SELECT * FROM batch";
$query = mysqli_query($con,$query);


while($row = mysqli_fetch_assoc($query)){
		$exp_date = $row['ex_date'];
		$today = date('Y-m-d');
		$exp =strtotime($exp_date);
		$td = strtotime($today);

		$warning_days = 14;
		$seconds_diff = $warning_days * 24 * 3600;
		$warning_timestamp = $exp - $seconds_diff;
		$warning_date = date('Y-m-d', $warning_timestamp);
		
		if ($warning_date == $today) {
			echo "
			<table>
			<tr>
					<th>Batch No</th>
					<th>Drug Name</th>
					<th>Brand</th>
					<th>Quantity</th>
					<th>Box</th>
					<th>Manufacuring Date</th>
					<th>Expiry Date</th>
					<th>value</th>
					<th>Supplier Id</th>
					<th>Send Email</th>
			</tr>

			<tr>
									<td>".$row['batch_no']."</td>
									<td>".$row['drug_name']."</td>
									<td>".$row['brand']."</td>
									<td>".$row['quantity_box']."</td>
									<td>".$row['no_of_boxes']."</td>
									<td>".$row['manu_date']."</td>
									<td>".$row['ex_date']."</td>
									<td>".$row['sales_value']."</td>
									<td>".$row['supplier_id']."</td>
									<td>
										<form method=\"post\" class=\"send\">
										<input type=\"hidden\" value=".$row['supplier_id']." name=\"send\">
										<input class=\"btn\" type=\"submit\" name=\"submit\" value=\"Send\">
										</form>
									</td>
			</tr>
			</table>
			";
			
		}
}

if (isset($_POST['submit'])) {
			$supplier_id = $_POST['send'];
			$search_query = "SELECT * FROM supplier WHERE supplier_id = '$supplier_id'";
			$query = mysqli_query($con,$search_query);
	while($row = mysqli_fetch_assoc($query)){
		$send_email = $row['email'];
		echo "string".$send_email;
	}
}
?>
