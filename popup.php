<?php
$con = mysqli_connect("localhost","root","","zabbnet");

if(isset($_POST['submit'])){
    
   
    $eid = $_REQUEST['eid'];
    $designation = $_REQUEST['designation'];
    $ename = $_REQUEST['ename'];
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
    $confpass=$_REQUEST['cpassword'];

    $verify_mail=mysqli_query($con,"SELECT user_email from `user_master` where `user_email`='$email'");
        $getmail=mysqli_fetch_array($verify_mail);
        

     if($getmail!=$email){ // check mail in db
    
        $sql = "INSERT INTO `user_master` (`employee_id`,`role_id`,`user_name`,`user_email`,`password`) 
        VALUES ('$eid','$designation','$ename','$email','$pass')";
         
       header("location:team");
      }
      else{
            echo "<script>alert('Please check your mail, it already exists!');</script>";

          }
        }
?>


 <!-- popup for employee signup  -->
        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
          <div class="modal-content">
          <div class="modal-header">
          <form  method="post" name="reg_form" enctype="multipart/form-data" class="form ">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="modal-title" align="center">Registration Employee</h3>
            </div>
          
            <div class="modal-body">
            <form  method="post" name="reg_form" enctype="multipart/form-data" class="form " action="#">
              <div class="form-group has-feedback">
                <input type="text" class="form-control" name="eid" placeholder="Employee Id" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
              </div>

            <div class="form-group has-feedback">
                <select  name="designation" class="form-control" onChange="getState(this.value)" id="role_id"  required>
                            <option value=""> Select User Designation</option>
                            <?php
                            $query1 = "SELECT * FROM role";
                            $result1 = mysqli_query($con,$query1);
                            while($row1 = mysqli_fetch_array($result1)){
                                ?>
                                <option value=<?php echo $row1['role_id']; ?>> <?php echo $row1['role_name']; ?>																	   							</option>
                            <?php }?>
                </select>
            </div>
            <div class="form-group has-feedback">
              <input type="text" class="form-control" name="ename" placeholder="Full name" required>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="email" class="form-control" name="email" placeholder="Email" required>
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name="password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name="cpassword" placeholder="Retype password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
              <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>

         
        
                </div>
                <div class="modal-footer">
                  <button href="#" type="submit" name="submit" class="btn btn-default" data-dismiss="modal">Add</button>
                </div>
             
              </div>
   </form>
            </div>
          </div>  
