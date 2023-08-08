<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign up for our newsletter</title>
    <link rel="stylesheet" href="validate.css" />
	<link rel="stylesheet" href="body.css" />
</head>
<body>
    <h1 id="header">Sign up for our newsletter!</h1>
    <nav>
        <ul>
            <li><a href="emailForm.php">Form</a></li>
            <li><a href="results.php">Results</a></li>
        </ul>
    </nav>
    <form action="register.php" method="post" id="registrationForm">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="field"/>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" class="field email"/>
            <span id="emailError" class="hidden"></span>
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" class="field"/>
        </div>
        <button type="submit">Submit</button>
    </form>
    <script src='validate.js'></script>
</body>
</html>
