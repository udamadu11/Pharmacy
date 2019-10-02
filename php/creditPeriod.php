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
$query = "SELECT * FROM purchase";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($result)){
		$credit_date = $row['date'];
		$paid = $row['paid'];
		$today = date('Y-m-d');
		$exp =strtotime($credit_date);
		$td = strtotime($today);

		$warning_days = 83;
		$seconds_diff = $warning_days * 24 * 3600;
		$warning_timestamp = $exp + $seconds_diff;
		$warning_date = date('Y-m-d', $warning_timestamp);
		
		if ($paid == 0) {
			
			if ($warning_date <= $today) {

			$purchase_id = $row['purchase_id'];
			$supplier_id = $row['supplier_id'];
			$date = $row['date'];
			$invoice = $row['invoice'];

			$sqlCreidtOwner = "INSERT INTO pur_tem (purchase_id,supplier_id,date,invoice) VALUES ('$purchase_id','$supplier_id','$date','$invoice')";
			$resultCreditOwner =mysqli_query($con, $sqlCreidtOwner);
	


	}

		}
		

}
$query = "SELECT * FROM pur_tem";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($result)){
			$purchase_id = $row['purchase_id'];
			$supplier_id = $row['supplier_id'];
			$date = $row['date'];
			$invoice = $row['invoice'];
			echo "
			

	<div class=\"card\" style=\"width:18rem; float:left;margin-left:100px;margin-top:40px;\">
  <div class=\"card-header\" style=\"background-color:skyblue;\">
    Credit Period Notification
  </div>
  <ul class=\"list-group list-group-flush\">
    <li class=\"list-group-item\"> Purchase Id : $purchase_id</li>
    <li class=\"list-group-item\"> supplier Id : $supplier_id</li>
    <li class=\"list-group-item\"> Date : $date</li>
    <li class=\"list-group-item\"> Invoice : $invoice</li>
    <li class=\"list-group-item\">
    <form method=\"post\" class=\"dl\">
		<input class=\"btn btn-info\" type=\"submit\" name=\"submit\" value=\"Send mail\" style =\"margin-left:50px;\">
	</form></li>
   
  </ul>
</div>

			";
		}
		

if(isset($_POST['submit'])){ 
			$to = "udaramadumalka3@gmail.com";
			$subject = "Notification of PHARMA-PRO About Credit Period";
			$message = "Your Credit :" . $invoice ." "."To"." "."Supplier id is :".$supplier_id." And Purchase Id is ".$purchase_id;

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
	
			

	
?>


</body>
</html>