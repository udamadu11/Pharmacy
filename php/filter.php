<!DOCTYPE html>
<html>
<head>
	<title>Filter</title>
</head>
<body>
	<?php
include('include/connection.php'); 
if(isset($_POST["from_date"], $_POST["to_date"])){
	$query = "SELECT iv.date AS 'dates',i.drug_name,SUM(iv.qty) AS 'qtys' FROM invoice_items iv LEFT JOIN batch i ON iv.drug_id=i.drug_id WHERE iv.qty>0 AND iv.date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' GROUP BY iv.drug_id  ORDER BY qtys DESC LIMIT 10";
	$result = mysqli_query($con,$query);
	echo "
		 <table class=\"table table-hover table-bordered\" border=\"1\" width=\"100%\">
                <tr>
                    <th>#</th>
                    <th>Drug Name</th>
                    <th>Selling quantity</th>
             	</tr>";                
            $counter = 0;
  
            	while ($row = mysqli_fetch_array($result)) {
                $counter++;
                echo "
                	<tr>
                       	<td>$counter</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                    </tr>
                ";  
            }

           
     
        

	}
?>
</body>
</html>
