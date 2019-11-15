<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<!DOCTYPE html>
<html> 
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container" style="margin-top: 50px">
		<table class="table table-hover">
		<tr>
			<th>Drug Id</th>
			<th>Drug Name</th>
			<th>Category</th>
			<th>Reoder Level</th>
			<th>Supplier Id</th>
			<th>Price</th>
			<th>Brand</th>
		</tr>
		<?php
			//retrive all the data from drug table
			$sql = "SELECT drug_id,drug_name,category,reorder_level,supplier_id,price,brand FROM drug";

			//Performs a query on Database
			$result = $con->query($sql);

			if($result-> num_rows > 0 ){//Return the number of rows in result set
				while ($row = $result-> fetch_assoc()){//Fetch a result row as an associative array
					echo "<tr>
							<td>".$row['drug_id']."</td>
							<td>".$row['drug_name']."</td>
							<td>".$row['category']."</td>
							<td>".$row['reorder_level']."</td>
							<td>".$row['supplier_id']."</td>
							<td>".$row['price']."</td>
							<td>".$row['brand']."</td>
						</tr>";
				}
			echo "</table";
			}
			$con->close();
		?>		
 <?php 
  include('include/connection.php');
  $sql = "SELECT drug.drug_id,drug.drug_name,drug.reorder_level, stock.current_stock FROM drug INNER JOIN stock ON drug.drug_id = stock.drug_id";
  $query= mysqli_query($con,$sql);
  if (mysqli_num_rows($query) > 0) {
  while($row = mysqli_fetch_assoc($query)){
echo"
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@8.17.1/dist/sweetalert2.all.min.js'></script>
   <script type='text/javascript'>
    $(document).ready(function(){
Swal.fire('Low Drug List Here')
    })
     
   </script>";
      }
    }

?>
	</table>
	</div>
</body>
</html>