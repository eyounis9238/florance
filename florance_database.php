<?php
    $servername = "db4free.net:3306/florance";
    $username = "florance";
    $password = "Portal@123";
    $dbname = "florance";

    // Create a new database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>
