<?php include('include/connection.php'); ?><!-- include database connection-->
<!DOCTYPE html>
<html>
<head>
	<title>Low drug List</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
	<div class ="container" style="margin-top:100px;">
		<div class="alert alert-info" role="alert" style="font-weight:bold;font-size: 24px;">
  		<center>List of Low Drugs</center>
		</div>
		<table class="table table-hover">
							<tr>
									<th>Drug Id</th>
									<th>Drug Name</th>
									<th>supplier Id</th>
									<th>Reoder Level</th>
									<th>Current Stock</th>
							</tr>
<?php 
	//Retrive data from drug table and stock table using inner join
	$sql = "SELECT drug.drug_id,drug.drug_name,drug.supplier_id,drug.reorder_level, stock.current_stock FROM drug INNER JOIN stock ON drug.drug_id = stock.drug_id";
	//Performs a query on databse
	$query= mysqli_query($con,$sql);
	//Return number of rows in result set
	if (mysqli_num_rows($query) > 0) {
	//Fetch result row as an associative array
	while($row = mysqli_fetch_assoc($query)){
	$drugId = $row['drug_id'];
	$drugName = $row['drug_name'];
	$reoderLevel = $row['reorder_level'];
	$currentStock = $row['current_stock'];

	//if current stock less than or equal to reorder level generate alert  
	if ($currentStock <= $reoderLevel) {
		echo "
					<tr>
									<td>".$row['drug_id']."</td>
									<td>".$row['drug_name']."</td>
									<td>".$row['supplier_id']."</td>
									<td>".$row['reorder_level']."</td>
									<td>".$row['current_stock']."</td>
							</tr>
					</div>
				";
	}
}
// $supplier = "SELECT * FROM supplier WHERE supplier_id = '$supplier_id'";
// 		$supplier_result = mysqli_query($con,$supplier);
// 		if(mysqli_num_rows($supplier_result) > 0){
// 			while($rows = mysqli_fetch_assoc($supplier_result)){
// 				$supplier_name = $rows['supplier_name'];
// 			}
// 		}

// $show = "SELECT * FROM `".$supplier_name."`";
// 	$show_result = mysqli_query($con,$show);
// 	if(mysqli_num_rows($show_result) > 0){
// 		while($row2 = mysqli_fetch_assoc($show_result)){
// 			echo "
// 				<table>	
// 						<tr>
// 							<th>Id<th>
// 							<th>supplier Id<th>
// 							<th>Item NO<th>
// 							<th>Drug Name<th>
// 							<th>Quantity<th>
// 						</tr>
// 						<tr>
// 							<td>".$row2['id']."</td>
// 							<td>".$row2['supplier_id']."</td>
// 							<td>".$row2['item_no']."</td>
// 							<td>".$row2['drug_name']."</td>
// 							<td>".$row2['quantity']."</td>
// 						</tr>
// 				</table>

// 			";
// 		}
// 	}

}

// <form method=\"post\">
// 									<input type=\"submit\" class=\"btn btn-info\" name=\"send\" value=\"Send Mail\">
// 									<input type=\"hidden\" name=\"drugId\" value=".$row['drug_id'].">
// 									<input type=\"hidden\" name=\"drugName\" value=".$row['drug_name'].">
// 									</form>
// if (isset($_POST['send'])) {
// 	$druId = $_POST['drugId'];
// 	$druName = $_POST['drugName'];
// 			//Send mail to Pharmacist to fill reoder level notification
// 			$to = "udaramadumalka3@gmail.com";
// 			$subject = "NOTIFICATION OF PHARMA-PRO LOW DRUG LIST";
// 			$message = "<a href='http://localhost/Pharmacy/php/lowDrugList.php'>
// 			Low Drug Id : $druId & Low Drug Name : $druName</a>";

// 			$headers = "MIME-Version: 1.0" . "\r\n";
// 			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// 			$headers .= 'From: <udaramadumalka3@gmail.com>' . "\r\n";
// 			$mail = mail($to,$subject,$message,$headers);
// 			if ($mail) {
// 				echo "<script>alert('Thank You..!..We have sent an email to owner.')</script>";
// 			}
// 			else{
// 				echo "<script>alert('Error.')</script>";
// 			}
// }
?>
</table>
<!-- <a href="getOrder.php"><button class="btn btn-success" style="margin-left:935px;">See Purchase Orders</button></a> -->
</body>
</html>
