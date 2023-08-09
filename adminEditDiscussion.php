<?php
    require('db_conn.php');

    $error = null;
    if(!empty($_GET['id'])){
        $id = $_GET['id'];
    } else {
        $id = null;
        $error = "<p> Error! Discussion ID not found.";
    }

    if($error == null){
        $query = "SELECT * FROM tblDiscussion WHERE id = '$id';"; // replace with paramertized query using mysqli_stmt_bind_param
        $result = @mysqli_query($dbc, $query);
        
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $title = $row['title'];
            $content = $row['content'];
        } // else-> inccorect entry in db
    } else {
        echo $error;
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Florence Shop - Home</title>
    <link
      rel="stylesheet"
      
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <style>
        
      body {
        margin: 0;
        padding: 0;
        font-family: "Arial", sans-serif;
        background-color: #f9f9f9;
        color: #333;
      }

      #header {
        background-color: #ef84b3;
        color: #fff;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      #logo img {
        height: 50px;
      }

      #header-icons a:last-child {
        margin-left: 0;
      }

      #navigation {
        background-color: #ef84b3;
        padding: 10px 0;
        text-align: center;
      }

      #navigation ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
      }

      #navigation li {
        display: inline-block;
      }

      #navigation li a {
        display: inline-block;
        padding: 10px 20px;
        margin: 5px;
        color: #fff;
        text-decoration: none;
        background-color: #ef84b3;
        border-radius: 20px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.4);
        transition: background-color 0.3s ease;
      }

      #navigation li a:hover {
        background-color: #c95b88;
      }

      #content {
        padding: 40px;
        text-align: center;
      }

      main {
        margin: 20px;
        text-align: center;
        font-family: "Arial", sans-serif;
      }

      .icon {
        display: inline-block;
        position: fixed;
        top: 20px;
        right: 20px;
        padding-left: 10px;
        margin-right: 10px;
        color: white;
      }

      .product {
        display: inline-block;
        margin: 20px;
      }

      .product p {
        color: #555;
        font-size: 14px;
        margin-top: 10px;
      }

      .product a {
        text-decoration: none;
      }

      footer {
        background-color: #f1f1f1;
        padding: 20px;
        text-align: center;
        font-size: 12px;
        color: #555;
      }

      /* Added Styles */

      h1 {
        color: #ef84b3;
        font-size: 36px;
        margin-bottom: 20px;
      }

      h2 {
        color: #ef84b3;
        font-size: 24px;
        margin-bottom: 20px;
      }

      .product img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
      }

      .product img:hover {
        transform: scale(1.05);
      }

      footer p {
        margin: 0;
      }
    </style>
  </head>
  <body>
    <body>
      <div class="icon">
        <a href="cart.html"><i class="fa fa-shopping-cart" style="font-size: 40px; color: white;"></i></a>
        <a href="search.html"><i class="fa fa-search" style="font-size: 36px; color: white;"></i></a>
        <a href="login.html"><i class="fa fa-user-o" style="font-size: 36px; color: white;"></i></a>
  
      </div>

    <header id="header">
      <div id="logo"><img src="logo.png" alt="Logo"></div>
    </header>

    <nav id="navigation">
      <ul>
        <li><a href="userDetails.html">Users</a></li>
        <li><a href="AdminItemsList.php" >Items</a></li>
        <li><a href="AdminDiscussions.php">Discussions</a></li>
        <li><a href="AdminOrdersList.php">Orders</a></li>
        <li><a href="adminFeedback.php">Feedback</a></li>
      </ul>
    </nav>

    <div id="content">
      <h1>Welcome to Florence Shop</h1>
    </div>
    <div class="form-style-6">
    <form action="adminUpdateDiscussion.php" method="post" >
            <!-- <div>
                <label for="user_id">User ID : </label>
                <input type="text" id="user_id" name="user_id" value="<?php echo $user_id; ?>"/>
            </div> -->
            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
            <div>
                <label for="name">Title : </label>
                <input type="text" id="title" name="title" value="<?php echo $title; ?>"/>
            </div>
            <div>
                <label for="content">Post Text : </label>
                <input type="text" id="content" name="content" value="<?php echo $content; ?>"/>
            </div>
    
            <button type="submit">Update Data</button>
        </form>
        </div>
    <footer>
      <p>&copy; 2023 Florence Shop. All rights reserved.</p>
    </footer>

    
  </body>
</html>
