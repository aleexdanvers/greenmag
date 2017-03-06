<?php
include 'includes/dbConnection.php';

$id =$_REQUEST['AcademicYearID'];


// sending query
mysqli_query($con, "DELETE FROM AcademicYear WHERE AcademicYearID = '$id'");	
mysqli_close($con);
header("Location: admin.php");
?> 