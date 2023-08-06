<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <!-- Add your CSS styles here -->
</head>
<body>
    <h1>Order History</h1>

    <?php
    session_start();
    // Check if the user is logged in
    if (!isset($_SESSION['userID'])) {
        echo "You are not logged in. Please log in to view your order history.";
    } else {
        // Your database connection credentials
        include("florance_database.php");


        $userID = $_SESSION['userID'];

        // Retrieve the user's orders from the database
        $sql = "SELECT * FROM tblOrders WHERE userID = $userID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Order ID</th><th>Item ID</th><th>Amount</th><th>Status</th><th>Actions</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['orderID'] . "</td>";
                echo "<td>" . $row['itemID'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td>" . $row['orderStatus'] . "</td>";
                
                // Check if the order status allows cancellation
                echo '<td>';
                if ($row['orderStatus'] === 'Placed') {
                    echo '<form method="POST" action="cancel_order.php">';
                    echo '<input type="hidden" name="orderID" value="' . $row['orderID'] . '">';
                    echo '<button type="submit">Cancel Order</button>';
                    echo '</form>';
                } else {
                    echo 'Cannot cancel';
                }
                echo '</td>';

                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No orders found.";
        }

        // Close the database connection
        $conn->close();
    }
    ?>

    <a href="logout.php">Logout</a>
</body>
</html>
