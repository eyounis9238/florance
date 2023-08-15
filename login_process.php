<?php
// Start session
session_start();

// database connection file
require_once "db_connection_register.php";

// Initialize variables
$username = $_POST["username"];
$password = $_POST["password"];
$login_error = "";

// Validate user input
if (empty($username) || empty($password)) {
    $login_error = "Both username and password are required.";
} else {
    // Validating  user credentials
    $sql = "SELECT * FROM tbllogin_users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // Fetch user details including user_type
        $user = $result->fetch_assoc();
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["user_type"] = $user["user_type"];

        // Redirect to the pages based on user type
        if ($user["user_type"] === "admin") {
            header("Location: admin_panel.php");
        } else {
            header("Location: index.html");
        }
        exit(); // Important to exit after redirect
    } else {
        $login_error = "Invalid username or password.";
    }
}

// Close the database connection
$stmt->close();
$conn->close();
?>
