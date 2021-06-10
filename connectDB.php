<?php
   $dbservername = "localhost";
   $dbusername = "root";
   $dbpassword ="";
   $dbName = "userinfo";

   $conn = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbName);

   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
         

?>
