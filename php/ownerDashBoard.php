<?php include('include/session.php') ?>
<?php include('include/connection.php') ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Dash Board</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

 </head>
<body>


	<br/><br/>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card mx-auto">
				  <img class="card-img-top mx-auto" style="width:40%;margin-top: 10px;" src="../img/man11.png" alt="Card image cap">
				  <div class="card-body">
				    <h4 class="card-title">Profile Info</h4>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Udara</p>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Owner</p>
				    <?php 
				    	include('include/connection.php');
				    	$ownerQuery = "SELECT  * FROM employee";

				    ?>
				    <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-edit">&nbsp;</i>Edit Profile</button>
				  </div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="jumbotron" style="width:100%;height:100%;">
					<h1>Welcome Owner</h1>
					<div class="row">
						<div class="col-sm-6">
							<iframe src="http://free.timeanddate.com/clock/i616j2aa/n1993/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>

						</div>
						<div class="col-sm-6">
							<div class="card">
						      <div class="card-body">
						        <h4 class="card-title">Notifications</h4>
						        <p class="card-text">Here you can Manage your notifications</p>
						        <div class="btn-group">
									  <button type="button" class="btn btn-primary">Action</button>
									  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    <span class="sr-only">Toggle Dropdown</span>
									  </button>
									  <div class="dropdown-menu">
									  	<?php 
									  		include('include/connection.php');
									  		$sql1 = "SELECT * FROM tem";
											$result1 = $con->query($sql1);
											if($result1-> num_rows > 0 ){
												echo "<h5><a class=\"dropdown-item\" href=\"approvalList.php\" target=\"main\" style=\"color:red;\">Add Supplier Appro:</a></h5>";
											}
									  	
									  		
									  		$sql2 = "SELECT * FROM tem2";
											$result2 = $con->query($sql2);
											if($result2-> num_rows > 0 ){
												echo "<a class=\"dropdown-item\" href=\"approvalListRemove.php\" target=\"main\">remove Supplier Appro:</a>";
											}
									  
									  		
									  		$sql3 = "SELECT * FROM tem3";
											$result3 = $con->query($sql3);
											if($result3-> num_rows > 0 ){
												echo "<a class=\"dropdown-item\" href=\"approveAddDrug.php\" target=\"main\">Add Drug Appro:</a>";
											}
									 
									  		
									  		$sql4 = "SELECT * FROM tem4";
											$result4 = $con->query($sql4);
											if($result4-> num_rows > 0 ){
												echo "<a class=\"dropdown-item\" href=\"approveRemoveDrug.php\" target=\"main\">remove Drug Appro:</a>";
											}
									  	?>
									</div>
						      </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<p></p>
	<p></p>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Categories</h4>
						<p class="card-text">Here you can manage your categories and you add new parent and sub categories</p>
						<a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary">Add</a>
						<a href="manage_categories.php" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Employees</h4>
						<p class="card-text">Here you can manage your team and you can add new employee</p>
						<a href="addUser.php" class="btn btn-primary">Add</a>
						<a href="EditUser.php" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Products</h4>
						<p class="card-text">Here you can manage your products and you add new products</p>
						<a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary">Add</a>
						<a href="manage_product.php" class="btn btn-primary">Manage</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	


</body>
</html>