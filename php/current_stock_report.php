
<html>
    <head>
        <link href="../bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
        <title> Reports | Pharma-Pro </title>
    </head>  

    <body class="font">        
        
        <div class="row">
            <br>
            <br>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-12" >
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4 center big card-heading-blue">
                            Reports - Current Stock Level
                        </div>
                        <div class="col-sm-4">

                            <button class="btn btn-lg btn-success" style="float:right;"  onclick="PrintElem(this)"><i class="fa fa-user"></i> Print </button>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <?php
                        include ('include/connection.php');
                        //current stock
                        $result_stock = mysqli_query($con, "SELECT drug_name,current_stock FROM stock ORDER BY current_stock DESC");
                        ?>
                        <div class="col-sm-12">
                            <div id="print_area">
                                <table class="table table-hover table-bordered" border="1" width="100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>QTY.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $counter = 0;
                                        while ($row = mysqli_fetch_row($result_stock)) {
                                            $counter++;
                                            ?>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $row[0]; ?></td>
                                                <td><?php echo $row[1]; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       


        <script>
            function PrintElem(elem)
            {
                var mywindow = window.open('', 'PRINT', "");

                mywindow.document.write('<html><head><title>' + document.title + ' - Current Stock</title>');
                mywindow.document.write('</head><body >');
                mywindow.document.write('<h1>' + document.title + ' - Current Stock</h1>');
                mywindow.document.write(document.getElementById("print_area").innerHTML);
                mywindow.document.write('</body></html>');

                mywindow.document.close(); // necessary for IE >= 10
                mywindow.focus(); // necessary for IE >= 10*/

                mywindow.print();
                mywindow.close();

                return true;
            }
        </script>
    </body>
</html>