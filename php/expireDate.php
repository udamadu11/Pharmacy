<?php 
include('include/connection.php');
$query = "SELECT * FROM batch";
$query = mysqli_query($con,$query);


while($row = mysqli_fetch_assoc($query)){
		$exp_date = $row['ex_date'];
		$today = date('Y-m-d H:i:s');
		$exp =strtotime($exp_date);
		$td = strtotime($today);

		$warning_days = 14;
		$seconds_diff = $warning_days * 24 * 3600;
		$warning_timestamp = $exp - $seconds_diff;
		$warning_date = date('Y-m-d', $warning_timestamp);
		echo $warning_date;
}
?>
