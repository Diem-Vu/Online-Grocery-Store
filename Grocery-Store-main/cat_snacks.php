<?php
// Initialize shopping cart class
include_once 'Cart.class.php';
$cart = new Cart;

// Include the database config file
require_once 'dbConfig.php';
require_once 'component.php';

$cat_name = 'cat_snacks';


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<title>Snacks</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="cart.css">

<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500&display=swap" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php include_once('header.php') ?>
<body>
  <div class="container">
    <div class="row text-center py-5">
  <?php
  // Get products from database
  $result = $db->query("SELECT * FROM snacks ORDER BY id DESC LIMIT 10");
  if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        component($row['name'],$row['price'],$row['weight'],$row['id'],$cat_name,$row['photo']);
  ?>

            <?php } }else{ ?>
            <p>Product(s) not found.....</p>
            <?php } ?>

          </div>
        </div>
</body>
</html>
