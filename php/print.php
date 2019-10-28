<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>
<!DOCTYPE html>
<html>
      <head>
            <link href="invoice.css" rel="stylesheet" type="text/css">
            <title> Invoice</title>
            
      </head>

<?php 

date_default_timezone_set("Asia/Colombo");
 $date= date("Y-m-d h:i:sa");

 $total = $_POST['total'];
 
 
 $sql = "INSERT INTO invoice VALUES (0,'$date',$total)";
 mysqli_query($con,$sql);
 $query = "SELECT * FROM invoice ORDER BY invoice_no DESC LIMIT 1";
 $record = mysqli_query($con,$query);
 $arr = array();
     while($data = mysqli_fetch_assoc($record)){
        $arr[]=$data;
    }

$temp = $_SESSION['as'] ;
foreach($arr as $a){ 
	$in=$a['invoice_no'];

	foreach ($temp as $drg) {
		$drgid=$drg['drug_id'];
		$qty=$drg['qty'];
		$sql1="INSERT INTO invoice_drugs values ($in,$drgid,$qty)";
		$a=mysqli_query($con,$sql1);
		if (!$a) {
	     die('Invalid query');
	    }
		

	}
}

$sql= "TRUNCATE invoice_temp";
mysqli_query($con,$sql);

unset($_SESSION['as']);
?>
      

      <body class="font">
            
        <div class="container">
            <div class="row">
                <div class="col-1 left-sidebar">
                   
                 </div>
                 <div class="col-1"></div>
        
                <div class="col-3 card-profile"  id="printable">                  
                    <div class="card-profile">
                        <div class="row">
                            <div class="col-2 card-heading-blue">
                                <center><br><h1>Invoice</h1> <br></center>
                            </div>
                        </div>
                        <div class="col-2 row">
                        <span>Date : <?php echo $date; ?> </span><br>
                                                  
                        </div>
                        <div class="col-12 row">
                        <?php foreach($arr as $a){ ?>
                        <Span>Invoice Number : bill<?php echo $a['invoice_no'];?> </Span> 
                        <?php } ?>
                    </div>

                        <br>

                        <div class="row col-2"> 
                           
                            <table class="table" style="text-align: left">
                                <tbody>
                                    <tr>
                                    <th>Drug Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    
                                    </tr>
                                   
                                    <?php 
                                    	 
                                        $total=0;

                                    	
                                    	foreach ($temp as $drg) {
                                    		$total+=$drg['total'];
                                        	
                                     ?>

                                    <tr>

                                       <td><?php print_r($temp[0]['drug_name']);?></td>
                                       <td><?php echo $drg['qty'];?></td>
                                       <td><?php echo $drg['price'];?>.00</td>
                                       <td><?php echo $drg['total'];?>.00</td>
                                                                       
                                    </tr>
                                <?php } ?>
                                    <tr>
                                        <td>Total</td>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $total; ?>.00</td>
                                    </tr>
                                    
                                    

                                    <tr>
                                        <td>Paid</td>
                                        <td></td>
                                        <td></td>
                                        <td> <?php echo $_POST['paid']; ?>.00                                                                
                                        </td>
                                       
                                    </tr>

                                    <tr>
                                        <td>Balance</td>
                                        <td></td>
                                        <td></td>
                                        <td> <?php echo  $_POST['paid'] - $_POST['total']; ?>.00                                                                
                                        </td>
                                       
                                    </tr>
                                    </tr>
                                </tbody>
                            </table>
                           
                           
                            </span>

                            </div>
                        </div></div>

                <div class="col-1 right-sidebar">
                	<button class="btn btn-green btn-large btn-wide" onclick="printDiv('printableArea')">Print</button>
                	<script type="text/javascript">
                		function printDiv(divName) {
						     var printContents = document.getElementById(divName).innerHTML;
						     var originalContents = document.body.innerHTML;

						     document.body.innerHTML = printContents;

						     window.print();

						     document.body.innerHTML = originalContents;
						}
                	</script>
                	<a href="http://localhost/Pharmacy/invoice1.php" class="btn btn-green btn-large btn-wide">Back</a>

                </div>
            </div>
        </div>

     </body>

</html>

