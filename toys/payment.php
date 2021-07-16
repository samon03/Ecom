<?php 
include 'include/head.php'; 
include 'include/header.php';

if (isset($_POST['prevBtn'])) 
{
    echo "<script>window.location.assign('cart.php')</script>";

}


?>
      <!-- banner -->
      <div class="inner_page-banner one-img">
      </div>
      <!-- short -->
      <div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="index.php">Home</a>
                  <span>/ /</span>
               </li>
               <li>Payment</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!-- top Products -->
      <section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <div class="ads-grid_shop">
               <div class="shop_inner_inf">
                  <div class="privacy about">
                    
                     <!--/tabs-->
                     <div class="responsive_tabs">
                        <div id="horizontalTab">
                           <h3 style="color: black;"><span>Choose your payment option</span></h3>
                           <div class="resp-tabs-container">
                              
                              <div class="tab4">
                                 <div class="row pay_info">
                                    <div class="col-md-12">
                                       <center>
                                    <div class="col-md-6" style="float: right; font-size: 26px;">
                                       
                                       <a class="btn btn-primary" style=" font-size: 22px;">Online Payment</a>
                                    </div>
                                    <div class="col-md-6">
                                       
                                       <a class="btn btn-primary" href="order.php" style=" font-size: 22px;">Offline Payment</a>
                                    </div>
                                    </center>
                                    </div>
                                    <div class="clearfix"></div>
                                    <center>
                                    <div class="col-md-12" style="margin-top: 8em;">
                                       <form class="cc-form" action="payment.php" method="POST">
                                          
                                          <input class="btn btn-primary submit" type="submit" value="Previous" name="prevBtn">
                                          
                                       </form>
                                    </div>
                                    </center>
                                    <div class="clearfix"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--//tabs-->
                  </div>
               </div>
               <!-- //payment -->
               <div class="clearfix"></div>
            </div>
         </div>
      </section>
      <!--subscribe-address-->
<?php include 'include/footer.php'; ?>