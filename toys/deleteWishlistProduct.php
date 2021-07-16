
<?php
include 'classes/Database.php';
include 'classes/Product.php';

$pro = new Product();

$proID = $_GET['Pro_ID'];

if (isset($proID)) 
{
    $pro = $pro->delWishlistProduct($proID);
    echo "<script>window.location.assign('wishlist.php')</script>";
}


?>