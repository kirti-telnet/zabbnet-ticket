<?php
  $con = mysqli_connect("localhost", "root", "", "zabbnet");

   if(!isset($_COOKIE["type"]))
   {
    header("location:signin.php");
   }
  
   ?>