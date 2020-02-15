<?php include('include/connection.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<?php
    
        if(isset($_POST['submit'])){

            $uid = $_POST['edit'];
            //Retrive emplyee table data from id
            $selectusers = "SELECT * FROM employee WHERE  id ='$uid' ";
            //Performs query on database
            $userquery = mysqli_query($con,$selectusers);
            //Fetch result row as an Associative array
                while($row = mysqli_fetch_assoc($userquery)){
                    //Display employee data by id
                    echo "
                            <form method=\"post\" class=\"form-1\">
                                <h2>Edit User</h2>                   
                                <p>First Name</p>
                                <input type=\"text\" name=\"EditFName\" placeholder=\"Edit name\" value=\"{$row['f_name']}\">

                                <p>Last Name</p>
                                <input type=\"text\" name=\"EditLName\" placeholder=\"Edit name\" value=\"{$row['l_name']}\">

                                <p>User Name</p>
                                <input type=\"text\" name=\"EditUName\" placeholder=\"Edit name\" value=\"{$row['u_name']}\">    

                                <p>Email</p>
                                <input type=\"email\" name=\"EditEmail\" placeholder=\"email\" value=\"{$row['email']}\">

                                <p>Telephone</p>
                                <input type=\"number\" name=\"EditTelephone\" placeholder=\"telephone\" value=\"{$row['telephone']}\">

                                <p>Nic</p>
                                <input type=\"text\" name=\"EditNic\" placeholder=\"Edit Nic\" value=\"{$row['nic']}\">

                                <p>Password</p>
                                <input type=\"text\" name=\"EditPassword\" placeholder=\"Enter Password\" value=\"{$row['password']}\">

                                <p>Type</p>
                                <input type=\"number\" name=\"EditType\" placeholder=\"Type\" value=\"{$row['type']}\">

                                <p></p>
                                <input type=\"hidden\" value=" .$row['id']. " name=\"EditID\">
                                <input type=\"submit\" name=\"EditSubmit\" value=\"EDIT\" class=\"btn-5\">
                            </form>";


            }       
             
        }

    ?>
    <?php 
        if (isset($_POST['EditSubmit'])) {
        $uid = $_POST['EditID'];
        $newFname = $_POST['EditFName'];
        $newLname = $_POST['EditLName'];
        $newUname = $_POST['EditUName'];
        $newEmail = $_POST['EditEmail'];
        $newTelephone = $_POST['EditTelephone'];
        $newNic = $_POST['EditNic'];
        $newPassword = $_POST['EditPassword'];
        $newType = $_POST['EditType'];

        //Edit employee data by employee id
        $EditQuery= "UPDATE employee SET f_name ='$newFname',l_name = '$newLname',u_name = '$newUname',email ='$newEmail',telephone ='$newTelephone',nic ='$newNic',password ='$newPassword',type ='$newType' WHERE id = '$uid' ";
        $sqlQuery = mysqli_query($con,$EditQuery);
        if ($sqlQuery) {
            echo "<script>alert('Successfuly Upadated...')</script>";
            echo "<script>window.open('viewEmployee.php','_self')</script>";
        }
        else{
            echo "<script>alert('Unsuccessfuly Upadated...')</script>";
            echo "<script>window.open('viewEmployee.php','_self')</script>";
        }
        }
        


    ?>
</body>
</html>
