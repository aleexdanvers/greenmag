<?php

session_start();

$servername = "mysql.hostinger.co.uk";
$username = "u495998595_admin";
$password = "dmftw38QkZNB";
$dbname = "u495998595_admin";

$useremail = trim(strip_tags(addslashes($_POST['LoginUsername'])));
$userpassword = $_POST['LoginPassword'];

$dbConnection = mysqli_connect($servername, $username, $password, $dbname);

$query  = "SELECT * FROM `User` WHERE Password = '$userpassword'";
$result = mysqli_query($dbConnection, $query);

if (mysqli_num_rows($result) > 0) {

    echo "<ul>";

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

        echo "<li>{$row['Username']} {$row['Password']}</li>";

    }

    echo "</ul>";

} else {

    echo "Query didn't return any result";

}

?>