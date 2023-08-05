<?php
// Database connection credentials
$servername = "localhost";
$username = "floranceAdmin";
$password = "eman90";
$dbname = "florance";

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve all items from the database
$sql = "SELECT * FROM items ORDER BY item_id DESC";
$result = $conn->query($sql);

// Generate the HTML code for each item
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $itemHTML = '<div class="flower-item">';
        //$itemHTML .= '<img src="item_image" alt="' . $row['item_name'] . '" />';
        $itemHTML .= '<img src="' . $row['item_image'] . '" alt="' . $row['item_name'] . '" />';

        $itemHTML .= '<h3>' . $row['item_name'] . '</h3>';
        $itemHTML .= '<p>Price: $' . $row['item_price'] . '</p>';
        $itemHTML .= '<button class="add-to-cart-button" data-product-name="' . $row['item_name'] . '" data-product-price="' . $row['item_price'] . '" data-product-id="' . $row['item_id'] . '">Add to Cart</button>';

        // Add other item details as required
        $itemHTML .= '</div>';

        echo $itemHTML;
    }
} else {
    echo 'No new items found.';
}

// Close the database connection
$conn->close();
?>
