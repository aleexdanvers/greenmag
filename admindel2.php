<?php
if (substr($_SERVER['HTTP_REFERER'], strrpos($_SERVER['HTTP_REFERER'], '/') + 1) != 'admin.php') {
	header('Location: admin.php');
	die();
}

include 'includes/dbConnection.php';

$id =$_REQUEST['CloseDatesID'];


// sending query
mysqli_query($con, "DELETE FROM CloseDates WHERE CloseDatesID = '$id'");	
mysqli_close($con);
header("Location: admin.php");
?> 