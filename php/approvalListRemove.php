<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Approval list..</title>
	<link rel="stylesheet" type="text/css" href="../css/approvalList.css">
</head>
<body>
	<h3 class="error-msg"><?php include('include/message.php'); ?>
	
<?php
	$sql = "SELECT * FROM tem2";
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
			<th>Remove</th>
		</tr>


				<tr>
					<td>".$row['supplier_id']."</td>
					<td>".$row['supplier_name']."</td>
					<td>".$row['location']."</td>
					<td>".$row['email']."</td>
					<td>".$row['contact_no']."</td>
					<td>".$row['credit_period_allowed']."</td>
					<td>
								<form method=\"post\" class=\"remove\">
									<input type=\"hidden\" value=".$row['supplier_id']." name=\"remove\">
									<input class=\"btn\" type=\"submit\" name=\"del\" value=\"Yes\">
								</form>

					</td>
					<td>
								<form method=\"post\" class=\"remove\">
									<input type=\"hidden\" value=".$row['supplier_id']." name=\"rem\">
									<input class=\"btn\" type=\"submit\" name=\"no\" value=\"No\">
								</form>

					</td>
				</tr>";
		}
	echo "</table";
	}else{
		echo "<script>alert('No Pending !')</script>";
	}
	
	
?>

	</table>
</body>
</html>
<?php 
if (isset($_POST['del'])) {
	$sid = $_POST['remove'];
	$delete_query ="DELETE FROM tem2 WHERE supplier_id = '$sid' ";
	$delete_result = mysqli_query($con,$delete_query);

	$s_id = $_POST['remove'];
	$delete_query2 ="DELETE FROM supplier WHERE supplier_id = '$s_id' ";
	$delete_result2 = mysqli_query($con,$delete_query2);

	$massage = base64_encode(urlencode("Decline Successfully"));
	header('Location:approvalList.php?msg=' .$massage);
	exit();
	}
if (isset($_POST['no'])) {
	$id = $_POST['rem'];
	$no_query ="DELETE FROM tem2 WHERE supplier_id = '$id' ";
	$no_result = mysqli_query($con,$no_query);
	header('Location:approvalList.php?msg=' .$massage);
	exit();
}

?>
