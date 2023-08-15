<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];

    $conn = new mysqli("db4free.net:3306/florance", "florance", "Portal@123", "florance");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tblDiscussion (title, author, content, approved) VALUES (?, ?, ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $title, $author, $content);
    if ($stmt->execute()) {
        echo "Post submitted and awaiting approval.";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    
}
?>
