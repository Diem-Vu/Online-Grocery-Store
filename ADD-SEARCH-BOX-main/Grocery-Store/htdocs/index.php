<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Grocery Store</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <header>
      <div class="logo-container">
        <img src="./img/logo (2).png" alt="">
        <h4 class = "logo">Grocery Store</h4>
      </div>
      <nav>
        <ul class="nav-links-left">
          <li class="nav-link"><a href="index.php">Home</a></li>
          <li class="nav-link"><a href="categories.php">Categories</a></li>
          <li class="nav-link"><a href="#">About</a></li>
          <li class="nav-link"><a href="#">Contact</a></li>
        </ul>
      </nav>
      <div class="nav-links-right">
        <ul>
          <li class="nav-link-right"><a href="#">Login/Sign Up</a></li>
          <li class="nav-link-right"><a href="#"><img src="./img/cart.svg" alt="cart"></a></li>
        </ul>
      </div>
    </header>
    <div class="banner">
      <h1 class="banner-text"></h1>
      <img src="img\banner4.jpg" class="banner1">
    </div>
    <!--- SEARCH BAR IS HERE--------------------------------------------------------------------->
      <div class="topnav">
        <div class="search-container">
          <form action = "/Grocery/htdocs/process.php" method = "post">
            <input type="text" class = "search-bar" placeholder="Search your item..." name="search" >
            <button type="submit" class ="submit-button" ><i class="fa fa-search"></i></button>
          </form>
        </div>
    </div>
  <!-- END SEARCH BAR --------------------------------------------------------------------------------->
    <div class="feature-container">
      <h3>Categories</h3>
      <ul>
        <li><a href="#" class="feature-items"><img src="img\banana1.jpg"><h4>Fruits</h4></li>
        <li><a href="#" class="feature-items"><img src="img\meat.jpg"><h4>Meats</h4></li>
        <li><a href="#" class="feature-items"><img src="img\cabbage.jpg"><h4>Vegetables</h4></li>
        <li><a href="#" class="feature-items"><img src="img\beer1.jpg"><h4>Drinks</h4></li>
      </ul>
    </div>
  </body>
</html>
