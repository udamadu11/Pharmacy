<?php include('include/session.php') ?>
<?php include('include/connection.php') ?>

<?php
    //Unauthorized Access_Check
    checkSession();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != '1'){
       header("Location:login.php");
       exit();
       }

?>
<!DOCTYPE html>
<html>
<head>
	<title>View Drugs Owner</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
</head>
<body>
	<div class="container"  style="margin-top: 100px;">
		<div class="alert alert-info" role="alert" style="font-weight:bold;font-size: 24px;">
  		<center>List of Drugs</center>
		</div>
		<table class="table table-hover">
			<tr style="font-size: 16px;padding: 10 10px;background-color: lightblue;font-weight: bold;">
				<td>Drug Name</td>
				<td>Brand</td>
				<td>Category</td>
				<td>Supplier_id</td>
				<td>Reorder Level</td>
				<td>Price</td>
			</tr>
			<?php
				include('include/connection.php');
				$select = "SELECT * FROM drug";
				$result = mysqli_query($con,$select);
				if($result-> num_rows > 0){
					while($row = $result->fetch_assoc()){
						echo "
						<tr>
							<td>".$row['drug_name']."</td>
							<td>".$row['brand']."</td>
							<td>".$row['category']."</td>
							<td>".$row['supplier_id']."</td>
							<td>".$row['reorder_level']."</td>
							<td>".$row['price']."</td>
						</tr>
						";
					}
					echo "</table>";
				}
			 ?>
		</table>
	</div>
</body>
</html>
