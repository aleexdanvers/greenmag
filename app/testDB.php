<?php
    $servername = "localhost";
    $dbusername = "widget_cms";
    $dbpassword = "secretpassword";
    $dbname = "widget_crop";
	$connection = mysqli_connect ("localhost", "u495998595_admin", "dmftw38QkZNB", "u495998595_admin");
    
	// testing connection
	if (mysqli_connect_error()) {
		die("Datebase connecttion failed:" .
		mysqli_connect_error() .
		" ( ". mysqli_connect_errno() .")"
	);
	}		
		
?>

<?php

    $query = "SELECT * FROM User WHERE UserID=10";
	$result = mysqli_query($connection, $query);
	//Testing query
	if (!$result) {
		die("database query failed.");
	}
	
?>


<!DOCTYPE html>

<html lang="en">
    <head>
	    <title>testDB</title>
	</head>

<body>

    <?php
        //return data
	    while($row = mysqli_fetch_row($result)) {
		//output data from each row
		var_dump($row);
		echo "<hr />";
	    }
    ?>



</body>

</html>

<?php
    mysqli_close($connection);
?>