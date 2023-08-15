<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
    <link rel="stylesheet" type="text/css" href="new_style.css">
</head>
<body>



<div class="icon">
        <a href="cart.html"><i class="fa fa-shopping-cart" style="font-size: 40px; color: white;"></i></a>
        <a href="search.html"><i class="fa fa-search" style="font-size: 36px; color: white;"></i></a>
        <a href="register.php"><i class="fa fa-user-o" style="font-size: 36px; color: white;"></i></a>
      </div>


    <header id="header">
      <div id="logo"><img src="logo2.png" alt="Logo" /></div>
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




    <div class="container">
        <h2 class="feedback-title">Feedback Form</h2>
        <form action="save_feedback.php" method="post">
            <div>
                <label for="name">Name*</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div>
                <label for="email">Email*</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="cell_number">Cell Number</label>
                <input type="tel" name="cell_number" id="cell_number">
            </div>


            <div>
                <label for="feedback">Feedback/Comments</label>
                <textarea name="feedback" id="feedback" rows="5"></textarea>
            </div>

            <div>
                <input type="submit" value="Submit">
            </div>
        </form>

        <!--<form action="display_feedback.php" method="post">
            <div>
                <input type="submit" value="Display All Feedbacks">
            </div>
        </form>-->

    </div>
</body>
</html>
