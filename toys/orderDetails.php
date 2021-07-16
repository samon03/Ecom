<?php 
include 'include/head.php'; 
include 'include/header.php';
include 'classes/Customer.php';



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
         <li>Order Details</li>
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
                  $cus = new Customer();
                  $proData = $cus->productDetails();
                  $i = 1;
                  $sum = 0;
                  
                  if ($proData) 
                  {
                     ?>
                     <table class="timetable_sub">
                        <thead>
                           <tr>
                              <th>SL No.</th>
                              <th>Product Name</th>
                              <th>Product</th>
                              <th>Quality</th>
                              <th>Total Price</th>
                              <th>Date</th>
                              <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                           while ($row = $proData->fetch()) 
                           {

                              $ordID = $row['Order_ID'];
                              $cusID = $row['Customer_ID'];
                              $proID = $row['Pro_ID'];
                              $proName = $row['Pro_Title'];
                              $proImg = $row['Pro_Img'];
                              $quantity = $row['Quantity'];
                              $proImg = $row['Pro_Img'];
                              $proPrice = $row['Pro_Price'];
                              $status = $row['Status'];
                              $time = $row['Time'];

                              $sum = $proPrice * $quantity;
                                    // $subtotal = $subtotal + $sum;


                              ?>
                              <tr class="rem1">
                                 <td class="invert"><?= $i++; ?></td>
                                 <td class="invert"><?= $proName; ?></td>
                                 <td class="invert-image">
                                    <a href="#">
                                       <img src="pic/<?= $proImg; ?>" alt=" " class="img-responsive"></a></td>
                                       
                                          <td class="invert">
                                             <div class="quantity">
                                                <div class="quantity-select">
                                                 <input type="number" name="total" min="1" style="width: 50px; text-align: center;" value="<?= $quantity; ?>">
                                                </div>
                                            </div>
                                         </td>
                                         <td class="invert"><?= $sum; ?></td>
                                          <td class="invert"><?= $time; ?></td>
                                          
                                          <?php 
                                          if ($status == 1) 
                                          {
                                             ?>
                                              <td class="invert" style="color: green;">Shifted</td>
                                             <?php
                                          }
                                          else
                                          {
                                              ?>
                                              <td class="invert" style="color: red;">Pending</td>
                                             <?php
                                          }
                                          ?>

                                           


                            </tr>
                            <?php
                         }
                         ?>

                      </tbody>
                   </table>
                   <?php
                }
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