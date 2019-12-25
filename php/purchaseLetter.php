
<!DOCTYPE>
<html>
<head>
    <title> Purchase Confirmation Letter | Inwa </title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
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
                        Inwa Automotives <br>
                        No. 156/3/H , <br>
                        New Kandy Rd, <br>
                        Bandarawatta, <br>
                        Biyagama. <br>
                    </td>
                
                </tr>


                <tr style="height:5rem"></tr>
                <tr><td>Invoice No :</td> <td style= "width: 200px"><?php echo $invoice ?></td></tr>
                <tr><td>Purchase Date :</td><td style= "width: 200px"><?php echo $date ?></td></tr>
                <tr style="height:5rem"></tr>
            </table>

            <table width="100%" >
                <tr><td><strong>Item</strong></td><td><strong>Quantity</strong></td><td><strong>Unit Price</strong></td><td><strong>Discount</strong></td><td><strong>Total</strong></td></tr>
                <?php
                    include('include/connection.php');
                    $sql2 = mysqli_query($con,"SELECT `id`, `price`, `qty`, `total` FROM `purchase_item` WHERE `id` = '$purch_id'");

                    $total  = 0 ;

                    while ($row = mysqli_fetch_row($sql2)) {

                        $item = mysqli_fetch_row(mysqli_query($con, "SELECT `drug_name` FROM `purchase_item` WHERE `id` = '$row[0]'"))[0];
                        $total = $total + $row[4];
                        

                        echo "<tr> <td>".$item."</td> <td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]." </td><td>".$row[4]."</td></tr>";

                    }
                ?>


            <tr style="height:2rem"></tr>
            <tr><td></td><td></td><td></td><td><strong>Total</strong></td> <td><strong>RS. <?php echo $total; ?>.00</strong></td></tr>
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