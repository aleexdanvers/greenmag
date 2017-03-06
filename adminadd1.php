<?php
include 'includes/dbConnection.php';

$title=$_POST['AcademicYearID'] ;
$author= $_POST['AcademicYear'] ;

mysqli_query($con, "INSERT INTO `AcademicYear`(AcademicYearID,AcademicYear) VALUES ('" . $title . "','" . $author . "')");
mysqli_close($con);
header("Location: admin.php");
?>