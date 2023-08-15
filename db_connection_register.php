<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "db4free.net:3306/florance";
$username = "florance";
$password = "Portal@123";
$dbname = "florance";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
