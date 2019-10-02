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
    	<input type=\"hidden\" value=".$row['purchase_id']." name=\"paid\">
		<input class=\"btn btn-info\" type=\"submit\" name=\"submit\" value=\"Paid\" style =\"margin-left:50px;\">
	</form></li>
   
  </ul>
</div>

			";
		}
			
	if (isset($_POST['submit'])) {
	$Cid = $_POST['paid'];

	$update = "UPDATE purchase SET paid = 1 WHERE purchase_id = '$Cid'";
	mysqli_query($con,$update);

	$delete_query ="DELETE FROM pur_tem WHERE purchase_id = '$Cid' ";
	$delete_result = mysqli_query($con,$delete_query);

	if ($delete_result) {
		echo "<script>window.open('creditOwnerNotification.php','_self')</script>";
		}
	}		
?>


</body>
</html>