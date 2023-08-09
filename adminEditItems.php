<?php
    require('db_conn.php');

    $error = null;
    if(!empty($_GET['item_id'])){
        $item_id = $_GET['item_id'];
    } else {
        $item_id = null;
        $error = "<p> Error! Item Id not found.";
    }

    if($error == null){
        $query = "SELECT i.item_id,i.item_name,i.item_price,i.quantity,i.category_id,i.approved FROM `items` i
         where item_id= $item_id;"; // replace with paramertized query using mysqli_stmt_bind_param
        $result = @mysqli_query($dbc, $query);
        
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $name = $row['item_name'];
            $price = $row['item_price'];
            $Quantity = $row['quantity'];
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

      .form-style-6{
    font: 95% Arial, Helvetica, sans-serif;
    max-width: 400px;
    margin: 10px auto;
    padding: 16px;
    background: #F7F7F7;
  }
  .form-style-6 h1{
    background: #ef84b3;
    padding: 20px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
  }
  .form-style-6 input[type="text"],
  .form-style-6 input[type="date"],
  .form-style-6 input[type="datetime"],
  .form-style-6 input[type="email"],
  .form-style-6 input[type="number"],
  .form-style-6 input[type="search"],
  .form-style-6 input[type="time"],
  .form-style-6 input[type="url"],
  .form-style-6 textarea,
  .form-style-6 select 
  {
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 3%;
    color: #555;
    font: 95% Arial, Helvetica, sans-serif;
  }
  .form-style-6 input[type="text"]:focus,
  .form-style-6 input[type="date"]:focus,
  .form-style-6 input[type="datetime"]:focus,
  .form-style-6 input[type="email"]:focus,
  .form-style-6 input[type="number"]:focus,
  .form-style-6 input[type="search"]:focus,
  .form-style-6 input[type="time"]:focus,
  .form-style-6 input[type="url"]:focus,
  .form-style-6 textarea:focus,
  .form-style-6 select:focus
  {
    box-shadow: 0 0 5px #ef84b3;
    padding: 3%;
    border: 1px solid #ef84b3;
  }
  
  .form-style-6 input[type="submit"],
  .form-style-6 input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 3%;
    background: #ef84b3;
    border-bottom: 2px solid #ef84b3;
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;	
    color: #fff;
  }
  .form-style-6 input[type="submit"]:hover,
  .form-style-6 input[type="button"]:hover{
    background: #ef84b3;
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
    <form action="adminUpdateItem.php" method="post" >

            <input type="hidden" id="item_id" name="item_id" value="<?php echo $item_id; ?>">
            <div>
                <label for="name">Name : </label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>"/>
            </div>
            <div>
                <label for="price">Price : </label>
                <input type="text" id="price" name="price" value="<?php echo $price; ?>"/>
            </div>
            <div>
                <label for="quantity">Quantity : </label>
                <input type="text" id="quantity" name="quantity" value="<?php echo $Quantity; ?>"/>
            </div>
            <button type="submit">Update Item</button>
        </form>
      </div>
    <footer>
      <p>&copy; 2023 Florence Shop. All rights reserved.</p>
    </footer>

    
  </body>
</html>
