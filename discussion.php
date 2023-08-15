<!DOCTYPE html>
<html>
  <head>
    <title>Florence Shop - Discussion</title>
    <style>
      #content h1 {
        color: black;
      }
    </style>
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
  </head>

  <body>
    <!--<div class="icon">
      <i class="fa fa-shopping-cart" style="font-size: 40px"></i>
      <i class="fa fa-search" style="font-size: 36px"></i>
    </div>-->
    <div class="icon">
        <a href="cart.html"><i class="fa fa-shopping-cart" style="font-size: 40px; color: white;"></i></a>
        <a href="search.html"><i class="fa fa-search" style="font-size: 36px; color: white;"></i></a>
        <a href="register.php"><i class="fa fa-user-o" style="font-size: 36px; color: white;"></i></a>
      </div>

    <header id="header">
      <div id="logo"><img src="logo2.png" alt="Logo"></div>
    </header>

    <nav id="navigation">
      <ul>
      <li><a href="index.html">Home</a></li>
        <li><a href="shopping.html" >Shopping</a></li>
        <li><a href="flowers.html" >Flowers</a></li>
        <li><a href="Equipments.html" >Equipments</a></li>
        <li><a href="discussion.php">Discussion</a></li>
        <li><a href="account.html">Account</a></li>
        <li><a href="About.html">About Us</a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
    </nav>

    <div id="content">
      <h1>Welcome to the Discussion Forum</h1>
    </div>

    <header>
      <h2>Discussion Thread</h2>
    </header>

    <div class="discussion-container">
      <?php
      $conn = new mysqli("db4free.net:3306/florance", "florance", "Portal@123", "florance");
  
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
  
      $sql = "SELECT * FROM tblDiscussion WHERE approved = 1"; // Only fetch approved posts
      $result = $conn->query($sql);
  
      while ($row = $result->fetch_assoc()) {
        echo '<div class="post">';
        echo '<div class="post-header">';
        echo '<h2 class="post-title">' . $row['title'] . '</h2>';
        echo '<p class="post-author">Posted by: ' . $row['author'] . '</p>';
        echo '</div>';
        echo '<div class="post-content">';
        echo '<p>' . $row['content'] . '</p>';
        echo '</div>';
        echo '<button class="post-button" onclick="sendPostToAdminPanel(' . $row['id'] . ')">Post a Reply</button>';
        echo '</div>';
      }
  
      $conn->close();
      ?>
    </div>

      <div class="post">
        <div class="post-header">
          <h2 class="post-title">
            Inquiry about Different Types of Flowers and Money Plants
          </h2>
          <p class="post-author">Posted by: Pruthviraj Mariwad</p>
        </div>
        <div class="post-content" id="postContent1">
          <p>
            I am writing to inquire about the various types of flowers and money
            plants available at your nursery/garden center. As an avid gardener,
            I am always looking to expand my collection and introduce new
            varieties into my garden. Flower Varieties: Could you please share a
            list of the different types of flowers you have in stock? Are there
            any specific seasonal flowers that you recommend for the current
            time of the year? Do you have any rare or exotic flower species that
            are not commonly found in local gardens? What are the prices of the
            flowers, and do they vary depending on the type and size? Money
            Plants: Do you have a variety of money plants available? Can you
            provide details about the different types of money plants you offer?
            Are there any specific care instructions or tips for maintaining
            healthy money plants? What are the price ranges for the money
            plants, and are they based on size or variety?
          </p>
        </div>
        <button class="post-button" onclick="sendPostToAdminPanel(1)">Post a Reply</button>
      </div>

      <!-- Will Add more discussion posts here -->

      <div class="post">
        <div class="post-header">
          <h2 class="post-title">Discussion Title</h2>
          <p class="post-author">Posted by: Justin Trudeau</p>
        </div>
        <div class="post-content" id="postContent1">
          <p>This is another discussion post.</p>
        </div>
        <button class="post-button" onclick="sendPostToAdminPanel(1)">Post a Reply</button>
      </div>

      <!-- Will Add more discussion posts here -->
    </div>

    <form id="post-form" action="post_discussion.php" method="post">
      <h2>Post a Discussion</h2>
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" required />
      <label for="author">Author:</label>
      <input type="text" id="author" name="author" required />
      <label for="contentInput">Content:</label>
      <textarea id="contentInput" name="content" rows="4" required></textarea>
      <button type="submit">Post</button>
    </form>    
    <footer>
      <p>&copy; 2023 Florence Shop. All rights reserved.</p>
    </footer>
    
  </body>
</html>
