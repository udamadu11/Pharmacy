<?php include('include/connection.php') ?>
<?php
    
        if(isset($_POST['submit'])){

            $uid = $_POST['edit'];


            $selectusers = "SELECT * FROM employee WHERE  id ='$uid' ";

            $userquery = mysqli_query($con,$selectusers);

            echo "<div class=\"row-100\">";

                while($row = mysqli_fetch_assoc($userquery)){
                    
                    echo "
                    <div class=\"row-100\">
                        <div class=\"login-box\">
                            <form action=\"editUserNew.php\" method=\"post\">                   
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
                                <input type=\"password\" name=\"EditPassword\" placeholder=\"Enter Password\" value=\"{$row['password']}\">

                                <p>Type</p>
                                <input type=\"number\" name=\"EditType\" placeholder=\"Type\" value=\"{$row['type']}\">

                                <p></p>
                                <input type=\"hidden\" value=" .$row['id']. " name=\"EditID\">
                                <input type=\"submit\" name=\"EditSubmit\" value=\"EDIT\">
                            </form>
                        </div>
                    </div>"

                        ;


            }       
             
        }

$id= $_POST['EditID'];
$newFName = $_POST['EditFName'];
$newLName = $_POST['EditLName'];
$newUName = $_POST['EditUName'];
$newEmail = $_POST['EditEmail'];
$newTelephone = $_POST['EditTelephone'];
$newNic = $_POST['EditNic'];
$newPassword = $_POST['EditPassword'];
$newType = $_POST['EditType'];

        $EditQuery= "UPDATE users SET f_name = '$newFName', l_name ='$newLName', u_name = '$newUName', email = '$newEmail' , telephone = '$newTelephone',nic='$newNic',password='$newPassword',type='$newType' WHERE id = '$id' ";

    ?>