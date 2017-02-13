<?php

session_start();

$servername = "mysql.hostinger.co.uk";
$dbusername = "u495998595_admin";
$dbpassword = "dmftw38QkZNB";
$dbname = "u495998595_admin";

$LoginUsername = trim(strip_tags(addslashes($_GET['LoginUsername'])));
$LoginPassword = $_GET['LoginPassword'];

$con = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

$loginquery  = "SELECT * FROM User WHERE Username = '" . $LoginUsername . "';";

$result = mysqli_query($con, $loginquery);

if (mysqli_num_rows($result) > 0) {

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	$facultyquery  = "SELECT * FROM Faculty WHERE FacultyID = '" . $row['FacultyID'] . "';";
	$rolequery  = "SELECT * FROM Role WHERE RoleID = '" . $row['RoleID'] . "';";
	$result2 = mysqli_query($con, $facultyquery);
	$result3 = mysqli_query($con, $rolequery);
	$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
	$row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);

	//Logged In Variables
    $_SESSION["Username"] = $row['Username'];
    $_SESSION["Faculty"] = $row2['FacultyName'];;
    $_SESSION["Role"] = $row3['RoleName'];

    echo $_SESSION["Username"]. "<br>";
    echo $_SESSION["Faculty"]. "<br>";
    echo $_SESSION["Role"]. "<br>";


} else {

		//Error Variables

}

mysqli_close($con);

//header('Location: http://wwww.greenmag.co.uk');

?>