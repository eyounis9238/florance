<?php
// Connect to the MySQL server
$servername = "localhost";
$username = "pm";
$password = "123456";
$dbname = "discussion_panel";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create the 'pending_posts' table
$sql_pending_posts = "CREATE TABLE IF NOT EXISTS pending_posts (
  post_id INT AUTO_INCREMENT PRIMARY KEY,
  post_title VARCHAR(255) NOT NULL,
  post_author VARCHAR(100) NOT NULL,
  post_content TEXT NOT NULL,
  status VARCHAR(50) DEFAULT 'pending'
)";

if ($conn->query($sql_pending_posts) === TRUE) {
  // Log the success or perform other actions if necessary
} else {
  // Log the error or perform other error handling actions
}

// Create the 'approved_posts' table
$sql_approved_posts = "CREATE TABLE IF NOT EXISTS approved_posts (
  post_id INT AUTO_INCREMENT PRIMARY KEY,
  post_title VARCHAR(255) NOT NULL,
  post_author VARCHAR(100) NOT NULL,
  post_content TEXT NOT NULL
)";

if ($conn->query($sql_approved_posts) === TRUE) {
  // Log the success or perform other actions if necessary
} else {
  // Log the error or perform other error handling actions
}

$conn->close();
?>
