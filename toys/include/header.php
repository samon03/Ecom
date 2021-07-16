
   <body>
      <div class="header-outs" id="home">
         <div class="header-bar">
            <div class="info-top-grid">
               <div class="info-contact-agile">
                  <ul>
                     <li>
                        <span class="fas fa-phone-volume"></span>
                        <p>+(000)123 4565 32</p>
                     </li>
                     <li>
                        <span class="fas fa-envelope"></span>
                        <p><a href="mailto:info@ecom.com">info@ecom.com</a></p>
                     </li>
                     <li>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="container-fluid">
               <div class="hedder-up row">
                  <div class="col-lg-3 col-md-3 logo-head">
                     <h1><a class="navbar-brand" href="index.php">Ecom</a></h1>
                  </div>
                  <div class="col-lg-5 col-md-6 search-right">
                     <form class="form-inline my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search">
                        <button class="btn" type="submit">Search</button>
                     </form>

                  </div>
                  <div class="col-lg-4 col-md-3 right-side-cart">

                     <div class="cart-icons">

                        <ul style="float: right;">
                            
                           <?php
                           if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) 
                           {

                              ?>
                              <li style="border: none;">
                                 <!-- <a href="profile.php?Customer_Email=<?= $_SESSION['useremail']?>"> -->
                                    <a href="profile.php">
                                    <?= $_SESSION['username'];?>
                                 </a>
                              </li>
                              <li>
                                 <a href="./logout.php">
                                    <button type="button"> <span class="fa fa-reply-all"></span>
                                    </button>
                                 </a>
                              </li>
                              

                              <?php
                           }
                           else
                           {
                              ?>
                              <li>
                                 <a href="sign.php">
                                    <button type="button"> <span class="far fa-user"></span>
                                    </button>
                                 </a>
                              </li>
                              <?php
                           }
                           ?>
                          </ul>
                        
                     </div>
                  </div>
               </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                  <ul class="navbar-nav ">
                     <li class="nav-item ">
                        <a class="nav-link" href="index.php">Home</span></a>
                     </li>
                     <li class="nav-item">
                        <a href="cart.php" class="nav-link">Cart</a>
                     </li>
                     

                     <?php
                           if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) 
                           {

                              ?>
                              <li class="nav-item">
                        <a href="payment.php" class="nav-link">Payment</a>
                     </li> 
                     <li class="nav-item">
                        <a href="orderDetails.php" class="nav-link">Order list</a>
                     </li>
                      <li class="nav-item">
                        <a href="compare.php" class="nav-link">Compare list</a>
                     </li>
                     <li class="nav-item">
                        <a href="wishlist.php" class="nav-link">Wishlist</a>
                     </li>

                     <?php
                  }
                  ?>
                  </ul>
               </div>
            </nav>
         </div>
      </div>