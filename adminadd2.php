<?php
if (substr($_SERVER['HTTP_REFERER'], strrpos($_SERVER['HTTP_REFERER'], '/') + 1) != 'admin.php') {
	header('Location: admin.php');
	die();
}

include 'includes/dbConnection.php';

$title=$_POST['FacultyID'] ;
$author= $_POST['SubmissionDate'] ;
$title2=$_POST['FinalSubmissionDate'] ;
$author2= $_POST['AcademicYearID'] ;

mysqli_query($con, "INSERT INTO `CloseDates`(FacultyID,SubmissionDate,FinalSubmissionDate,AcademicYearID) VALUES ('" . $title . "','" . $author . "','" . $title2 . "','" . $author2 . "')");
mysqli_close($con);
header("Location: admin.php");
?>