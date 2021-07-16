<?php
include 'classes/Database.php';
include 'classes/Cart.php';


$crt = new Cart();

$delID = $_GET['Cart_ID'];

//echo $delID;

if (isset($delID)) 
{
	$delDate = $crt->deleteFromCart($delID);
	echo "<script>window.location.assign('cart.php')</script>";
}

?>