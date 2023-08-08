<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign up for our newsletter</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="emailForm.php">Form</a></li>
            <li><a href="results.php">Results</a></li>
        </ul>
    </nav>

    <?php
    require('database.php');

    function is_email_valid($email) {
        return !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function is_phone_valid($phone) {
        return !empty($phone) && count_numbers($phone) == 10;
    }

    function count_numbers($str) {
        return preg_match_all("/[0-9]/", $str);
    }

    $errors = [];

    if (!empty($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $name = NULL;
        $errors[] = "<p>We need your name if you want to get our newsletter.</p>";
    }

    if (isset($_POST['email']) && is_email_valid($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $email = NULL;
        $errors[] = "<p>We need your email if you want to get our newsletter.</p>";
    }

    if (isset($_POST['phone']) && is_phone_valid($_POST['phone'])) {
        $phone = $_POST['phone'];
    } else {
        $phone = NULL;
        $errors[] = "<p>We need your phone number if you want us to text you every five minutes.</p>";
    }

    if (count($errors) == 0) {
        $name_clean = prepare_string($dbc, $name);
        $email_clean = prepare_string($dbc, $email);
        $phone_clean = prepare_string($dbc, $phone);

        $q = "INSERT INTO tblsignup(name, email, phone) VALUES(?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $q);

        mysqli_stmt_bind_param(
            $stmt,
            'sss',
            $name_clean,
            $email_clean,
            $phone_clean
        );

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            $id = mysqli_insert_id($dbc);

            setcookie(
                'u',
                $id,
                [
                    'expires' => time() + 86400,
                    'path' => '/',
                    'domain' => $_SERVER['SERVER_NAME'],
                    'secure' => true,
                    'httponly' => true,
                    'samesite' => 'Strict'
                ]
            );

            echo "<p>Thank you $name for your submission.</p>";
            echo "<p>We will send only the best things to your email: $email.</p>";
            echo "<p>We will send lots of texts to: $phone.</p>";
        } else {
            echo "Your data wasn't saved due to an internal error. Please try again later.";
        }
    } else {
        foreach ($errors as $error) {
            echo $error;
        }
    }
    ?>
</body>
</html>
