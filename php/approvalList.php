<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Approval list</title>
	<link rel="stylesheet" type="text/css" href="../css/approvalList.css">
</head>
<body>
	<h3 class="error-msg"><?php include('include/message.php'); ?>
	
<?php
	$sql = "SELECT * FROM tem";
	$result = $con->query($sql);
	if($result-> num_rows > 0 ){
		while ($row = $result-> fetch_assoc()){
			echo "
		<table>
		<tr>
			<th>Supplier Id</th>
			<th>Supplier Name</th>
			<th>Location</th>
			<th>Email</th>
			<th>Contact number</th>
			<th>Credit Period</th>
			<th>Approve</th>
			<th>Decline</th>
		</tr>
				<tr>
					<td>".$row['supplier_id']."</td>
					<td>".$row['supplier_name']."</td>
					<td>".$row['location']."</td>
					<td>".$row['email']."</td>
					<td>".$row['contact_no']."</td>
					<td>".$row['credit_period_allowed']."</td>
					<td>
								<form method=\"post\" class=\"approval\" action=\"approval.php\">
									<input type=\"hidden\" value=".$row['supplier_id']." name=\"approval\">
									<input class=\"btn\" type=\"submit\" name=\"approve\" value=\"Approve\">
								</form>

					</td>
					<td>
								<form method=\"post\" class=\"approval\" action=\"approval.php\">
									<input type=\"hidden\" value=".$row['supplier_id']." name=\"approval2\">
									<input class=\"btn2\" type=\"submit\" name=\"decline\" value=\"Decline\">
								</form>

					</td>
				</tr>";
		}
	echo "</table";
	}else{
		echo "<script>alert('No Pending !')</script>";
        
	}
	
	$con->close();
?>

	</table>
</body>
</html>
