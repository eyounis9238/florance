<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $conn = new mysqli("db4free.net:3306/florance", "florance", "Portal@123", "florance");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE tblDiscussion SET approved = 1 WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: discussion.php"); // Redirect back to discussion page
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
