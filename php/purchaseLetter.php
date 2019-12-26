<?php 
    include ('include/connection.php');
    $select = "SELECT * FROM purchase_temp";
    $result = mysqli_query($con,$select);

    $row = $result -> fetch_assoc();
    $invoice  = $row['invoice'];
    $date  = $row['pdate'];
?>
<!DOCTYPE>
<html>
<head>
    <title> Purchase Confirmation Letter | Inwa </title>
</head>
    <body class="font">
            <div class="container">
            <div class="row">
                <div class="col-3 left-sidebar"></div>

                <div class="col-3"></div>

                <div class="col-6">      

        <div class='printablearea'  id="printablearea">
            <h2 style="text-align: center">Purchase Acceptance Confirmation</h2>
            <hr>
            <table border="0">
                <tr>
                    <td style="width: 200px"><?php echo $supplier_add[0];?><br>
                        <?php echo $supplier_add[1];?>,<br>
                        <?php echo $supplier_add[2];?>,<br>
                        <?php echo $supplier_add[3];?>,<br>
                        <?php echo $supplier_add[4];?>,<br>
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

            <table width="100%" >
                <tr><td><strong>Item</strong></td><td><strong>Quantity</strong></td><td><strong>Unit Price</strong></td><td><strong>Total</strong></td></tr>
                <?php
                    include('include/connection.php');
                    $sql2 = mysqli_query($con,"SELECT `pidd`, `price`, `qty`, `total` FROM `purchase_temp`");

                    $total  = 0 ;

                    while ($row = mysqli_fetch_row($sql2)) {

                        $item = mysqli_fetch_row(mysqli_query($con, "SELECT `drug_name` FROM `purchase_temp` WHERE `pidd` = '$row[0]'"))[0];
                        $total = $total + $row[3];
                        

                        echo "<tr> <td>".$item."</td> <td>".$row[2]."</td><td>".$row[1]."</td><td>".$row[3]."</td></tr>";

                    }
                ?>


            <tr style="height:2rem"></tr>
            <tr><td></td><td></td><td><strong>Total</strong></td> <td><strong>RS. <?php echo $total; ?>.00</strong></td></tr>
             <tr style="height:5rem"></tr>

            </table>

            <p>The above methioned purchase order was received and accepted.<br> <br> We look forward to do more business with you.</p>

            <hr>
            <br > <br> <br> <br> 
            <p>........................................................................... <br > <br> 
            Manager - </p>



        </div>


            <br > <br> <br> <br>
        </div> 


        
            <div class="col-3 right sidebar">
                <button class="btn btn-blue btn-large btn-wide" onclick="printDiv('printablearea')">Print</button>
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