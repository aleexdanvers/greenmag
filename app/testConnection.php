<?php

   $link = mysqli_connect("localhost", "u495998595_admin", "dmftw38QkZNB", "u495998595_admin");

   

    if (mysqli_connect_error()) {
        
        echo "There was an error connecting to the database";
        
    } else {
        
        echo "Database connection successful!";
        
    }


?>

    
