<!--
Feedback System 
Author : Devesh Kumar Singh
GitHub : https://github.com/devesh7272
			   https://github.com/drlabpro
-->

<meta http-equiv="refresh"
   content="1; url=log.php">
 <meta name="viewport" content="width=device-width">

<?php

$id=$_GET['id'];
include 'dbconfig.php';

// sql to delete a record
$sql = "DELETE FROM feedback WHERE id=".$id;

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>