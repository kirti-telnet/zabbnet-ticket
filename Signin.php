<?php

$con = mysqli_connect("localhost", "root", "", "zabbnet");

if(isset($_COOKIE["type"]))
{
 header("location:dashboard");
}

$message = '';

if(isset($_POST["login"]))
{
 if(empty($_POST["email"]) || empty($_POST["password"]))
 {
  $message = "<div class='alert alert-danger'>Both Fields are required</div>";
 }
 else
 {
  $query = "SELECT * FROM registration WHERE company_email='".$_POST['email']."' and password='".$_POST['password']."'";

    $result = $con->query($query);
  if($result->num_rows > 0)
  {
      while ($row = $result->fetch_assoc())
        {
        echo "SUCCESS LOGIN";
        setcookie("type", $row["company_email"], time() + 3600);
        $_COOKIE['type'] = $row['company_email'];
        header("location:dashboard");
        }
  }
    else
    {
     $message = '<div class="alert alert-danger">Wrong Password or email address</div>';
    }
  }
 }
?>
<html>
  <head>
  	<title>Sign in</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--===============================================================================================-->
      <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
      <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="css/util.css">
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <!--===============================================================================================-->
  </head>
  <body>


  <?php
    if(isset($ERROR))
    {
        echo "<h3>".$ERROR."<h3>";
    }
  ?>

  <div class="limiter">
      <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
          <div class="wrap-login100">
              <form method="post" class="signin-form">
                      <center>
                             <img src="images/WhiteLogo.png" width="120" height="120"/>
					  </center>

                  <span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
                    <span><?php echo $message; ?></span>
                  <div class="wrap-input100 validate-input" data-validate = "Enter email">
                      <input class="input100" type="email"  name="email" placeholder="E-mail">
                      <span class="focus-input100" data-placeholder="&#xf207;"></span>
                  </div>

                  <div class="wrap-input100 validate-input" data-validate="Enter password">
                      <input class="input100" type="password" name="password" placeholder="Password">
                      <span class="focus-input100" data-placeholder="&#xf191;"></span>
                  </div>

                  <div class="contact100-form-checkbox">
                      <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                      <label class="label-checkbox100" for="ckb1">
                          Remember me
                      </label>
                  </div>

                  <div class="container-login100-form-btn">
                      <button class="login100-form-btn" name="login" value="login">
                          Login
                      </button>
                  </div>

                  <div class="text-center p-t-90">
                      <a class="txt1" href="forgot">Forgot Password?</a>
                      <br><a class="txt1" href="signup" >Don't have an account ? Sign Up ! </a></br>
                  
              </form>
          </div>
      </div>
  </div>
  <div id="dropDownSelect1"></div>

<!--===============================================================================================--> 
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

 
<!-- <?php
   include('includes/cfooter.php');
?> -->
  </body>
</html>
