<?php  
include 'include/headSingle.php';
include 'include/header.php';
include 'classes/Database.php';
include 'classes/Product.php';
include 'classes/Cart.php';

$pro = new Product();
$crt = new Cart();

if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] != true)
{
 echo "<script>window.location.assign('sign.php')</script>";
}

$proID = $_GET['Pro_ID'];
$proData = $pro->selProByID($proID)->fetch();

if ($proData != false) 
{
 $proImg = $proData['Pro_Image'];
 $proTitle = $proData['Pro_Title'];
 $proDes = $proData['Pro_Description'];
 $proPrice = $proData['Pro_Price'];
 $proCate = $proData['Category_Id'];
 $proBrand = $proData['Brand_Id'];

 $fetchCBname = $pro->nameFromId($proCate, $proBrand)->fetch();
 $cateN = $fetchCBname['Category_Name'];
 $brandN = $fetchCBname['Brand_Name'];

 
}


?>

<!--//headder-->
<!-- banner -->
<div class="inner_page-banner one-img">
</div>
<!--//banner -->
<!-- short -->
<div class="using-border py-3">
 <div class="inner_breadcrumb  ml-4">
  <ul class="short_ls">
   <li>
    <a href="index.php">Home</a>
    <span>/ /</span>
  </li>
  <li>Single Page</li>
</ul>
</div>
</div>
<!-- //short-->
<!--//banner -->
<!--/shop-->
<section class="banner-bottom py-lg-5 py-3">
 <div class="container">
  <div class="inner-sec-shop pt-lg-4 pt-3">
   <div class="row">
    <div class="col-lg-4 single-right-left ">
     <div class="grid images_3_of_2">
      <div class="flexslider1">
       <ul class="slides">
        <li data-thumb="pic/<?= $proImg; ?>">
         <div class="thumb-image"> 
          <img src="pic/<?= $proImg; ?>" data-imagezoom="true" class="img-fluid" alt=" "> </div>
        </li>

      </ul>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<div class="col-lg-8 single-right-left simpleCart_shelfItem">
  <h3><?= $proTitle?></h3>
  <p><span class="item_price">
   <h5>
     <span style="color: #ea1d5d;">Price : </span><?= $proPrice; ?> Tk
   </h5>
 </span>
</p>
<p><span class="item_price">
 <h5><span style="color: #ea1d5d;">Category : </span><?= $cateN; ?></h5>
</span>
</p>
<p><span class="item_price">
 <h5><span style="color: #ea1d5d;">Brand : </span><?= $brandN; ?></h5>
</span>
</p>
<div class="occasional">
 <div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
<div class="occasion-cart">
 <div class="toys single-item singlepage">
  <form action="single.php?Pro_ID=<?= $proID; ?>" method="post">
   <input type="number" name="amount" value="1" min="1">
   <button type="submit" class="toys-cart ptoys-cart add" name="cartBtn">
    Add to Cart
  </button>

</form>
</div>
<br>
<form action="single.php?Pro_ID=<?= $proID; ?>" method="post">
<button type="submit" class="toys-cart ptoys-cart add" style="background: green;" name="compareBtn">
    Add to Compare
  </button>
  <button type="submit" class="toys-cart ptoys-cart add" style="background: orange;" name="wishBtn">
      Add to Wishlist
  </button>
</div>
</form>
<?php
if (isset($_POST['cartBtn'])) 
{
 $amount = $_POST['amount'];
 $crtData = $crt->addToCart($amount, $proID);
   // echo "<script>window.location.assign('checkout.php')</script>";
 if ($crtData) 
 {
   echo  "<br><h5 class='modal-title' style='color: red;'>".$crtData."</h5>";
 }
}

if (isset($_POST['compareBtn'])) 
{
  $id = $_SESSION['userId'];
  $compareData = $pro->compareProduct($id ,$proID);

 if ($compareData) 
 {
   echo  "<br><h5 class='modal-title' style='color: red;'>".$compareData."</h5>";
 }
}

if (isset($_POST['wishBtn'])) 
{
  $id = $_SESSION['userId'];
  $wishData = $pro->addToWishlist($id ,$proID);

 if ($wishData) 
 {
   echo  "<br><h5 class='modal-title' style='color: red;'>".$wishData."</h5>";
 }
}


?>
</div>
<div class="clearfix"> </div>
<!--/tabs-->
<div class="responsive_tabs">
  <div id="horizontalTab">
   <ul class="resp-tabs-list">
    <li style="width: auto;">Description</li>
  </ul>
  <div class="resp-tabs-container">
    <!--/tab_one-->
    <div class="tab1">
     <div class="single_page">
      <p><?= $proDes; ?></p>
    </div>
  </div>
  <!--//tab_one-->
</div>
</div>
</div>
<!--//tabs-->
</div>
</div>
</div>
</section>
<!--subscribe-address-->

<!--//subscribe-address-->
<?php include 'include/footerSingle.php'; ?>