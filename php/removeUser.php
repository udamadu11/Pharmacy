<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<?php
    //Unauthorized Access Check
    checkSession();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != '4'){
       header("Location:login.php");
       exit();
       }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/removeUser.css">
</head>
<body>
<form method="post" class="remove">
	<h2>Search By Name</h2>
	<input type="text" name="searchName" id="searchName" placeholder="Enter the Name" class="input">
	<input type="submit" name="submit" value="Search">
</form>
<?php
	if (isset($_POST['submit'])) {
		$user = $_POST['searchName'];
		$search = "SELECT * FROM employee WHERE u_name = '$user'";
		$query = mysqli_query($con,$search);

		echo "<table>
			<tr>
			<th>Id</th>
			<th>F_Name</th>
			<th>L_Name</th>
			<th>U_Name</th>
			<th>Email</th>
			<th>Telephone</th>
			<th>Nic</th>
			<th>Password</th>
			<th>Type</th>
			<th>Delete</th>

			</tr>";
			if (mysqli_num_rows($query) > 0) {
				while ($rows = mysqli_fetch_assoc($query)) {
					echo "
						<tr>
							<td>".$rows['id']."</td>
							<td>".$rows['f_name']."</td>
							<td>".$rows['l_name']."</td>
							<td>".$rows['u_name']."</td>
							<td>".$rows['email']."</td>
							<td>".$rows['tp']."</td>
							<td>".$rows['nic']."</td>
							<td>".$rows['password']."</td>
							<td>".$rows['type']."</td>
							<td>
								<form method=\"post\" class=\"delete\">
									<input type=\"hidden\" value=".$rows['id']." name=\"delete\">
									<input class=\"btn\" type=\"submit\" name=\"submit1\" value=\"Delete\">
								</form>

							</td>
						</tr>

					";
				}
			}
	}
	if (isset($_POST['submit1'])) {
	$d_id = $_POST['delete'];
	$delete_query ="DELETE FROM employee WHERE id = '$d_id' ";
	$delete_result = mysqli_query($con,$delete_query);
	}
	mysqli_close($con);

?>
</body>
</html>