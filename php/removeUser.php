<?php require_once('include/connection.php'); ?><!-- include database connection -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
<form method="post" class="form-6">
	<h2>Search By Name</h2>
	<input type="text" name="searchName" id="searchName" placeholder="Enter the Name" class="input-4">
	<input type="submit" name="submit" value="Search" class="btn-6">
</form>
<?php
	if (isset($_POST['submit'])) {
		$user = $_POST['searchName'];
		//Select data from employee table by user name
		$search = "SELECT * FROM employee WHERE u_name = '$user'";
		//Performs a query on database
		$query = mysqli_query($con,$search);
		//Retrive employee table data
		echo "<table class=\"table\" style=\"margin-top:50px;\">
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
			if (mysqli_num_rows($query) > 0) {//Return the number of rows in result set
				while ($rows = mysqli_fetch_assoc($query)) {//Fetch a result row as an associative array
					echo "
						<tr>
							<td>".$rows['id']."</td>
							<td>".$rows['f_name']."</td>
							<td>".$rows['l_name']."</td>
							<td>".$rows['u_name']."</td>
							<td>".$rows['email']."</td>
							<td>".$rows['telephone']."</td>
							<td>".$rows['nic']."</td>
							<td>".$rows['password']."</td>
							<td>".$rows['type']."</td>
							<td>
								<form method=\"post\">
									<input type=\"hidden\" value=".$rows['id']." name=\"delete\">
									<input class=\"btn btn-danger\" type=\"submit\" name=\"submit1\" value=\"Delete\">
								</form>

							</td>
						</tr>

					";
				}
			}else{
		echo "<script>alert('Invalid User Name')</script>";
        echo "<script>window.open('removeUser.php','_self')</script>";
	}
	}
	if (isset($_POST['submit1'])) {
	$d_id = $_POST['delete'];
	//Delete Data from employee table by id After clicking delete button
	$delete_query ="DELETE FROM employee WHERE id = '$d_id' ";
	$delete_result = mysqli_query($con,$delete_query);
	if ($delete_result) {
		//after performs a query on database get alet 
		echo "<script>alert('Successfuly Removed...')</script>";
            echo "<script>window.open('removeUser.php','_self')</script>";
	}
	}
	mysqli_close($con);

?>
</div>
</body>
</html>