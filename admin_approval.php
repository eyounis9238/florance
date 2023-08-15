<!-- admin_approval.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Admin Approval</title>
</head>
<body>
    <h1>Pending Discussion Posts for Approval</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
        
        <?php
        $conn = new mysqli("db4free.net:3306/florance", "florance", "Portal@123", "florance");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM tblDiscussion WHERE approved = 0";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['author'] . "</td>";
            echo "<td>" . $row['content'] . "</td>";
            echo '<td><a href="approve_post.php?id=' . $row['id'] . '">Approve</a> | <a href="reject_post.php?id=' . $row['id'] . '">Reject</a></td>';
            echo "</tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
