<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<?php
    
        if(isset($_POST['editDrug'])){

            $sid = $_POST['edit'];
            //Retrive data from supplier table
            $selectDrug = "SELECT * FROM drug WHERE  drug_id ='$sid' ";
            //Performs query on databse
            $DrugQuery = mysqli_query($con,$selectDrug);
            //Fetch result row as associative array
                while($row = mysqli_fetch_assoc($DrugQuery)){
                    //Display supplier table data with edit buutton
                    echo "
                            <form method=\"post\" class=\"form-1\" style=\"margin-top:100px;\">
                                <h3 style=\"text-align:center;\">Edit Supplier</h3>
                                <p>Drug Name</p>
                                <input type=\"text\" class=\"input\" name=\"drug_name\" id=\"drug_name\" placeholder=\"Edit Drug Name\" value=\"{$row['drug_name']}\">

                                <p>Brand</p>
                                <input type=\"text\" class=\"input\" name=\"brand\" id=\"brand\" placeholder=\"Edit  brand\" value=\"{$row['brand']}\">

                                <p>Category</p>
                                <input type=\"text\" class=\"input\" name=\"category\" id=\"category\" placeholder=\"Edit the category\" value=\"{$row['category']}\">

                                <p>Supplier Id</p>
                                <input type=\"number\" class=\"input\" name=\"supplier_id\" id=\"supplier_id\" placeholder=\"Edit supplier Id\" value=\"{$row['supplier_id']}\">

                                <p>Reorder Level</p>
                                <input type=\"number\"  class=\"input\" name=\"reorder_level\" id=\"reorder_level\" placeholder=\"Edit reorder level\" value=\"{$row['reorder_level']}\">

                                 <p>Price</p>
                                <input type=\"number\"  class=\"input\" name=\"price\" id=\"price\" placeholder=\"Edit price\" value=\"{$row['price']}\">


                                <p></p>
                                <input type=\"hidden\" value=" .$row['drug_id']. " name=\"EditID\">
                                <input type=\"submit\" name=\"EditSubmit\" value=\"EDIT\" class=\"btn-5\">

                            </form>";


            }       
             
        }

    ?>
    <?php 
        if (isset($_POST['EditSubmit'])) {
        $uid = $_POST['EditID'];
        $newDrugName = $_POST['drug_name'];
        $newBrand = $_POST['brand'];
        $newCategory = $_POST['category'];
        $newSupplierId = $_POST['supplier_id'];
        $newReorderLevel = $_POST['reorder_level'];
        $newPrice = $_POST['price'];
        
        //Edit supplier table data by supplier id
        $EditQuery= "UPDATE drug SET drug_name ='$newDrugName', brand = '$newBrand', category = '$newCategory', supplier_id ='$newSupplierId', reorder_level ='$newReorderLevel', price = '$newPrice' WHERE drug_id = '$uid' ";
        $sqlQuery = mysqli_query($con,$EditQuery);
        if ($sqlQuery) {
            echo "<script>alert('Successfuly Upadated...')</script>";
            echo "<script>window.open('updateDrug.php','_self')</script>";
        }
        else{
            echo "<script>alert('Unsuccessfuly Upadated...')</script>";
            echo "<script>window.open('updateDrug.php','_self')</script>";
        }
        }
        


    ?>
</body>
</html>
