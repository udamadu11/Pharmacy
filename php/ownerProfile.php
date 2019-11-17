
<?php include('include/connection.php') ?><!-- include database connection -->
<!DOCTYPE html>
<html>
<head>
  <title>update owner profile</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
</head>
<body>
    <?php 
    //Get login user data
      if (isset($_SESSION['type'])) {
           $utype = $_SESSION['type'];
           //select employee data by type
           $selectusers = "SELECT * FROM employee WHERE  type ='$utype' ";

          $userquery = mysqli_query($con,$selectusers);
          while($row = mysqli_fetch_assoc($userquery)){
            //Form of Owner data
            echo "

              <div class=\"modal fade\" id=\"form_profile\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
                <div class=\"modal-dialog\" role=\"document\">
                  <div class=\"modal-content\">
                    <div class=\"modal-header\">
                      <h5 class=\"modal-title\" id=\"exampleModalLabel\">Edit Profile</h5>
                      <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                      </button>
                    </div>

                  <div class=\"modal-body\">
        <form  method=\"post\">

        <div class=\"form-row\">
            <div class=\"form-group col-md-4\">
            <label>First Name</label>
            <input type=\"text\" class=\"form-control\" name=\"EditFName\" value=\"{$row['f_name']}\">
          </div>

          <div class=\"form-group col-md-4\">
            <label>Last Name</label>
            <input type=\"text\" class=\"form-control\" name=\"EditLName\" value=\"{$row['l_name']}\">
          </div>

          <div class=\"form-group col-md-4\">
            <label>User Name</label>
            <input type=\"text\" class=\"form-control\" name=\"EditUName\" value=\"{$row['u_name']}\">
          </div>
        </div>

          <div class=\"form-group\">
            <label>Email</label>
            <input type=\"text\" class=\"form-control\" name=\"EditEmail\" value=\"{$row['email']}\">
          </div>

          <div class=\"form-row\">

             <div class=\"form-group col-md-6\">
                <label>Telephone</label>
                <input type=\"text\" class=\"form-control\" name=\"EditTelephone\" value=\"{$row['telephone']}\">
            </div>

            <div class=\"form-group col-md-6\">
              <label>Nic</label>
              <input type=\"text\" class=\"form-control\" name=\"EditNic\" value=\"{$row['nic']}\">
            </div>

          </div>

         

          <div class=\"form-group\">
            <label>Password</label>
            <input type=\"text\" class=\"form-control\" name=\"EditPassword\" value=\"{$row['password']}\">
          </div>

          

          <input type=\"hidden\" value=" .$row['id']. " name=\"Edit\">
          <input type=\"submit\" class=\"btn btn-primary btn-lg btn-block\" value=\"Update\" name=\"EditSubmit\">
        </form>
      </div>

      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
      </div>
    </div>
  </div>
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
        //Upadate Owner data by id
        $EditQuery= "UPDATE employee SET f_name ='$newFname',l_name = '$newLname',u_name = '$newUname',email ='$newEmail',telephone ='$newTelephone',nic ='$newNic',password ='$newPassword' WHERE id = '$uid' ";
        //Performs a query on databse
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