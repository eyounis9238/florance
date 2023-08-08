<?php
$host = 'db4free.net:3306/florance';
$username = 'florance';
$password = 'Portal@123';
$dbName = 'florance';

function saveFeedbackToDatabase($name, $email, $cellNumber, $feedback)
{
    global $host, $username, $password, $dbName;

    $conn = new mysqli($host, $username, $password, $dbName);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $cellNumber = $conn->real_escape_string($cellNumber);
    //$rating = $conn->real_escape_string($rating);
    $feedback = $conn->real_escape_string($feedback);

    $sql = "INSERT INTO tblContact_us (name, email, cell_number, feedback) VALUES ('$name', '$email', '$cellNumber', '$feedback')";

    if ($conn->query($sql) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
