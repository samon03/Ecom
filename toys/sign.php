<?php  
      include 'include/head.php';
      include 'include/header.php';
      include 'classes/Customer.php';
      // include 'classes/Session.php';

      $cus = new Customer();

      if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) 
               {
                  $useremail = $_SESSION['useremail'];
                  $username = $_SESSION['username'];
                  echo "<script>window.location.assign('cart.php')</script>";
               }
?>
   
      <!-- banner -->
      <div class="inner_page-banner one-img">
      </div>
      <!--//banner -->

      <div class="using-border py-3">
            <div class="inner_breadcrumb  ml-4">
               <ul class="short_ls">
                  <li>
                     <a href="">Sign In/Sign up</a>
                  </li>
               </ul>
            </div>
         </div>
      
      <!--show Now-->  
       <section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container-fluid py-lg-5 py-md-4 py-sm-4 py-3">
   
            <div class="row">
               <div class="col-md-6">
                  <?php

                  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['regBtn'])) 
                  {
                         $regData = $cus->regInsert($_POST);

                         if (isset($regData)) 
                         {
                           echo  "<h5 class='modal-title' style='color: red;'>".$regData."</h5>";
                            
                         }
                         else
                         {
                             echo  "<h5 class='modal-title'>Invalid</h5>";
                         }
                  
                  }

                   
               ?>
                  <div class="register-form">
                     <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                  
                      </div>
                     <form action="sign.php" method="post">
                        <div class="fields-grid">
                           <div class="styled-input">
                              <input type="text" placeholder="Name" name="rname">
                           </div>
                           <div class="styled-input">
                              <input type="email" placeholder="Email" name="remail">
                           </div>
                           <div class="styled-input">
                              <input type="text" placeholder="Phone" name="rphone">
                           </div>
                           <div class="styled-input">
                              <input type="password" placeholder="Password" name="rpassword">
                           </div>
                           <div class="styled-input">
                              <input type="text" placeholder="City" name="rcity">
                           </div>
                           <div class="styled-input">
                              <input type="text" placeholder="Address" name="raddress">
                           </div>
                           
                            
                           <button type="submit" class="btn subscrib-btnn" name="regBtn">Register</button>
                        </div>
                       
                     </form>
                  </div>
               </div>

               

               <div class="col-md-6">

                  <?php

                  

                  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logBtn'])) 
                  {
                    $logData = $cus->cusLogin($_POST);

                    if (isset($logData)) 
                    {
                     echo  "<h5 class='modal-title' style='color: red;'>".$logData."</h5>";

                  }
            
               }

               ?>
                  <div class="register-form">
                     <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  
               </div>
                     <form action="sign.php" method="post">
                        <div class="fields-grid">
                           <div class="styled-input">
                              <input type="email" placeholder="Email" name="lemail">
                           </div>
                           <div class="styled-input">
                              <input type="password" placeholder="Password" name="lpass">
                           </div>
                           <button type="submit" class="btn subscrib-btnn" name="logBtn">Login</button>
                        </div>
                       
                     </form>
                  </div>
               </div>
               
            </div>
         </div>
      </section>
      <!-- //show Now-->
      <!--subscribe-address-->
     <?php include 'include/footer.php'; ?>