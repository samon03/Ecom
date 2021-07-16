<?php 
include 'include/head.php'; 
include 'include/header.php';
include 'classes/Database.php';
include 'classes/Cart.php';

$crt = new Cart();

if (isset($_POST['updateBtn'])) 
{
  $upID = $_POST['cartId']; 
  $upQuantity = $_POST['total'];
  $upQunData = $crt->updateQuantity($upQuantity, $upID);
}

if (isset($_POST['checkBtn'])) 
{
    echo "<script>window.location.assign('payment.php')</script>";

}
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
         <li>Checkout</li>
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
            <h3>Cart</h3>
            <div class="checkout-right">

               <br>
               <?php
               if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) 
               {
                  $cartData = $crt->getCartProduct();
                  $i = 1;
                  $sum = 0;
                  $subtotal = 0;
                  if ($cartData) 
                  {
                     ?>
                     <table class="timetable_sub">
                        <thead>
                           <tr>
                              <th>SL No.</th>
                              <th>Product</th>
                              <th>Quality</th>
                              <th>Product Name</th>
                              <th>Price</th>
                              <th>Total Price</th>
                              <th colspan="2">Remove</th>
                              <!-- <th>Update</th> -->
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           while ($row = $cartData->fetch()) 
                           {
                              $proID = $row['Pro_ID'];
                              $proName = $row['Pro_Name'];
                              $proImg = $row['Pro_Img'];
                              $quantity = $row['Quantity'];
                              $proImg = $row['Pro_Img'];
                              $proPrice = $row['Pro_Price'];
                              $cartID = $row['Cart_ID'];

                              $sum = $proPrice * $quantity;
                                    // $subtotal = $subtotal + $sum;


                              ?>
                              <tr class="rem1">
                                 <td class="invert"><?= $i++; ?></td>
                                 <td class="invert-image">
                                    <a href="single.html">
                                       <img src="pic/<?= $proImg; ?>" alt=" " class="img-responsive"></a></td>
                                       <form action="cart.php" method="POST">  
                                          <td class="invert">
                                             <div class="quantity">
                                                <div class="quantity-select">
                                                  <input type="hidden" name="cartId" value="<?= $cartID; ?>">

                                                  <input type="number" name="total" min="1" style="width: 50px; text-align: center;" value="<?= $quantity; ?>">


                                               </div>
                                            </div>
                                         </td>
                                         <td class="invert"><?= $proName; ?></td>
                                         <td class="invert"><?= $proPrice; ?></td>
                                         <td class="invert"><?= $sum; ?></td>

                                         <td class="invert">
                                          <div class="rem">
                                           <button type="submit" name="updateBtn" style="border: none;">
                                              <i class="fa fa-edit"></i>
                                           </button>
                                        </form> 
                                        <a href="deleteCart.php?Cart_ID=<?= $cartID; ?>" onclick="return confirm('Are you sure to delete?<?= $cartID;?>')">
                                          <button type="submit" name="deleteBtn" style="border: none;">
                                           <i class="fa fa-trash"></i>
                                        </button>
                                     </a>

                                  </div>
                               </td>

                            </tr>
                            <?php

                            $subtotal = $subtotal + $sum;
                            $gTotal = $subtotal + $subtotal * 0.1;
                         }
                         ?>

                      </tbody>
                   </table>
                   <?php
                }
                else
                {
                  ?>
                  <h4 style="color: red;">Cart is empty.Shop Now.</h4>
                  <?php
               }

               ?>
            </div>
            <div class="checkout-left">
               <div class="col-md-4 checkout-left-basket">

                  <?php 
                  $check = $crt->checkCartTable();
                  if ($check) 
                  {

                    ?>
                    <h4>Continue to basket</h4>
                    <ul>
                     <li>Sub Total 
                        <i>-</i> 
                        <span><?= $subtotal;?> Tk</span>
                     </li>
                     <li>VAT 
                        <i>-</i> 
                        <span>10%</span>
                     </li>
                     <li>Grand Total 
                        <i>-</i> 

                        <span><?= $gTotal; ?> Tk</span>
                     </li>

                  </ul>

               </div>
               <div class="clearfix"> </div>
               <div class="clearfix"></div>
               <br>
               <form action="cart.php" method="POST">
               <button type="submit" class="toys-cart ptoys-cart add" name="checkBtn" style="float: left;">
                  Checkout
               </button>
               <button type="submit" class="toys-cart ptoys-cart add" name="conBtn" style="float: right;">
                  Continue Shopping
               </button>
               </form>
               <?php
            }
         }
         else
         {

            echo "<script>window.location.assign('sign.php')</script>";
         }
         ?>
      </div>

   </div>

</div>

<!-- //top products -->
</div>

</section>

<!--subscribe-address-->
<?php include 'include/footer.php'; ?>