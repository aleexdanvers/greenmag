<?php
include 'includes/dbConnection.php';

$id =$_REQUEST['CloseDatesID'];


// sending query
mysqli_query($con, "DELETE FROM CloseDates WHERE CloseDatesID = '$id'");	
mysqli_close($con);
header("Location: admin.php");
?> 