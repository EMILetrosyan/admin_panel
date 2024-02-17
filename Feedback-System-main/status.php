<?php

/*
Feedback System 
Author : Devesh Kumar Singh
GitHub : https://github.com/devesh7272
			   https://github.com/drlabpro
*/
include 'dbconfig.php';
// no more edit from here 

$name= $_POST["name"];
$social = $_POST["social"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$msg = $_POST["msg"];
$time = date('h:i:s a') ;
$date = date('d-m-Y');
$ip = $_SERVER['REMOTE_ADDR'];
$user = $_SERVER['HTTP_USER_AGENT'];

$sql = "INSERT INTO feedback (name,  email, phone, msg, social, ip, user, date, time)
VALUES ('$name', '$email', '$phone','$msg','$social','$ip','$user','$date','$time')";
if (mysqli_query($conn, $sql)) {
    echo "<html>
	<head>
		<meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
		<title> Status : Successful</title>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
</head>
	<body>
		<center> <div class='well' style=' width:90%; margin-left: 2px;' > <h1>
		 Congratulations </h1>
		Dear <b> $name </b> <br> Your Form is successfully Submitted. <br><br> Have a nice Day </div><br> <br> <button type='button' class='btn btn-success btn-block' onclick= 'javascript: history.go(-1)' style=' width:50%;'> Go Back </button>  </center>
	</body>
	</html>";
} else {
    echo "<html>
	<head>
		<meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
		<title> Status : Failed </title>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
</head>
	<body>
		<center> <div class='well'style=' width:90%; margin-left: 2px;' > <h1>
		<img src='https://i.ibb.co/5j84HFg/1606379149238.png' alt='1606379149238' border='0' width='20%'> Error !! <img src='https://i.ibb.co/5j84HFg/1606379149238.png' alt='1606379149238' border='0' width='20%'> </h1>
		Dear <b> $name</b> <br> Your Form is not Submitted. <br> Please Go back and try again. <br> <br> Error</div> <br> <br> <button type='button' class='btn btn-danger' onclick= 'javascript: history.go(-1)' style=' width:50%;'> Go Back </button> </center>
	</body>
	</html>";
}

mysqli_close($conn);
?>