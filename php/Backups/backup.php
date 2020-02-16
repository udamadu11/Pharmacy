<?php include('include/connection.php'); ?>
<?php
	$dbsevername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "pharmacy";
	$backupName= "backup.sql";
	$tables = array("supplier");

	$con = mysqli_connect($dbsevername, $dbUsername, $dbPassword,$dbName);
	$con->set_charset("utf8");

	$sql = "SHOW TABLE";
	$result = mysqli_query($con,$sql);

	while ($row = mysqli_fetch_row($result)) {
		
		$tables[] = $row[0];
		
	}

?>

<?php

	$sqlScript = "";

	foreach ($tables as $table) {

		$query = "SHOW TABLE $table ";
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_row($result);

		$sqlScript = "\n\n" . $row[1] . ";\n\n";

		$query = "SELECT * FROM $table";
		$result = mysqli_query($con,$query);

		$columnCount = mysql_num_fields($result);

		for($i = 0; $i < columnCount ; $i++ ){

			while (mysql_fetch_row($result)) {
				$sqlScript = "INSERT INTO $table VALUES("
					for($j = 0; $j < columnCount; $j++ ){
							$row[$j] = $row[$j]
					}
				# code...
			}
		}
	}













?>

