<?php
// connecting to the database.
   $mysqli = new mysqli('localhost', 'mysql-username', 'mysql-password', 'database-name');
   if($mysqli->connect_errno != 0){
      echo $mysqli->connect_error;
      exit();
   }else{
      $mysqli->set_charset("utf8mb4");	
   }