<?php include('include/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Low drug List</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class ="container" style="margin-top:100px;">
		<table class="table table-hover">
							<tr>
									<th>Drug Id</th>
									<th>Drug Name</th>
									<th>Reoder Level</th>
									<th>Current Stock</th>
							</tr>
<?php 
	$sql = "SELECT drug.drug_id,drug.drug_name,drug.reorder_level, stock.current_stock FROM drug INNER JOIN stock ON drug.drug_id = stock.drug_id";
	$query= mysqli_query($con,$sql);
	if (mysqli_num_rows($query) > 0) {
	while($row = mysqli_fetch_assoc($query)){
	$drugId = $row['drug_id'];
	$drugName = $row['drug_name'];
	$reoderLevel = $row['reorder_level'];
	$currentStock = $row['current_stock'];

	if ($currentStock <= $reoderLevel) {
		echo "
					<tr>
									<td>".$row['drug_id']."</td>
									<td>".$row['drug_name']."</td>
									<td>".$row['reorder_level']."</td>
									<td>".$row['current_stock']."</td>
									<td>
									<form method=\"post\">
									<input type=\"submit\" class=\"btn btn-info\" name=\"send\" value=\"Send Mail\">
									<input type=\"hidden\" name=\"drugId\" value=".$row['drug_id'].">
									<input type=\"hidden\" name=\"drugName\" value=".$row['drug_name'].">
									</form>
									</td>
							</tr>

					</div>
				";
	
	}
}
}
if (isset($_POST['send'])) {
	$druId = $_POST['drugId'];
	$druName = $_POST['drugName'];

			$to = "udaramadumalka3@gmail.com";
			$subject = "NOTIFICATION OF PHARMA-PRO LOW DRUG LIST";
			$message = "<a href='http://localhost/Pharmacy/php/lowDrugList.php'>
			Low Drug Id : $druId & Low Drug Name : $druName</a>";

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			$headers .= 'From: <udaramadumalka3@gmail.com>' . "\r\n";
			$mail = mail($to,$subject,$message,$headers);
			if ($mail) {
				echo "<script>alert('Thank You..!..We have sent an email to owner.')</script>";
			}
			else{
				echo "<script>alert('Error.')</script>";
			}
}
?>
</table>
</body>
</html>
