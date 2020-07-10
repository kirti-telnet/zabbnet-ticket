<?php
session_start();
error_reporting(0);

if(isset($_REQUEST['login'])) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email1 = $_POST['email'];
        $pass = $_POST['password'];

        $conn = new mysqli("localhost", "root", "", "zabbnet");

        $result_query1 = $conn->query("SELECT * FROM registration WHERE company_email='" . $email1 . "' and password='" . $pass . "'");
        if ($result_query1->num_rows > 0)
        {
            while($row_query1 = $result_query1->fetch_assoc())
            {
                $register_id = $row_query1['register_id'];
                $email = $row_query1['company_email'];
                echo $email;
                if (isset($_COOKIE['email'])) {
                    $_COOKIE['email'] = "";
                    $_SESSION['email'] = $email;
                    setcookie('email', $email, time() + (86400), "/");
//                    $_COOKIE['email'] = $email;
                    header("location: dashboard.php");
                } else {
//          set value for cookie expiry as (86400 * (n)) where n is number of days
                    $_COOKIE['email'] = "";
                    setcookie('email', $email, time() + (86400), "/");
                    $_COOKIE['email'] = $email;
                    $_SESSION['email'] = $_COOKIE['email'];
                    header("location: dashboard.php");

                }

            }
        }
        else{
            // $ERROR = "Invalid Credentials";
            echo "<script>alert('Email or password is incorrect!')</script>";
            exit();
            header("location: signin.php");
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
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

                  <span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

                  <div class="wrap-input100 validate-input" data-validate = "Enter username">
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
                      <button class="login100-form-btn" name="login">
                          Login
                      </button>
                  </div>

                  <div class="text-center p-t-90">
                      <a class="txt1" href="forgot.php">Forgot Password?</a>
                      <br><a class="txt1" href="signup.php" >Don't have an account ? Sign Up ! </a></br>
                  
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
