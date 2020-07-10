<?php
$con = mysqli_connect("localhost","root","","zabbnet");

if(isset($_POST['submit'])){
    
    
    $cname = $_REQUEST['companyname'];
    $email = $_REQUEST['Email'];
    $phno = $_REQUEST['PhoneNo'];
    $coun = $_REQUEST['country'];
    $state = $_REQUEST['state'];
    $city = $_REQUEST['city'];
    $pass = $_REQUEST['password'];
    $confpass=$_REQUEST['cpassword'];
// print_r($_FILES);
// die;


    $verify_mail=mysqli_query($con,"SELECT company_email from `registration` where `company_email`='$email'");
        $getmail=mysqli_fetch_array($verify_mail);
        

     if($getmail!=$email){ // check mail in db
    
        $sql = "INSERT INTO `registration` (`company_name`,`company_email`,`company_phno`,`country`,`state`,`city`,`password`) VALUES ('$cname','$email','$phno','$coun','$state','$city','$pass')";
        $result = mysqli_query($con,$sql);
        header("location:signin.php");
      }
      else{
            echo "<script>alert('Please check your mail, it already exists!');</script>";

          }
        }
?>

<html>
  <head>
  	<title>Registration</title>
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
                            Registration
					         </span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter companyname">
                      <input class="input100" type="text"  name="companyname" placeholder="Company Name">
                      <span class="focus-input100" data-placeholder="&#xf207;"></span>
                  </div>

                  <div class="wrap-input100 validate-input" data-validate = "Enter Email">
                      <input class="input100" type="email"  name="Email" placeholder="E-mail">
                      <span class="focus-input100" data-placeholder="&#64;"></span>
                  </div>

                  <div class="wrap-input100 validate-input" data-validate = "Enter phonenumber">
                      <input class="input100" type="text"  name="PhoneNo"  maxlength="18" placeholder="Mobile Number">
                      <span class="focus-input100" data-placeholder="&#9990;"></span>
                  </div>

                  <div class="wrap-input100 validate-input" data-validate = "Enter countryname">
                      <input class="input100" type="country"  name="country" placeholder="Country">
                      <span class="focus-input100" data-placeholder="&#128743;"></span>
                  </div>

                  <div class="wrap-input100 validate-input" data-validate = "Enter statename">
                      <input class="input100" type="state"  name="state" placeholder="State">
                      <span class="focus-input100" data-placeholder="&#128754;"></span>
                  </div>

                  <div class="wrap-input100 validate-input" data-validate = "Enter cityname">
                      <input class="input100" type="city"  name="city" placeholder="City">
                      <span class="focus-input100" data-placeholder="&#128753;"></span>
                  </div>


                  <div class="wrap-input100 validate-input" data-validate="Enter password">
                      <input class="input100" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="password" 
                      title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  placeholder="Password">
                      <span class="focus-input100" data-placeholder="&#xf191;"></span>
                  </div>

                  <div class="wrap-input100 validate-input" data-validate="Enter password">
                      <input class="input100" type="password" name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder=" Conform Password">
                      <span class="focus-input100" data-placeholder="&#xf191;"></span>
                  </div>

                  <div class="container-login100-form-btn">
                      <button class="login100-form-btn" name="submit" type="submit">
                          Sign Up
                      </button>
                  </div>

                  <div class="text-center p-t-90">
                      <a class="txt1" href="signin.php" >Already have an account ? Sign In!  </a>
                  </div>
              </form>
          </div>
      </div>
  </div>
  </body>
</html>