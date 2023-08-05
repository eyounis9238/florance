<?php
// delete_item

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["itemId"])) {
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

    // Prepare and execute the delete query
    $sql = "DELETE FROM items WHERE item_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_POST["itemId"]);
    $result = $stmt->execute();

    // Close the statement and the connection
    $stmt->close();
    $conn->close();

    // Check if the deletion was successful
    if ($result) {
        echo "Item deleted successfully!";
    } else {
        echo "Failed to delete the item.";
    }
}
?>
