<?php 
session_start();

include 'includes/dbConnection.php';

$currentAcademicYearID = $_REQUEST['currentYear'];

$previousYear = "UPDATE AcademicYear SET CurrentYear=0 WHERE CurrentYear=1"; 
mysqli_query($con,$previousYear);

$newCurrentYear = "UPDATE AcademicYear SET CurrentYear=1 WHERE AcademicYearID=" . $currentAcademicYearID . ";";
mysqli_query($con,$newCurrentYear);
mysqli_close($con);
header('Location:admin.php');
?>