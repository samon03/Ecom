<?php

session_start();

include 'classes/Database.php';
include 'classes/Product.php';

$pro = new Product();
$delcompareList = $pro->delCompareList();


session_unset();
session_destroy();

echo "<script>window.location.assign('sign.php')</script>";

?>