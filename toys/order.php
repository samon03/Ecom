<?php 
include 'include/head.php'; 
include 'include/header.php';
include 'classes/Customer.php';

include 'classes/Cart.php';

$crt = new Cart();

if (isset($_POST['updateBtn'])) 
{
  $upID = $_POST['cartId']; 
  $upQuantity = $_POST['total'];
  $upQunData = $crt->updateQuantity($upQuantity, $upID);
}

// $cemail = $_GET['Customer_Email'];

$cemail = $_SESSION['useremail'];
$cur = new Customer();

$cusData = $cur->cusDetailsByemail($cemail)->fetch();

if ($cusData != false) 
{
 $cname = $cusData['Customer_Name'];
 $cphn = $cusData['Customer_Phone'];
 $caddrs = $cusData['Customer_Address'];
 $cid = $cusData['Customer_ID'];
 $ccity = $cusData['Customer_City'];

 
}

if (isset($_GET['orderid'])) 
{
      $cusID = $_SESSION['userId'];
      // echo $cusID;
      $orderData = $cur->orderProduct($cusID);
      $delCart = $cur->emptyCart();
      echo "<script>window.location.assign('success.php')</script>";
}

?>
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
  <li>Order</li>
</ul>
</div>
</div>
<!-- //short-->
<!--About -->
<section class="about py-lg-4 py-md-3 py-sm-3 py-3">
 <div class="container py-lg-5 py-md-4 py-sm-4 py-3">

  <div class="row">

   <div class="col-lg-8 clients-w3layouts-row">
    <div class="least-w3layouts-text-gap">
      <h4 style="color: #ea1d5d;">Your Orders </h4>
      <br>
      <div class="row">
        <div class="col-md-12 col-sm-12 news-img">

          <div class="shop_inner_inf">
           <div class="privacy about">
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
               </form> 


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
<div class="checkout-left" >
 <div class="col-md-4 checkout-left-basket" style="float: right;">

  <?php 
  $check = $crt->checkCartTable();
  if ($check) 
  {

    ?>
    <h4>Total Price</h4>
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

</div>
</div>
</div>
<div class="col-lg-4 clients-w3layouts-row">
 <div class="least-w3layouts-text-gap">
  <div class="row">
    <div class="col-md-12 col-sm-12 clients-says-w3layouts">
      <h4><?= $cname; ?></h4>
    </div>
    <div class="news-agile-text">
      <p class="mt-3" >
       <span>
        Email : 
      </span>  
      <?= $cemail; ?>
    </p>
    <p class="mt-3" >
     <span>
      Phone : 
    </span>  
    <?= $cphn; ?>
  </p>
  <p class="mt-3">
    <span>
     Address : 
   </span>  
   <?= $caddrs; ?>
 </p>
 <p class="mt-3">
   <span>
    City : 
  </span>  
  <?= $ccity; ?>
</p>
<br>
<p>  
  <form action="editProfile.php?Customer_ID=<?= $cid;?>" method="POST">       
    <button type="submit" class="btn btn-success" name="upBtn">
      Update
    </button>
  </form>     
</p>
</div>
</div>
</div>
</div>
</div>
  

</div>
<center>
<a href="order.php?orderid=order">
<input class="btn btn-danger submit" type="submit" value="Order" name="orderBtn" style="width: 300px; font-size: 20px;">
</a>
</center>
</section>
<!--//about -->
<?php include 'include/footer.php'; ?>
