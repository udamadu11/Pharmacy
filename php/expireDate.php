<!DOCTYPE html>
<html>
<head>
	<title>Expiry Date</title><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php 
include('include/connection.php');
$query = "SELECT * FROM batch";
$result = mysqli_query($con,$query);


while($row = mysqli_fetch_assoc($result)){
		$exp_date = $row['ex_date'];
		$today = date('Y-m-d');
		$exp =strtotime($exp_date);
		$td = strtotime($today);

		$warning_days = 97;
		$seconds_diff = $warning_days * 24 * 3600;
		$warning_timestamp = $exp - $seconds_diff;
		$warning_date = date('Y-m-d', $warning_timestamp);
		
		if ($warning_date <= $today) {

			$batch_no = $row['batch_no'];
			$drug_name = $row['drug_name'];
			$brand = $row['brand'];
			$ex_date = $row['ex_date'];
			$purchase_id = $row['purchase_id'];
			$available_quantity = $row['available_quantity'];
			echo "
			

	<div class=\"card\" style=\"width:16rem; float:left;margin-left:100px;margin-top:40px;\">
  <div class=\"card-header\" style=\"background-color:skyblue;\">
    Expiry Date Notification
  </div>
  <ul class=\"list-group list-group-flush\">
    <li class=\"list-group-item\"> Batch No : $batch_no</li>
    <li class=\"list-group-item\"> Drug Name : $drug_name</li>
    <li class=\"list-group-item\"> Brand : $brand</li>
    <li class=\"list-group-item\"> Expiry Date : $ex_date</li>
    <li class=\"list-group-item\"> Purchase Id : $purchase_id</li>
    <li class=\"list-group-item\"> Available Quantity : $available_quantity</li>
  
  </ul>
</div>

			";
		}
}

?>

</body>
</html>
