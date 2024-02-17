<!DOCTYPE html>

<!--
Feedback System 
Author : Devesh Kumar Singh
GitHub : https://github.com/devesh7272
			   https://github.com/drlabpro
-->
	
<html lang="en">
<head>
  <title> Feedback System </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h1>Send Feedback  for YOUR NAME </h1>
  <p> We value your precious feedback for improving us <code> Yourname </code> </p>
</div>
<div class="panel panel-info">
  <div class="panel-heading">Feedback Form </div>
  <div class="panel-body">
<form method="post" action="status.php" >
	<div class="form-group">
    <label for="name">Full Name: <font color="red">*</font></label>
    <input type="name" class="form-control" id="name" name="name" required>
  </div>
  <div class="form-group">
    <label for="social">Social Touch : <font color="red">*</font></label>
    <input type="url" class="form-control" id="social" name="social" value="http://" required>
    <span class="help-block">Instagram , Facebook , Twitter, LinkedIn, GitHub ,etc ,other 
  </div>
  <div class="form-group">
    <label for="email">Email address :</label><span class="help-block">must provide your email for reply...</span>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="form-group">
    <label for="phone" >Phone Number (optional) :</label>
    <input type="tel" class="form-control" name="phone" id="phone" value="+91"required>
    	 </div>
  <div class="form-group">
  <label for="msg">Message : <font color="red">*</font></label>
  <textarea class="form-control" rows="5" id="msg" name="msg" required></textarea>
</div>
 <center> <button type="reset" class="btn btn-default">Reset</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-default">Submit</button> </center>
</form>
</div>
</div>
</body>
</html>