<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  <link rel="stylesheet" href= "style.css">
</head>
<body>
<body>
    <div class="icon">
      <a href="cart.html"><i class="fa fa-shopping-cart" style="font-size: 40px; color: white;"></i></a>
      <a href="search.html"><i class="fa fa-search" style="font-size: 36px; color: white;"></i></a>
      <a href="login.html"><i class="fa fa-user-o" style="font-size: 36px; color: white;"></i></a>
      <a href="index.html"><i class="fa fa-sign-out" style="font-size: 36px; color: white;"></i></a>

    </div>


  <header id="header">
    <div id="logo"><img src="logo.png" alt="Logo"></div>
  </header>
  <h1>Admin Page - All Items</h1>

  <?php
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

    // Fetch all items from the database
    $sql = "SELECT * FROM items";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo '<table border="1">
              <tr>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Item Price</th>
                <th>Action</th>
              </tr>';
      // Loop through the items and display them in a table
      while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['item_id'] . '</td>';
        echo '<td>' . $row['item_name'] . '</td>';
        echo '<td>' . $row['item_price'] . '</td>';
        echo '<td>
                <form method="post" action="modify_item.php">
                  <input type="hidden" name="itemId" value="' . $row['item_id'] . '">
                  <input type="text" name="itemName" value="' . $row['item_name'] . '">
                  <input type="text" name="itemPrice" value="' . $row['item_price'] . '">
                  <button type="submit">Modify</button>
                </form>
                <form method="post" action="delete_item.php">
                  <input type="hidden" name="itemId" value="' . $row['item_id'] . '">
                  <button type="submit">Delete</button>
                </form>
              </td>';
        echo '</tr>';
      }
      echo '</table>';
    } else {
      echo 'No items found.';
    }

    // Close the database connection
    $conn->close();
  ?>
</body>
</html>
