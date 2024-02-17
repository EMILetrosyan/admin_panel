<?php

//set your own time zone
date_default_timezone_set('Asia/Kolkata'); 

$servername = "localhost";  // your database host
$username = "username";  // your database user
$password = "";  // your database password
$db = "feedback";  // database name

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() "Check the dbconfig.php file " );
}
echo "Connected successfully";
?>