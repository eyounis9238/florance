<!DOCTYPE html>
<html>
<head>
    <title>Register - florence shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function validateForm() {
            var fullName = document.getElementById("full_name").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var email = document.getElementById("email").value;
            var phone = document.getElementById("phone").value;
            var country = document.getElementById("country").value;
            
            // Basic name validation (only letters and spaces)
            var namePattern = /^[A-Za-z\s]+$/;
            if (!namePattern.test(fullName)) {
                alert("Please enter a valid name.");
                return false;
            }

          

            return true;
        }
    </script>

<style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Arial", sans-serif;
      background-color: #f9f9f9;
      color: #333;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #ef84b3;
    }

    .container input[type="text"],
    .container input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .container .custom-btn {
    width: 100%;
    padding: 10px;
    background-color: #ef84b3; /* our main color */
    border: none;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
}

    .container p {
      text-align: center;
      margin-top: 10px;
    }

    .container p a {
      color: #ef84b3;
      text-decoration: none;
    }

    .container .login-btn {
    width: 100%;
    padding: 10px;
    background-color: #ef84b3;
    border: none;
    color: #fff;
    font-weight: bold;
    cursor: pointer;
  }

  /* Added custom margin to create spacing but not working may be cause of bootstrap */
  .container .login-btn + .login-btn {
    margin-top: 50px;
  }
  </style>


</head>
<body>
    <!--<?php include "navbar.pp"; ?>   Don't need this file-->

    <!--<div class="icon">
        <a href="login_form.php"><i class="fa fa-user-o" style="font-size: 36px; color: white;"></i></a>
      </div>-->

    <div class="container mt-5">
        <h2>Register</h2>
        <form action="register_process.php" method="POST" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" id="full_name" name="full_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <button type="submit" class="custom-btn">Register</button>
            
        </form>

        <a href="login_form.php" class="login-btn">Login</a>

    </div>

    <!--<?php include "footer.php"; ?> don't need this-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
