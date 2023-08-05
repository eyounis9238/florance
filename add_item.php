<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form input values
    $itemName = $_POST['item_name'];
    $itemImage = $_POST['item_image'];
    $itemPrice = $_POST['item_price'];
    $userID = $_POST['user_id'];
    $quantity = $_POST['quantity'];
    $categoryID = $_POST['category_id'];

    // Database connection credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "florance";

    // Create a new database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the new item into the database
    $sql = "INSERT INTO items (item_name, item_image, item_price, user_id, quantity, category_id)
    VALUES ('$itemName', '$itemImage', '$itemPrice', '$userID', '$quantity', '$categoryID')";

    if ($conn->query($sql) === TRUE) {
        $message = "New item added successfully!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

if (isset($message)) {
    echo $message;
}
?>
