<?php

include("florance_database.php");


// Check if the admin is logged in
session_start();
if (!isset($_SESSION['admin'])) {
    // Admin is not logged in, redirect to the login page
    header('Location: admin-login.html');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href= "style.css">
  <style>
    .logout-button {
  color: #eadddd;
  text-decoration: none;
}
  </style>
</head>
<body>
  <header class="admin-header">
    <h1>Admin Panel</h1>
    <p>Hello, <?php echo $_SESSION['admin']; ?></p>

    <a href="index.html" class="logout-button">Logout</a>
  </header>
  <nav class="admin-sidebar">
    <ul>
      <li><a href="">Manage Admin Profil</a></li>
      <li><a href="#">Manage Users</a></li>
      <li><a href="admin_iteams.html">Add Items</a></li>
      <li><a href="admin_control_items.php">Manage/Modify Items</a></li>

      <li><a href="#">Manage Discustion posts</a></li>
      <li><a href="#">Manage orders</a></li>

    </ul>
  </nav>
 
</body>
</html>
