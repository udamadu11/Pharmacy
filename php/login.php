<?php include('include/connection.php') ?>
<?php include('include/session.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Pharma-pro Login</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body class="login-main">
  <div id="logo"> 
    <h1><i>Pharma -pro</i></h1>
  </div> 
  <section class="login">
<h4 class="error-msg"><?php include('include/message.php'); ?></h4>
    <form action="loginform.php" method="post">  
      <div id="fade-box">
        <input type="text" name="name" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <input type="submit" name="submit" value="Login"> 
      </div>
    </form>
    <div class="hexagons">
      
    </div>      
  </section> 

    <div id="circle1">
      <div id="inner-cirlce1">
          <h2> </h2>
            </div>
    </div>
</body>
</html>