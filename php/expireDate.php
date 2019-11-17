<!DOCTYPE html>
<html>
<head>
	<title>Expiry Date</title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php 
include('include/connection.php');
//Retrive batch table data
$query = "SELECT * FROM batch";
$result = mysqli_query($con,$query);

//Fetch data result row as an associative array
while($row = mysqli_fetch_assoc($result)){
		$exp_date = $row['ex_date'];
		$today = date('Y-m-d');//get today data with date function
		$exp =strtotime($exp_date); //Parse about any English textual datetime description into a Unix timestamp
		$td = strtotime($today);

		$warning_days = 80;
		$seconds_diff = $warning_days * 24 * 3600;
		$warning_timestamp = $exp - $seconds_diff;
		$warning_date = date('Y-m-d', $warning_timestamp);
		
		//if today date is gretter than or equal to warning date display expire dates
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
