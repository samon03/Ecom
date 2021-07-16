<?php 
include 'include/head.php'; 
include 'include/header.php';
include 'classes/Database.php';
include 'classes/Product.php';

if (isset($_POST['conBtn'])) 
{
    echo "<script>window.location.assign('index.php')</script>";
}


?>
<!--//headder-->
<!-- banner -->
<div class="inner_page-banner one-img">
</div>
<!-- short -->
<div class="using-border py-3">
 <div class="inner_breadcrumb  ml-4">
  <ul class="short_ls">
   <li>
    <a href="index.php">Home</a>
    <span>/ /

    </span>
  </li>
  <li>Wishlist</li>
</ul>
</div>
</div>
<!-- //short-->
<!--Checkout-->  
<!-- //banner -->
<!-- top Products -->
<section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
 <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
  <div class="shop_inner_inf">
   <div class="privacy about">
    <!-- <h3>Cart</h3> -->
    <div class="checkout-right">

     <br>
     <?php
     if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) 
     {

                  // $customer = $_SESSION['userId'];
      $pro = new Product();
      $proData = $pro->wistList();
      $i = 1;

      if ($proData) 
      {
       ?>
       <table class="timetable_sub">
        <thead>
         <tr>
          <th>SL No.</th>
          <th>Image</th>
          <th>Product</th>
          <th>Price</th>
          <th colspan="2">Actions</th>
        </tr>
      </thead>
      <tbody>
       <?php

       while ($row = $proData->fetch()) 
       {

        $proID = $row['Pro_ID'];
        $proName = $row['Pro_Name'];
        $proImg = $row['Pro_Img'];
        $proPrice = $row['Pro_Price'];

        ?>
        <tr class="rem1">
         <td class="invert"><?= $i++; ?></td>
         <td class="invert-image">
          <a href="#">
           <img src="pic/<?= $proImg; ?>" alt=" " class="img-responsive"></a>
         </td>
         <td class="invert"><?= $proName; ?></td>

         <td class="invert"><?= $proPrice; ?></td>
         <td class="invert-image">
          <a href="single.php?Pro_ID=<?= $proID; ?>" >
           <button type="submit" class="btn btn-success btn-sm">
             Buy
           </button> 
         </a>
         <a href="deleteWishlistProduct.php?Pro_ID=<?= $proID; ?>" onclick="return confirm('Are you sure to delete?')">
                <button type="reset" class="btn btn-danger btn-sm" name="removeBtn">
                   Remove
                </button> 
         </a>
       </td>

     </tr>
     <?php
   }
   ?>

 </tbody>
</table>
<?php
}
else
                {
                  ?>
                  <h4 style="color: blue;">Wishlist is empty!</h4>
                  <?php
               }
}

?>
</div>
<br>
<form action="compare.php" method="POST">
<button type="submit" class="toys-cart ptoys-cart add" name="conBtn" style="float: right;">
  Continue Shopping
</button>
</form>
</div>
</div>
<!-- //top products -->
</div>
</section>

<!--subscribe-address-->
<?php include 'include/footer.php'; ?>