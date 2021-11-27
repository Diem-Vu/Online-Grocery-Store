<?php
function component($productname, $productprice,$productdesc,$productid,$cat_name,$img){
  $element = "
  <div class=\"col-md-3 col-sm-6 my-3 my-md-3\">
              <form action=\"$cat_name.php\" method=\"post\">
                  <div class=\"card shadow\">
                      <div>
                          <img src=\"$img\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                      </div>
                      <div class=\"card-body\"'>
                          <h5 class=\"card-title\">$productname</h5>
                          <p class=\"card-text\">
                              $productdesc
                          </p>
                          <h5>
                              <span class=\"price\">$$productprice</span>
                          </h5>
                            <a href=\"cartAction.php?action=addToCart&id=$productid\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></a>
                            <input type='hidden' name='product_id' id='product_id' value='$productid'>
                      </div>
                  </div>
              </form>
          </div>

  ";
  echo $element;
}

function cart($productimg,$productname,$productamount,$productprice,$productid,$quantity){
  $element = "
  <form action=\"cart.php?action=remove&ID_Item=$productid\" method=\"post\" class=\"cart-items\">
    <div class=\"border rounded\">
      <div class=\"row bg-white\">
        <div class=\"col-md-3 pl-0\">
          <img src=\"img\" class=\"img-fluid\">
        </div>
        <div class=\"col-md-6\">
          <h5 class=\"pt-2\">$productname</h5>
          <small class=\"text-secondary\">Quantity: $quantity</small>
          <h5 class=\"pt2\">$$productprice</h5>
          <button type=\"submit\" class=\"btn btn-danger max-2\" name=\"remove\">Remove</button>
        </div>
        <div class ='col-md-3'>
          <div>
          <input type=\"submit\" name=\"add\" style=\"margin-top: 5px;\" class=\"btn btn-success\" value=\"+\">
          <input type=\"submit\" name=\"minus\" style=\"margin-top: 5px;\" class=\"btn btn-success\" value=\"-\">
          </div>
        </div>
      </div>
    </div>
  </form>
  ";
  echo $element;
}



?>
