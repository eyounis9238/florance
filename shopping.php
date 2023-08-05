
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Florence Shop - Shopping</title>
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
/>
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
    color: #fff;
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

  .flower-list {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
  }

  .flower-item {
    width: 200px;
    margin: 20px;
    padding: 20px;
    text-align: center;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
  }

  .flower-item:hover {
    transform: translateY(-5px);
  }

  .flower-item img {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border-radius: 50%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s ease;
  }

  .flower-item:hover img {
    transform: scale(1.05);
  }

  .flower-item h3 {
    font-size: 20px;
    margin-top: 10px;
  }

  .flower-item p {
    margin-top: 5px;
  }

  .sorting-options {
    margin-bottom: 20px;
  }

  #sort {
    padding: 5px 10px;
    border-radius: 5px;
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
    <li><a href="index.html">Home</a></li>
    <li><a href="shopping.html" >Shopping</a></li>
    <li><a href="discussion.html">Discussion</a></li>
    <li><a href="account.html">Account</a></li>
    <li><a href="#">About Us</a></li>
  </ul>
</nav>

</head>
<body>
  <div id="content">
    <h1>Welcome to Florence Shop</h1>
  </div>

  <main>
    <section id="featured">
      <h2>Featured Flowers</h2>



      <div class="flower-list">
        <div class="flower-item">
          <img src="rose.jpg" alt="Roses" />
          <h3>Rose</h3>
          <p>Price: $10</p>
          <p>Rating: 4.5 stars</p>
          <button class="add-to-cart-button" data-product-name="Rose" data-product-price="10" data-product-id="1">Add to Cart</button>
        </div>
        <div class="flower-item">
          <img src="lily.jpg" alt="Lillies" />
          <h3>Lily</h3>
          <p>Price: $8</p>
          <p>Rating: 4 stars</p>
          <button class="add-to-cart-button" data-product-name="Lily" data-product-price="8" data-product-id="2">Add to Cart</button>
        </div>
        <div class="flower-item">
          <img src="tulip.jpg" alt="Tulips" />
          <h3>Tulip</h3>
          <p>Price: $6</p>
          <p>Rating: 4.2 stars</p>
          <button class="add-to-cart-button" data-product-name="Tulip" data-product-price="6" data-product-id="3">Add to Cart</button>

        </div>
        <div class="flower-item">
          <img src="orchid.jpg" alt="Orchids" />
          <h3>Orchid</h3>
          <p>Price: $7</p>
          <p>Rating: 4.8 stars</p>
          <button class="add-to-cart-button" data-product-name="Orchid" data-product-price="7" data-product-id="4">Add to Cart</button>

        </div>
        <div class="flower-item">
          <img src="carnation.jpg" alt="Carnations" />
          <h3>Carnation</h3>
          <p>Price: $7</p>
          <p>Rating: 4.8 stars</p>
          <button class="add-to-cart-button" data-product-name="Carnation" data-product-price="7" data-product-id="5">Add to Cart</button>

        </div>
        <div class="flower-item">
          <img src="dahlia.jpg" alt="Dahlias" />
          <h3>Dahlia</h3>
          <p>Price: $8</p>
          <p>Rating: 5 stars</p>
          <button class="add-to-cart-button"  data-product-name="Dahlia" data-product-price="8" data-product-id="6">Add to Cart</button>

        </div>
        <div class="flower-item">
          <img src="daisy.jpg" alt="Daisies" />
          <h3>Daisy</h3>
          <p>Price: $7.5</p>
          <p>Rating: 4 stars</p>
          <button class="add-to-cart-button" data-product-name="Daisy" data-product-price="7.5" data-product-id="7">Add to Cart</button>

        </div>
        <div class="flower-item">
          <img src="lavender.jpg" alt="Lavenders" />
          <h3>Lavender</h3>
          <p>Price: $8</p>
          <p>Rating: 4.5 stars</p>
          <button class="add-to-cart-button" data-product-name="Lavender" data-product-price="8" data-product-id="8">Add to Cart</button>

        </div>
        <div class="flower-item">
          <img src="buttercup.jpg" alt="Buttercups" />
          <h3>Buttercup</h3>
          <p>Price: $10</p>
          <p>Rating: 4.2 stars</p>
          <button class="add-to-cart-button" data-product-name="Buttercup" data-product-price="10" data-product-id="9">Add to Cart</button>

        </div>
        <div class="flower-item">
          <img src="marigold.jpg" alt="Marigolds" />
          <h3>Marigold</h3>
          <p>Price: $10</p>
          <p>Rating: 4.7 stars</p>
          <button class="add-to-cart-button" data-product-name="Mariglod" data-product-price="10" data-product-id="10">Add to Cart</button>

        </div>
        

      </div>
    </section>
    <section>
    <h2>Newly Added Item</h2>
      <div class="flower-list" id="new-item" >

        <!-- Call get_new_item.php to display the latest item -->
        <?php include("get_latest_item.php"); ?>

      </div>
      
    </section>
  </main>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="shopping.js"></script>

  <footer>
    <p>&copy; 2023 Florence Shop. All rights reserved.</p>
  </footer>
  

</body>
</html>