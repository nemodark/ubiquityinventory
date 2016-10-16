<?php
require_once '../connection/connection.php';

if($user->is_loggedin()!="")
{
 $user->redirect('home.php');
}

if(isset($_POST['submit']))
{
 $uname = $_POST['username'];
 $upass = $_POST['password'];
  
 if($user->login($uname,$upass))
 {
  $user->redirect('home.php');
 }
 else
 {
  $error = "Invalid Username or Password.";
 } 
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/soloubiq.ico" />
    <title>UGS Inventory </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
  </head>

  <body style="background:#F7F7F7;">
    <div class="">
      <a class="hiddenanchor" id="toregister"></a>
      <a class="hiddenanchor" id="tologin"></a>

      <div id="wrapper">
        <div id="login" class=" form">
          <section class="login_content">
          <?php 
          if(isset($error))
            {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                  </div>
                  <?php
            }
            ?>
            <form action="" method="post">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div>
                <button type="submit" name="submit" class="btn btn-default submit pull-right" href="index.html">Log in</a>
              </div>
              <div class="clearfix"></div>
              <div class="separator">
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1 style="margin-left:-18px;"><img src="images/soloubiq.png" WIDTH="40" HEIGHT="40"> Ubiquity Global Services</h1>

                  <p>©2016 All Rights Reserved. Ubiquity Global Services. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        </div>
    </div>
  </body>
</html>