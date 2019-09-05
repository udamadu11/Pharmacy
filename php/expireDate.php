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
									
			</tr>
			</table>
			";
			
		}
}
//
?>
