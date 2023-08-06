<?php
include_once "db.php";

// Handle AJAX request to approve a discussion post
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["post_id"])) {
  $post_id = $_POST["post_id"];

  try {
    // Connect to the database
    $servername = "localhost";
    $username = "pm";
    $password = "123456";
    $dbname = "discussion_panel";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Perform the approval logic (e.g., update the post status as approved in the database)
    // Make sure to use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("UPDATE pending_posts SET status = 'approved' WHERE post_id = :post_id");
    $stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
    $stmt->execute();

    // Return a success response if the approval is successful
    echo json_encode(array("status" => "success"));
  } catch (PDOException $e) {
    // Return an error response if there's any issue with the database query
    echo json_encode(array("status" => "error", "message" => $e->getMessage()));
  }

  // Close the database connection
  $conn = null;
} else {
  // Return an error response if the request is not valid
  echo json_encode(array("status" => "error", "message" => "Invalid request."));
}
?>
