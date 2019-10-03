<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/addStock.css">
</head>
<body>
	<div class="error-msg"><h3><?php include('include/message.php'); ?></h3></div>
	<form class="searchDrug" method="post" action="addStock.php">
		<h2>Search by Id</h2>
		<input type="text" name="searchId" id="searchId" placeholder="Enter Drug Id" class="input">
		<input type="submit" name="submit" value="Search">
	</form>
<?php
	if (isset($_POST['submit'])) {
			$drug_id = $_POST['searchId'];
			$search_id = "SELECT * FROM drug WHERE drug_id ='$drug_id'";
			$query= mysqli_query($con,$search_id);

			echo "<table>
				<tr>
					<th>Drug Id</th>
					<th>Drug Name</th>
					<th>Drug Category</th>
					<th>Drug Brand</th>
					<th>Drug Price</th>
					<th>Action</th>
				</tr>";

			if (mysqli_num_rows($query) > 0) {
						while($row = mysqli_fetch_assoc($query)){
							echo "<tr>
									<td>".$row['drug_id']."</td>
									<td>".$row['drug_name']."</td>
									<td>".$row['category']."</td>
									<td>".$row['brand']."</td>
									<td>".$row['price']."</td>
									<td>
										<form method=\"post\">
										<input type=\"hidden\" value=".$row['drug_id']." name=\"del\">
										<input type=\"submit\" name=\"btn\" class=\"btn btn-success\" value=\"Add Stock\" style=\"width:100px;margin-top:10px;\">
										</form>

									</td>
								</tr>";
						}
					}else{
			$message = base64_encode(urlencode("Invalid Drug id"));
        	header('Location:addStock.php?msg=' . $message);
        	exit();
		}		
		}
 ?>
</body>
</html>
<?php 
	if (isset($_POST['btn'])) {
		$drugId = $_POST['drug_id'];
		$
	}

?>