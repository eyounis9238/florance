<?php
session_start();

if (!isset($_SESSION['userID'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form was submitted
    $orderID = $_POST['orderID'];

    // Your database connection credentials
    include("florance_database.php");


    // Get the order status from the database
    $sql = "SELECT orderStatus FROM tblOrders WHERE orderID = $orderID";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $orderStatus = $row['orderStatus'];

        if ($orderStatus === 'Placed') {
            // Update the order status to "Cancelled"
            $updateSql = "UPDATE tblOrders SET orderStatus = 'Cancelled' WHERE orderID = $orderID";

            if ($conn->query($updateSql) === TRUE) {
                // Redirect back to order_history.php after successful cancellation
                header("Location: order_history.php");
                exit();
            } else {
                echo "Error updating order status: " . $conn->error;
            }
        } else {
            echo "Cannot cancel order. Order status is not 'Placed'.";
        }
    } else {
        echo "Order not found.";
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the order history page if the form was not submitted
    header("Location: order_history.php");
    exit();
}
?>
