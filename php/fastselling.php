<?php require_once('include/connection.php'); ?>
<?php require_once('include/session.php'); ?>

<html>
    <head>
        <link href="../css/reports.css" rel="stylesheet" type="text/css">
        <link href="../bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
        <title> Reports</title>
        
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
                            Reports - Selling Drugs
                        </div>
                        <div class="col-sm-4">

                            <button class="btn btn-lg btn-success" style="float:right;"  onclick="PrintElem(this)"><i class="fa fa-user"></i> Print </button>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <?php
                        include ('include/connection.php');
                       
                        $result_fast_move = mysqli_query($con, "SELECT i.drug_name AS 'name',SUM(iv.qty) AS 'qtys' FROM invoice_items iv LEFT JOIN batch i ON iv.drug_id=i.drug_id WHERE iv.qty>0 GROUP BY iv.drug_id  ORDER BY qtys DESC LIMIT 10");
                        ?>
                        <div class="col-sm-12">
                            <div id="print_area">
                                <table class="table table-hover table-bordered" border="1" width="100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Drug Name</th>
                                            <th>Selling quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $counter = 0;
                                        while ($row = mysqli_fetch_row($result_fast_move)) {
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

                mywindow.document.write('<html><head><title>' + document.title + ' - Fast Moving Items</title>');
                mywindow.document.write('</head><body >');
                mywindow.document.write('<h1>' + document.title + ' - Fast Moving Items</h1>');
                mywindow.document.write(document.getElementById("print_area").innerHTML);
                mywindow.document.write('</body></html>');

                mywindow.document.close(); 
                mywindow.focus(); 

                mywindow.print();
                mywindow.close();

                return true;
            }
        </script>
    </body>
</html>