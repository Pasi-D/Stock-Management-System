<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>

<body>


  <div id="nav">
  <ul>
      <li><a href="..\home"> HOME </a></li>
  <ul>
   </div>
  <div id="instruments-wrapper">
    <h1>Shirts</h1>
    <div class="instruments">
    <?php
    //current URL of the Page. cart_update.php redirects back to this URL
      $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        
      $results = $mysqli->query("SELECT * FROM products ORDER BY product_id ASC");
        if ($results) { 
      
            //fetch results set as object and output HTML
            while($obj = $results->fetch_object())
            {
          echo '<div class="instrument">'; 
                echo '<form method="post" action="cart_update.php">';
          echo '<div class="instrument-thumb"><img src="images/'.$obj->product_img_name.'"></div>';
                echo '<div class="instrument-content"><h3>'.$obj->product_name.'</h3>';
                echo '<div class="instrument-desc">'.$obj->product_desc.'</div>';
                echo '<div class="instrument-info">';
          echo 'product_price '.$currency.$obj->product_price.' | ';
                echo 'Qty <input type="text" name="product_qty" value="1" size="3" />';
          echo '<button class="add_to_cart">Add To Cart</button>';
          echo '</div></div>';
                echo '<input type="hidden" name="product_code" value="'.$obj->product_code.'" />';
                echo '<input type="hidden" name="type" value="add" />';
          echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
                echo '</form>';
                echo '</div>';
            }
        
        }
        ?>
    </div>
    
<div class="shopping-cart">
<h2>Your Shopping Cart</h2>
<?php
if(isset($_SESSION["products"]))
{
    $total = 0;
    echo '<ol>';
    foreach ($_SESSION["products"] as $cart_itm)
    {
        echo '<li class="cart-itm">';
        echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
        echo '<h3>'.$cart_itm["name"].'</h3>';
        echo '<div class="p-code">P code : '.$cart_itm["code"].'</div>';
        echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
        echo '<div class="p-product_price">product_price :'.$currency.$cart_itm["product_price"].'</div>';
        echo '</li>';
        $subtotal = ($cart_itm["product_price"]*$cart_itm["qty"]);
        $total = ($total + $subtotal);
    }
    echo '</ol>';
    echo '<span class="check-out-txt"><strong>Total : '.$currency.$total.'</strong> <a href="view_cart.php">Buy items</a></span>';
  echo '<span class="empty-cart"><a href="cart_update.php?emptycart=1&return_url='.$current_url.'">Empty Cart</a></span>';
}else{
    echo 'Your Cart is empty';
}
?>
</div>
    
</div>

</body>
</html>
