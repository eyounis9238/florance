<?php
require_once "db_connection_register.php"; // database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $fullName = $_POST["full_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $country = $_POST["country"];

    $user_type = "user"; // Default user type

    // Check if the username is "admin", and if so, set user_type to "admin"
    if ($username === "admin") {
        $user_type = "admin";
    }

   

    
    $sql = "INSERT INTO tbllogin_users (username, password, full_name, email, phone, country, user_type) VALUES ('$username', '$password', '$fullName', '$email', '$phone', '$country', '$user_type')";

    if ($conn->query($sql) === TRUE) {
        // Redirecting to the index page after successful registration
        header("Location: login_form.php");
        exit; // Make sure to exit to prevent further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
