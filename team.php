<?php
$con = mysqli_connect("localhost","root","","zabbnet");

if(isset($_POST['submit'])){
    print_r($_POST);
   
    $eid = $_REQUEST['eid'];
    $designation = $_REQUEST['designation'];
    $ename = $_REQUEST['ename'];
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
    $confpass=$_REQUEST['cpassword'];
    
    $verify_mail=mysqli_query($con,"SELECT user_email from `user_master` where `user_email`='$email'");
        $getmail=mysqli_fetch_array($verify_mail);
         

     if($getmail!=$email){ // check mail in db
        $cemail = $_COOKIE['type'];
        $sql = "INSERT INTO `user_master` (`company_email`,`employee_id`,`role_id`,`user_name`,`user_email`,`user_password`) 
          VALUES ('$cemail','$eid','$designation','$ename','$email','$pass')";
          
          if(!mysqli_query($con,$sql))
          {
             die('ERROR:'.mysqli_error($con));
          }
          else {
            header("location:team");
          }
          echo $sql;
        }
        else{
            echo "<script>alert('Please check your mail, it already exists!');</script>";
        }
      }
?>
<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/AdminLTE/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Jun 2020 09:56:16 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Team</title>
  <link rel="shortcut icon" href="images/WhiteLogo.png" type="image/x-icon">
  <link rel="icon" href="images/WhiteLogo.png" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">  
  <link rel="stylesheet" href="style.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- Popup box css and js  -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
          .box
          {
            overflow-x: auto;
            overflow-y: auto;
          }
        </style>
  </head>
  
    <?php
      include('support/header.php');
    ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <?php
    include('support/menu.php');
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
      <!-- data-toggle="modal" data-target="#myModal -->
      <!-- popup for employee signup  -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <form  method="post" name="reg_form" enctype="multipart/form-data" class="form" action="team">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3 class="modal-title" align="center">Registration Employee</h3>
          </div>
          <div class="modal-body">
            <!-- <form  method="get" name="reg_form" enctype="multipart/form-data" class="form"> -->
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
            <!-- </form> -->
          </div>
          <div class="modal-footer">
            <input type="submit" name="submit" value="Add"></input>
          </div>
            </form>
          </div>
        </div>
        </div>  
      <li><i><a href="#" class="fa fa-plus"x  data-toggle="modal" data-target="#myModal">Add Employee</a></i></li>
      <li><a href="dashboard"><i class="fa fa-dashboard"></i> Zabbnet</a></li>
      <li class="active">Team</li>
      </ol>
      
      <br><br>
      <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>0</h3>

              <p>Total Team</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>0<sup style="font-size: 20px"></sup></h3>

              <p>Active Employee</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>0</h3>

              <p>Online Employee</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>0</h3>

              <p>Archive Employee</p>
            </div>
            <div class="icon">
              <i class="ion ion-trash-b"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      </br>
              <!-- right col -->
      
      <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
          <!-- /.box -->

          
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Employee ID</th>
                  <th>Designation</th>
                  <th>Employee Name</th>
                  <th>Email-Id</th>
                  <th>Password</th>
                </tr>
                </thead>
                <tbody>             
                <?php
                    $select = mysqli_query($con, "select * from user_master where role_id");
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($select)) {
                        ?>
                  <tr>       
                  <td><?php echo $row["employee_id"]; ?></td>
                  <td><?php echo $row["role_id"]; ?></td>
                  <td><?php echo $row["user_name"];?></td>
                  <td><?php echo $row["user_email"];?></td>
                  <td><?php echo $row["user_password"];?></td>
                  </tr>
                  <?php
                   $i++;
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Employee ID</th>
                  <th>Designation</th>
                  <th>Employee Name</th>
                  <th>Email-Id</th>
                  <th>Password</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
      <!-- /.row (main row) -->
       <!-- /.content-wrapper -->
       

    </section>
    <!-- /.content -->
  </div>
  <footer class="main-footer">
        <?php
          include('support/footer.php');
        ?>
      </footer>
  

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<!-- <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script> 
        function createPopupWin(pageURL, pageTitle, 
                    popupWinWidth, popupWinHeight) { 
            var left = (screen.width ) ; 
            var top = (screen.height ) ; 
            var myWindow = window.open(pageURL, pageTitle,  
                    'resizable=yes, width=' + popupWinWidth 
                    + ', height=' + popupWinHeight + ', top=' 
                    + top + ', left=' + left); 
        } 
    </script> 
</body>

<!-- Mirrored from adminlte.io/themes/AdminLTE/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Jun 2020 09:56:23 GMT -->
</html>
