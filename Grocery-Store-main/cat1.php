<?php
//start session
session_start();

require_once('createDB.php');
require_once('component.php');



// create instance of db
$database = new createDB("grocerystore","productitems");

if (isset($_POST['button'])){
    //print_r($_POST['product_id']);
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        $quantity = $_SESSION['quantity'];
        $id = $_POST['product_id'];
        if(in_array($_POST['product_id'], $item_array_id)){
          $_SESSION['cart'][$id]++;
          print_r($_SESSION['cart'][$id]);
          print_r($_POST['product_id']);
        }else{
            $_SESSION['cart'][$id] = 1;
            $quantity = $_SESSION['quantity'];
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id'],
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
                'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}

// if(isset($_POST['button'])){
//   //print_r($_POST['product_id']);
//   if(isset($_SESSION['cart'])){
//
//
//   if(isset($_SESSION['cart'])){
//     $count = count($_SESSION['cart']);
//     $item_array = array(
//       'product_id'=>$_POST['product_id']
//     );
//     $_SESSION['cart'][$count] = $item_array;
//     //print_r($_SESSION['cart']);
//   }
//   else {
//     $item_array = array(
//       'product_id'=>$_POST['product_id']
//     );
//     // Create session variable
//     $_SESSION['cart'][1000] = $item_array;
//     //print_r($_SESSION['cart']);
//   }
// }

?>

<!DOCTYPE html>

<html lang="en"

<head>
    <meta charset="utf-8">
    <title>Test</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php require_once('header.php') ?>
<body>
  <div class="container">
    <div class="row text-center py-5">
      <?php
        $result = $database->getData();
        while($row = mysqli_fetch_assoc($result)){
          component($row['Item_Name'],$row['Price'],$row['Photo'],$row['Description'],$row['ID_Item'],$row['Weight']);
        }
      ?>
    </div>

</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
