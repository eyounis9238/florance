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

    <h2>User Information</h2>
    <table width="80%">
        <thead>
            <tr align="left">
                <th><a href="#" class="querySort">name</a></th>
                <th><a href="#" class="querySort">email</a></th>
                <th><a href="#" class="querySort">phone</a></th>
            </tr>
        </thead>
        <tbody id="query">
            <?php
                require('database.php');
                $q = 'SELECT name, email, phone FROM tblsignup;';
                $results = @mysqli_query($dbc, $q);

                while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                    $str = "<tr><td>{$row['name']}</td>";
                    $str .= "<td>{$row['email']}</td>";
                    $str .= "<td>{$row['phone']}</td></tr>";

                    echo $str;
                }
            ?>
        </tbody>
    </table>

    <h2>Email Counts</h2>
    <table width="80%">
        <thead>
            <tr align="left">
                <th>email</th>
                <th>count</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $q = 'SELECT email, count(email) AS count FROM tblsignup GROUP BY email;';
                $results = @mysqli_query($dbc, $q);

                while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
                    $str = "<tr><td>{$row['email']}</td>";
                    $str .= "<td>{$row['count']}</td></tr>";

                    echo $str;
                }

                setcookie('hello', 'world');
            ?>
        </tbody>
    </table>
    <script src="results.js"></script>
</body>
</html>
