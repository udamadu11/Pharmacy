<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3"  id="print_area">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>pelawatta Pharmacy</strong>
                        <br>
                        297,Pannipitiya road,
                        <br>
                        Pelawatta,Battaramulla.
                        <br>
                    </address>
                    <?php $today = date('Y-m-d'); 
                    echo $today;
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                <table class="table table-hover">
                    <tr>
                       <th>Drug</th> 
                       <th>Price</th> 
                       <th>Quantity</th> 
                       <th>Total</th> 
                    </tr>
                    <?php
                        $full_total = 0;
                        include ('include/connection.php');
                        $select_query = "SELECT * FROM invoice_temp";
                        $result= mysqli_query($con,$select_query);
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>
                                    <td>".$row['drug_name']."</td>
                                    <td>".$row['price']."</td>
                                    <td>".$row['qty']."</td>
                                    <td>".$row['total']."</td>
                        </tr>
                            ";
                            $full_total += $row['total'];
                        }

                     ?>

                     <tr>
                         <td></td>
                         <td></td>
                         <td>Total</td>
                         <td><?php echo $full_total ?></td>
                     </tr>
                </table>
            </div>
        </div>
                <div class="container" style="margin-left: 280px;">
                <form method="post">
                    <div class="col-md-8">
                        <button type="button" name="button" class="btn btn-success btn-lg btn-block" onclick="printDiv('print_area')">Print Now</button></td>
                    <input type="submit" name="btn3" class="btn btn-danger btn-lg btn-block" value="Issue Now"></td>
                    </div>
                    
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>

                        <?php
if (isset($_POST['btn2'])) {
        $sqlIssue = "SELECT * FROM invoice_temp";
        $resIssue = mysqli_query($con,$sqlIssue);
        
        while($rowIssue=mysqli_fetch_array($resIssue)){
            $id = $rowIssue['id'];
            $drug_id = $rowIssue['drug_id'];
            $qty = $rowIssue['qty'];
            $dateItem = date("Y-m-d H:i:s");
            //After issuing selling item insert invoice item table
            $sq = "INSERT INTO invoice_items(invoice_no,drug_id,qty,date)VALUES('$id','$drug_id','$qty','$dateItem')";
            $query = mysqli_query($con,$sq);        
    }
        $today = date('Y-m-d');
        //After issuing invoice data insert to invoice table
        $issueSql = "INSERT INTO invoice(date,total)VALUES('$today','$full_total')";
        $IssuResult = mysqli_query($con,$issueSql);

       
        }

 if(isset($_POST['btn3'])){
     $delete_query ="DELETE  FROM invoice_temp";
        $delete_result = mysqli_query($con,$delete_query);

        if ($delete_query) {
            echo "<script>alert('Issue succesfully')</script>";
            echo "<script>window.open('issueDrug.php','_self')</script>";
        }
 }


                     ?>
    <script type="text/javascript">
                            function printDiv(divName) {
                                 var printContents = document.getElementById(divName).innerHTML;
                                 var originalContents = document.body.innerHTML;

                                 document.body.innerHTML = printContents;

                                 window.print();

                                 document.body.innerHTML = originalContents;
                        }
                    </script>

