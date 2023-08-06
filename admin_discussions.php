<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Discussions</title>
  <style>
    /* ... (existing CSS styles) ... */
  </style>
</head>
<body>
  <h1>Discussion Posts</h1>

  <table id="discussion-table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Content</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include_once "db.php";

      // Connect to the database and retrieve pending discussion posts
      // (Assuming you have a database named "discussion_approval" with table "pending_posts" where pending posts are stored)
      $servername = "localhost";
      $username = "pm";
      $password = "123456";
      $dbname = "discussion_panel";

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM pending_posts");
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($rows) {
          foreach ($rows as $row) {
            echo "<tr>";
            echo "<td class='post-title'>" . htmlspecialchars($row["post_title"]) . "</td>";
            echo "<td class='post-author'>" . htmlspecialchars($row["post_author"]) . "</td>";
            echo "<td class='post-content'>" . htmlspecialchars($row["post_content"]) . "</td>";
            echo "<td><button onclick='approvePost(this)'>Approve</button></td>";
            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='4'>No discussion posts awaiting approval.</td></tr>";
        }
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }

      $conn = null;
      ?>
    </tbody>
  </table>

  <script>
    // Function to handle post approval in the admin panel (same code as in admin_discussions.js)
  </script>
</body>
</html>
