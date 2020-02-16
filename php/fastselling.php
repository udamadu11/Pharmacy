<?php include('include/session.php') ?>
<?php include('include/connection.php') ?>

<?php
    //Unauthorized Access_Check
    checkSession();
    if(!isset($_SESSION['type']) || $_SESSION['type'] != '1'){
       header("Location:login.php");
       exit();
       }

?>
<html>
    <head>
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
           <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <title> Reports</title>
        
    </head>  

    <body class="font">        
        

        <div class="row">
            <br>
            <br>
        </div>

        <div class="container" style="margin-top: 100px;">
            <div class="row">
                <div class="col-sm-12" >
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="alert alert-primary" role="alert">
                            Reports - Selling Drugs
                        </div>
                        <div class="col-sm-4">

                            <button class="btn btn-lg btn-success" style="float:right;"  onclick="PrintElem(this)"><i class="fa fa-user"></i> Print </button>

                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="text" name="from_date" id="from_date" placeholder="From date" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="to_date" id="to_date" placeholder="To date" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <input type="button" name="filter" id="filter" value="filter" class="btn btn-info" style="width: 100px;">
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <?php
                        include ('include/connection.php');
                       //Retive selling data from invoice item table
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
        


        <script>//print Selling drug data
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

        <script>
            $(document).ready(function() {
               $.datepicker.setDefaults({
                    dateFormat: 'yy-mm-dd'                
               });
               $(function(){
                    $("#from_date").datepicker();
                    $("#to_date").datepicker();
               });
               $('#filter').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                if (from_date != '' && to_date != '') {
                    $.ajax({
                        url: "filter.php",
                        method: "POST",
                        data:{from_date:from_date, to_date:to_date},
                        success: function(data)
                        {
                            $('#print_area').html(data);
                        }
                    });
                }
                else{
                    alert("Please Select Date")
                }
               });
            });
        </script>
    </body>
</html>