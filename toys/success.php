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
               <li>Success</li>
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
                          <div class="resp-tabs-container">
                              
                              <div class="tab4">
                                 <div class="row pay_info">
                                    <div class="col-md-12">
                                       <center>
                                          <h3 style="color: #26bb48;">
                                             <span class="fa fa-smile-o">
                                                Payment Successfully Done
                                             </span>
                                          </h3>
                                          <div class="clearfix"></div>
                                          <span>
                                          <a href="orderDetails.php" style="color: blue;">See order details</a>
                                          </span>
                                    </center>
                                    </div>
                                    
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