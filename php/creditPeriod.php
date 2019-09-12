<?php 
include('include/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Credit period notification</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> </head>
<body>

	
<?php 
include('include/connection.php');
$query = "SELECT * FROM broughtin";
$result = mysqli_query($con,$query);


while($row = mysqli_fetch_assoc($result)){
		$exp_date = $row['credit_period'];
		$today = date('Y-m-d');
		$exp =strtotime($exp_date);
		$td = strtotime($today);

		$warning_days = 14;
		$seconds_diff = $warning_days * 24 * 3600;
		$warning_timestamp = $exp - $seconds_diff;
		$warning_date = date('Y-m-d', $warning_timestamp);
		
		if ($warning_date <= $today) {

			$invoice_no = $row['invoice_no'];
			$supplier_id = $row['supplier_id'];
			$invoice_value = $row['invoice_value'];
			$credit_period = $row['credit_period'];
			echo "
			

	<div class=\"card\" style=\"width:18rem; float:left;margin-left:100px;margin-top:40px;\">
  <div class=\"card-header\" style=\"background-color:skyblue;\">
    Credit Period Notification
  </div>
  <ul class=\"list-group list-group-flush\">
    <li class=\"list-group-item\"> invoice No : $invoice_no</li>
    <li class=\"list-group-item\"> supplier Id : $supplier_id</li>
    <li class=\"list-group-item\"> invoice value : $invoice_value</li>
    <li class=\"list-group-item\"> credit Period : $credit_period</li>
    <li class=\"list-group-item\">
    <form method=\"post\" class=\"dl\">
		<input type=\"hidden\" value=\"$supplier_id\" name=\"send\">
		<input class=\"btn btn-info\" type=\"submit\" name=\"submit\" value=\"Send Email\" style =\"margin-left:50px;\">
	</form></li>
   
  </ul>
</div>

			";
		}
			
		}

if(isset($_POST['submit'])){ 

		$supplier_id = $_POST['send'];
		$select = "SELECT * FROM supplier WHERE supplier_id = '$supplier_id'";
		$result = $con->query($select);
		if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$email = $row['email'];

			
			$to = $email;
			$subject = "Notification of PHARMA-PRO About Credit Period";
			$message = "Your Credit .......";

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			$headers .= 'From: <udaramadumalka3@gmail.com>' . "\r\n";
			$mail = mail($to,$subject,$message,$headers);
			if ($mail) {
				echo "<script>alert('Thank You..!..We have sent an email to the Supplier.')</script>";
			}
			else{
				echo "<script>alert('Error.')</script>";
			}




		
	}
}
}
		
?>


</body>
</html>