<!DOCTYPE html>
<html>
<head>
	<title>View Prescription</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<table class="table table-hover" style="margin-top: 100px;">
			<tr>
				<td>Image</td>
				<td>Decription</td>
				<td>Email</td>
				<td>Response</td>
			</tr>
			<?php
				include('include/connection.php');
				$select = "SELECT * FROM images";
				$result = mysqli_query($con,$select);
				if($result -> num_rows > 0){
					while($rows =$result ->fetch_assoc() ){
						echo "
							<tr>
								<td><img src=\"../../user/uploads/{$rows['image']}\" height=\"400px\"\ width=\"400px\"\"></td>
								<td>".$rows['text']."</td>
								<td>".$rows['email']."</td>
								<td>
									<form>
										<input type=\"hidden\" name=\"id\" value=".$rows['id'].">
										<input type=\"submit\" name=\"response\" class=\"btn btn-primary\" value=\"Response\">
									</form>
								</td>
							</tr>
						";
					}
				}
			?>
		</table>
	</div>
</body>
</html>