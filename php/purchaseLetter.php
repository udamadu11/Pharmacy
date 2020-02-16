<?php 
    include ('include/connection.php');
    $select = "SELECT * FROM purchase_temp";
    $result = mysqli_query($con,$select);

    $row = $result -> fetch_assoc();
    $invoice  = $row['invoice'];
    $date  = $row['pdate'];
    $supplier  = $row['supplier'];

    $select_supplier = "SELECT * FROM supplier WHERE supplier_id = '$supplier'";
    $result_query = mysqli_query($con,$select_supplier);
    $row1 = $result_query -> fetch_assoc();
    $name = $row1['supplier_name'];
    $location = $row1['location'];
?>
<!DOCTYPE>
<html>
<head>
    <title> Purchase Confirmation Letter</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
    <body class="font">
            <div class="container" style="margin-top: 100px;box-shadow: 0 0 15px 0 lightgrey;padding: 10px 10px;">
            <div class="row">
        <div class='printablearea'  id="printablearea" style="margin-left: 120px;">
                <div class="alert alert-info" role="alert" style="text-align: center;">
                    <h2>Purchase Acceptance Confirmation</h2>
                </div>
            <hr>
            <table border="0">
                <tr>
                    <td style="width: 200px"><?php echo $name;?><br>
                        <?php echo $location;?>.<br>
                    </td>
                    <td style="width: 100px"></td>
                    <td style="width: 100px"></td>
                    <td style="width: 100px"></td>
                    <td style="width: 100px"></td>


                    <td style="width: 200px;">
                        Pallawatta Pharmacy <br>
                        Pallawattta Rd, <br>
                        Pallawatta <br>
                    </td>
                
                </tr>


                <tr style="height:5rem"></tr>
                <tr><td>Invoice No :</td> <td style= "width: 200px"><?php echo $invoice ?></td></tr>
                <tr><td>Purchase Date :</td><td style= "width: 200px"><?php echo $date ?></td></tr>
                <tr style="height:5rem"></tr>
            </table>

            <table width="100%"  class="table table-hover">
                <tr><td><strong>Item</strong></td><td><strong>Quantity</strong></td></tr>
                <?php
                    include('include/connection.php');
                    $sql2 = mysqli_query($con,"SELECT `pidd`, `qty` FROM `purchase_temp`");

                    while ($row = mysqli_fetch_row($sql2)) {

                        $item = mysqli_fetch_row(mysqli_query($con, "SELECT `drug_name` FROM `purchase_temp` WHERE `pidd` = '$row[0]'"))[0];
                        

                        echo "<tr> <td>".$item."</td> <td>".$row[1]."</td></tr>";

                    }
                ?>


            

            </table>

            <p>The above methioned purchase order was received and accepted.<br> <br> We look forward to do more business with you.</p>

            <hr>
            <br > <br> <br> <br> 
            <p>........................................................................... <br > <br> 
            Manager - </p>



        </div>


            <br > <br> <br> <br>
        </div> 
        </div>
        <div class="row">
            <div class="col-3" style="margin-left: 500px;margin-top: 20px;">
                <button class="btn btn-info" onclick="printDiv('printablearea')" style="width: 400px;">Print</button>
                <script type="text/javascript">
                    function printDiv(divName) {
                         var printContents = document.getElementById(divName).innerHTML;
                         var originalContents = document.body.innerHTML;

                         document.body.innerHTML = printContents;

                         window.print();

                         document.body.innerHTML = originalContents;
                    }
                </script>
            </div>
        </div>
        
    </body>
</html>
