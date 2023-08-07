<?php
// modify_item

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["itemId"]) && isset($_POST["itemName"]) && isset($_POST["itemPrice"])) {
    // Database connection credentials
       include("florance_database.php");


    // Prepare and execute the update query
    $sql = "UPDATE items SET item_name = ?, item_price = ? WHERE item_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdi", $_POST["itemName"], $_POST["itemPrice"], $_POST["itemId"]);
    $result = $stmt->execute();

    // Close the statement and the connection
    $stmt->close();
    $conn->close();

    // Check if the update was successful
    if ($result) {
        echo "Item modified successfully!";
    } else {
        echo "Failed to modify the item.";
    }
}
?>
