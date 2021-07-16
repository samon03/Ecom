<?php

include 'classes/Database.php';
include 'classes/Product.php';
include 'classes/Cart.php';

$pro = new Product();


?>
      <?php include 'include/head.php'; ?>
      <!--headder-->
      <?php include 'include/header.php'; ?>
      <!--//headder-->
      <!-- banner -->
      <div class="inner_page-banner one-img">
      </div>
      <!--//banner -->

      <div class="using-border py-3">
            <div class="inner_breadcrumb  ml-4">
               <ul class="short_ls">
                  <li>
                     <a href="index.php">Home</a>
                  </li>
               </ul>
            </div>
         </div>
      
      <!--show Now-->  
       <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container-fluid py-lg-5 py-md-4 py-sm-4 py-3">
           <!--  <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3">Toys Shop</h3> -->
            <div class="row">
              <!--  menu  -->
               <?php include 'include/menu.php'; ?>
               <!--  menu  -->
               <div class="left-ads-display col-lg-9">
                  <div class="row">
                     <?php  
                        $productData = $pro->getAllproduct();

                        while ($row = $productData->fetch()) 
                        {
                           $productTitle = $row['Pro_Title'];
                           $productPrice = $row['Pro_Price'];
                           $productImage = $row['Pro_Image'];
                           $productID = $row['Pro_ID'];

                           ?>
                           <div class="col-lg-4 col-md-6 col-sm-6 product-men women_two">
                        <div class="product-toys-info">
                           <div class="men-pro-item">
                              <div class="men-thumb-item">
                                 <img src="pic/<?= $productImage?>" class="img-thumbnail img-fluid" alt="">
                                 <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                       <a href="single.php?Pro_ID=<?= $productID; ?>" class="link-product-add-cart">Quick View</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="item-info-product">
                                 <div class="info-product-price">
                                    <div class="grid_meta">
                                       <div class="product_price">
                                          <h4>
                                             <a href="single.php?Pro_ID=<?= $productTitle; ?>">
                                                <?= $productTitle; ?>
                                             </a>
                                          </h4>
                                          <div class="grid-price mt-2">
                                             <span class="money ">
                                                <?= $productPrice;?> TK
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="toys single-item hvr-outline-out">
<!--                                        <form action="index.php?Pro_ID=<?= $productID; ?>" method="post">
                                         <button type="submit" class="toys-cart ptoys-cart" name="cartBtn">
                                          <i class="fas fa-cart-plus"></i>
                                          </button>
                                          <?php
                                          $crt = new Cart();

// cartBtn
if (isset($_POST['cartBtn'])) 
{
   $amount = 1;
   $crtData = $crt->addToCart($amount, $productID);
   // echo "<script>window.location.assign('checkout.php')</script>";
   if ($crtData) 
   {
       echo  "<br><h5 class='modal-title' style='color: red;'>".$crtData."</h5>";
   }
}
?>
                                       </form> -->
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                     </div>

                           <?php
                        }
                     ?>

                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- //show Now-->
      <!--subscribe-address-->
      <section class="subscribe">

         <div class="container-fluid">
            <h4 style="color: #ea1d5d">New Deals</h4>
            <br>
          <div class="row">
                     <?php  
                        $fourData = $pro->getFourproduct();

                        while ($row = $fourData->fetch()) 
                        {
                           // SELECT Pro_Title, Pro_Price, Pro_Image FROM product
                           $pfTitle = $row['Pro_Title'];
                           $pfPrice = $row['Pro_Price'];
                           $pfImage = $row['Pro_Image'];
                           $pfID = $row['Pro_ID'];

                           ?>
                           <div class="col-lg-3 col-md-3 col-sm-3 product-men women_two">
                        <div class="product-toys-info">
                           <div class="men-pro-item">
                              <div class="men-thumb-item">
                                 <img src="pic/<?= $pfImage?>" class="img-thumbnail img-fluid" alt="">
                                 <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                       <a href="single.php?Pro_ID=<?= $pfID; ?>" class="link-product-add-cart">Quick View</a>
                                    </div>
                                 </div>
                              </div>
                              <div class="item-info-product">
                                 <div class="info-product-price">
                                    <div class="grid_meta">
                                       <div class="product_price">
                                          <h4>
                                             <a href="single.php?Pro_ID=<?= $pfTitle; ?>">
                                                <?= $pfTitle; ?>
                                             </a>
                                          </h4>
                                          <div class="grid-price mt-2">
                                             <span class="money ">
                                                <?= $pfPrice;?> TK
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                     </div>

                           <?php
                        }
                     ?>

                  </div>
       </div>
      </section>
      <!--//subscribe-address-->
      <!--subscribe-address-->
     <?php include 'include/footer.php'; ?>