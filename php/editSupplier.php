<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/editUserNew.css">
</head>
<body>
<?php
    
        if(isset($_POST['submit1'])){

            $sid = $_POST['edit'];
            $selectSupplier = "SELECT * FROM supplier WHERE  supplier_id ='$sid' ";

            $supplierquery = mysqli_query($con,$selectSupplier);
                while($row = mysqli_fetch_assoc($supplierquery)){
                    
                    echo "
                            <form method=\"post\">
                                <p>Supplier Name</p>
                                <input type=\"text\" class=\"input\" name=\"supplier_name\" id=\"supplier_name\" placeholder=\"Edit Supplier Name\" value=\"{$row['supplier_name']}\">
                                <p>Location</p>
                                <input type=\"text\" class=\"input\" name=\"location\" id=\"location\" placeholder=\"Edit  Location\" value=\"{$row['location']}\">
                                <p>Email</p>
                                <input type=\"email\" class=\"input\" name=\"email\" id=\"email\" placeholder=\"Edit the Email\" value=\"{$row['email']}\">
                                <p>Contact No :</p>
                                <input type=\"number\" class=\"input\" name=\"contact_no\" id=\"contact_no\" placeholder=\"Edit the Contact\" value=\"{$row['contact_no']}\">
                                <p>Credit Period</p>
                                <input type=\"number\"  class=\"input\" name=\"credit_period_allowed\" id=\"credit_period_allowed\" placeholder=\"Edit the credit Period\" value=\"{$row['credit_period_allowed']}\">
                                <p></p>
                                <input type=\"hidden\" value=" .$row['supplier_id']. " name=\"EditID\">
                                <input type=\"submit\" name=\"EditSubmit\" value=\"EDIT\">

                            </form>";


            }       
             
        }

    ?>
    <?php 
        if (isset($_POST['EditSubmit'])) {
        $uid = $_POST['EditID'];
        $newSupplierName = $_POST['supplier_name'];
        $newLocation = $_POST['location'];
        $newEmail = $_POST['email'];
        $newContact = $_POST['contact_no'];
        $newCreditPeriod = $_POST['credit_period_allowed'];
        
        $EditQuery= "UPDATE supplier SET supplier_name ='$newSupplierName',location = '$newLocation',email = '$newEmail',contact_no ='$newContact',credit_period_allowed ='$newCreditPeriod' WHERE supplier_id = '$uid' ";
        $sqlQuery = mysqli_query($con,$EditQuery);
        if ($sqlQuery) {
            echo "<script>alert('Successfuly Upadated...')</script>";
            echo "<script>window.open('removeSupplier.php','_self')</script>";
        }
        else{
            echo "<script>alert('Unsuccessfuly Upadated...')</script>";
            echo "<script>window.open('removeSupplier.php','_self')</script>";
        }
        }
        


    ?>
</body>
</html>
