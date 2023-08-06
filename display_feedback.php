<?php
require_once 'db_Connection.php';

function displayAllFeedbacks_7003() {
    global $host, $username, $password, $dbName;

    $conn = new mysqli($host, $username, $password, $dbName);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $sql = "SELECT * FROM feedback";

    $result = $conn->query($sql);

    echo "<h2>All Feedbacks</h2>";
    echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Cell Number</th>
                <th>Feedback/Comments</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['cell_number'] . "</td>";
        echo "<td>" . $row['feedback'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    $conn->close();
}

displayAllFeedbacks_7003();
?>
