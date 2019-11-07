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
<!DOCTYPE html>
<html>
<head>
  <title>update owner profile</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <?php
    if (isset($_SESSION['type'])) {
       $utype = $_SESSION['type'];
       $selectusers = "SELECT * FROM employee WHERE  type ='$utype' ";

      $userquery = mysqli_query($con,$selectusers);
      while($row = mysqli_fetch_assoc($userquery)){
        echo "
         <div class=\"container\" style=\"margin-top: 100px;\">
                <form method=\"post\">
                    <div class=\"form-row\">
                        <div class=\"form-group col-md-4\">
                          <label>First Name</label>
                          <input type=\"text\" class=\"form-control\"  placeholder=\"First Name\" name=\"EditFName\"  value=\"{$row['f_name']}\">
                        </div>
                        <div class=\"form-group col-md-4\">
                          <label>Last Name</label>
                          <input type=\"text\" class=\"form-control\" placeholder=\"Last name\" name=\"EditLName\" value=\"{$row['l_name']}\">
                        </div>
                        <div class=\"form-group col-md-4\">
                          <label>User Name</label>
                          <input type=\"text\" class=\"form-control\" placeholder=\"User name\" name=\"EditUName\" value=\"{$row['u_name']}\">
                        </div>
                    </div>
                  <div class=\"form-group\">
                    <label>Email</label>
                    <input type=\"email\" class=\"form-control\" placeholder=\"abc@gmail.com\" name=\"EditEmail\" value=\"{$row['email']}\">
                  </div>
                  <div class=\"form-row\">
                    <div class=\"form-group col-md-6\">
                      <label>Telephone</label>
                      <input type=\"number\" placeholder=\"Telephone\" class=\"form-control\" name=\"EditTelephone\" value=\"{$row['telephone']}\">
                    </div>
                    <div class=\"form-group col-md-6\">
                      <label>Nic</label>
                      <input type=\"text\" placeholder=\"National identity card\" class=\"form-control\" name=\"EditNic\"  value=\"{$row['nic']}\">
                    </div>
                  </div>
                    <div class=\"form-row\">
                    <div class=\"form-group col-md-6\">
                      <label>Password</label>
                      <input type=\"password\" class=\"form-control\" name=\"EditPassword\" placeholder=\"Enter Password\" value=\"{$row['password']}\">
                    </div>
                  </div>
                  <input type=\"hidden\" value=" .$row['id']. " name=\"Edit\">
                  <input type=\"submit\" class=\"btn btn-primary btn-lg btn-block\" value=\"Update\" name=\"EditSubmit\">
                </form>
                </div>

                        ";
                    }
                    }

        if (isset($_POST['EditSubmit'])) {
        $uid = $_POST['Edit'];
        $newFname = $_POST['EditFName'];
        $newLname = $_POST['EditLName'];
        $newUname = $_POST['EditUName'];
        $newEmail = $_POST['EditEmail'];
        $newTelephone = $_POST['EditTelephone'];
        $newNic = $_POST['EditNic'];
        $newPassword = $_POST['EditPassword'];

        $EditQuery= "UPDATE employee SET f_name ='$newFname',l_name = '$newLname',u_name = '$newUname',email ='$newEmail',telephone ='$newTelephone',nic ='$newNic',password ='$newPassword' WHERE id = '$uid' ";
        $sqlQuery = mysqli_query($con,$EditQuery);
        if ($sqlQuery) {
            echo "<script>alert('Successfuly Upadated...')</script>";
            echo "<script>window.open('ownerDashBoard.php','_self')</script>";
        }
        else{
            echo "<script>alert('Unsuccessfuly Upadated...')</script>";
            echo "<script>window.open('editUser.php','_self')</script>";
        }
        }
        


  ?>
</body>
</html>