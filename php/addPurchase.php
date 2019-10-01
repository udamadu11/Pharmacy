<?php include('include/connection.php'); ?>
<?php 
	if(isset($_POST['submit'])){ 

		$supplier_id=$_POST['supplier_id'];
		$date=$_POST['date'];
		$invoice=$_POST['invoice'];
		

		$sql = "INSERT INTO drug (supplier_id,date,invoice) VALUES ('$supplier_id','$date','$invoice')";
		mysqli_query($con, $sql);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Purchase</title>
	<link rel="stylesheet" type="text/css" href="../css/addDrug.css">
</head>
<body>
	<form class="addDrug" method="post">
		<img src="../img/pharmacist.png">
		<h2>Add Drug</h2>
		<div class="input_fields">
				
				<p>Drug Id</p>
				<input type="number" class="input" name="drug_id" id="drug_id" placeholder="Enter Drug Id">

				
		</div>
		<input type="submit" name="submit" value="Add Drug">
	</form>
</body>
</html>