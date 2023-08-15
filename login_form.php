<!DOCTYPE html>
<html>
<head>
    <title>Login - Florence shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
  </style>

</head>
<body>
    <!--<?php include "navbar.php"; ?>-->

    <div class="container mt-5">
        <h2>Login</h2>
        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="custom-btn">Login</button>

        </form>
    </div>

    <!--<?php include "footer.php"; ?>-->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
