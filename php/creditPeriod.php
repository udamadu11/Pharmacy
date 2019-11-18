<?php 
include('include/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Credit period notification</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>

	
<?php 
include('include/connection.php');
$query = "SELECT * FROM purchase ";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($result)){
		$creditDate = $row['date'];
		$paid = $row['paid'];
		$today = date('Y-m-d');
		$exp = strtotime($creditDate);
		$td = strtotime($today);

		$warningDays = 74;
		$secondsDiff = $warningDays * 24 * 3600;
		$warningTimestamp = $exp + $secondsDiff;
		$warningDate = date('Y-m-d', $warningTimestamp);
		
		if ($warningDate <= $today) {
		if ($paid == 0) {

			$purchaseId = $row['purchase_id'];
			$supplierId = $row['supplier_id'];
			$date = $row['date'];
			$invoice = $row['invoice'];

			$sqlCreidtOwner = "INSERT INTO pur_tem (purchase_id,supplier_id,date,invoice) VALUES ('$purchaseId','$supplierId','$date','$invoice')";
			$resultCreditOwner = mysqli_query($con, $sqlCreidtOwner);
	


	}

		}
		

}
$query = "SELECT * FROM pur_tem";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_assoc($result)){
			$purchaseId = $row['purchase_id'];
			$supplierId = $row['supplier_id'];
			$date = $row['date'];
			$invoice = $row['invoice'];
			echo "
			

	<div class=\"card\" style=\"width:18rem; float:left;margin-left:100px;margin-top:40px;\">
  <div class=\"card-header\" style=\"background-color:skyblue;\">
    Credit Period Notification
  </div>
  <ul class=\"list-group list-group-flush\">
    <li class=\"list-group-item\"> Purchase Id : $purchaseId</li>
    <li class=\"list-group-item\"> supplier Id : $supplierId</li>
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