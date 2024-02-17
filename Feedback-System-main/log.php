<!--
Feedback System 
Author : Devesh Kumar Singh
GitHub : https://github.com/devesh7272
			   https://github.com/drlabpro
-->

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
	function at() {
		alert(" Are you really sure to do : ")
		}
</script>
	
<?php
include 'dbconfig.php';
$sql = "SELECT * FROM feedback";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$collapse1 = md5($row['id']);
		$collapse2 = md5($collapse1);
		$collapse3 = md5($collapse2);
		$collapse4 = md5($collapse3);
		$collapse5 = md5($collapse4);
        echo" <div class='panel panel-info' style=' width:95%; margin-left: 10px;'>

  <div class='panel-heading'>
  	From : <a href=".$row['social'].">" .$row['name']."</a> &nbsp &nbsp &nbsp <a data-toggle='collapse' href='#$collapse1' >Details</a> <span style='float:right'> ".$row['date']." </span> 

	<div id='$collapse1' class='panel-collapse collapse'>Email : <a href=mailto:".$row['email'].">".$row['email']."</a> <span style='float:right'> ".$row['time']."</span> <br>
	Phone : <a data-toggle='collapse' href='#$collapse2'>".$row['phone']."</a>
	<div class='well well-sm'>  Phone Details
	 <div id='$collapse2' class ='panel-collapse collapse'>WhatsApp : <a href =https://api.whatsapp.com/send?phone=".$row['phone']."&text=Hello%20From%20Devesh%20Singh> Send Message</a> <br> Call : <a href=tel:".$row['phone']."> ".$row['phone'] ."</a> <br> SMS : <a href=sms:".$row['phone']."?body=Hello%20From%20Devesh%20Singh>Send SMS</a>
	</div> </div></div></div>

  <div class='panel-body'> ".$row['msg']." </div>
  
  <div class='panel-footer'>
 <a data-toggle='collapse' href='#$collapse3'> IP : ".$row['ip']." <br></a>
 <div id = '$collapse3' class ='panel-collapse collapse'> <a href=https://whatismyipaddress.com/ip/".$row['ip'].">https://whatismyipaddress.com/ip/".$row['ip']."</a> <br>
 <a href=https://www.melissa.com/v2/lookups/iplocation/ip/".$row['ip'].">https://www.melissa.com/v2/lookups/iplocation/ip/".$row['ip']."</a> </div> 
 
 <a data-toggle='collapse' href='#$collapse5' style='float:right;' onclick='at()' > Delete This <br></a>
 <div id='$collapse5' class='panel-collaps3 collapse' style='float:right'> <a href=delete.php?id=".$row['id']." ><button type='button' class='btn btn-danger' > Delete This </button> </a>  </div> 
 
	<a data-toggle='collapse' href='#$collapse4'> See User Agent <br></a>
<div id = '$collapse4' class ='panel-collapse collapse'> ".$row['user']."<br> <br> </div> 

 </div> 
 	</div>";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>