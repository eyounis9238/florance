<?php
$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {   
  $username = $_POST["username"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirm_password"];

  
  if ($password === $confirmPassword) {
    // Information is right then Account created successfully
    $message = "Account created successfully!";
  } else {
    // Passwords do not match
    $message = "Passwords do not match. Please try again.";
  }
}
?>
