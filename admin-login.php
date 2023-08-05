<?php

include("florance_database.php");


// Check the submitted credentials
$validUsername = 'admin'; // Replace with your admin username
$validPassword = 'admin2938'; // Replace with your admin password

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $validUsername && $password === $validPassword) {
        // Start a session and store the admin's username in the session data
        session_start();
        $_SESSION['admin'] = $username;

        // Redirect to the admin panel
        header('Location: admin_panel.php');
        exit();
    } else {
        // Incorrect credentials, show an error message
        echo 'Invalid username or password. Please try again.';
    }
}


?>
