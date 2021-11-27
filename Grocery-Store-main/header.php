<header>
  <div class="logo-container">
    <img src="./img/logo (2).png" alt="">
    <h4 class = "logo">Grocery Store</h4>
  </div>
  <nav>
    <ul class="nav-links-left">
      <li class="nav-link"><a href="index.html">Home</a></li>
      <li class="nav-link"><a href="categories.html">Categories</a></li>
      <li class="nav-link"><a href="About.html">About</a></li>
      <li class="nav-link"><a href="Contact.html">Contact</a></li>
    </ul>
  </nav>
  <!--- SEARCH BAR IS HERE--------------------------------------------------------------------->
<div class="topnav">
        <div class="search-container">
          <form action = "./actionSearch.php" method = "post">
            <input type="text" class = "search-bar" placeholder="Search your item..." name="searchItem" >
            <button type="submit" class ="submit-button" ><i class="fa fa-search"></i></button>
          </form>
        </div>
      </div>
<!-- END SEARCH BAR --------------------------------------------------------------------------------->
  <div>
    <ul class="nav-links-right">
     <!-- <li class="nav-link-right"><a href="#">Login/Sign Up</a></li> -->
      <li class="nav-link-right">
          <a href="viewCart.php" title="View Cart"><i class="icart"></i>
            <h5 class="px-5 cart">
              <i class="fas fa-shopping-cart"></i> Cart (<?php echo ($cart->total_items() > 0)?$cart->total_items().' Items':'Empty'; ?>)
            </h5>
            </a>
      </li>
    </ul>
  </div>
</header>
