<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection credentials
    include("florance_database.php");


    // Retrieve the form input values
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user credentials
    $sql = "SELECT * FROM tblUsers WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        // Set the session variables
        $row = $result->fetch_assoc();
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['userType'] = $row['userType'];

        // Redirect to order history page
        header("Location: order_history.php");
        exit();
    } else {
        // Invalid login credentials
        $error_message = "Invalid email or password. Please try again.";
    }

    // Close the database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="POST" action="">
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Log In</button>
    </form>
</body>
</html>

