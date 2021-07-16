<?php
// include 'classes/Database.php';
include 'classes/Brand.php';
include 'classes/Category.php';

$cat = new Category();
$brnd = new Brand();

?>

<div class="side-bar col-lg-3">
                  <div class="search-hotel">
                     <h3 class="agileits-sear-head">Search Here..</h3>
                     <form action="#" method="post">
                        <input type="search" placeholder="Product name..." name="search" required="">
                        <input type="submit" value=" ">
                     </form>
                  </div>
                     <!-- price range -->
                     <div class="left-side" style="padding: 1em;">
                     <h3 class="agileits-sear-head" style="color: #ea1d5d">Category</h3>
                     <ul>
                           <?php

                           $catData = $cat->getAllCategory();

                           if ($catData) 
                           {
                              while ($row = $catData->fetch()) 
                              {
                                 
                                 $cID = $row['Category_Id'];
                                 $cName = $row['Category_Name'];

                                 ?>
                                  <li>
                                    <a href="">
                                        <span>
                                          <?= $cName;?>
                                         </span>
                                    </a>   
                                 </li>
                                 <?php
                              } 
                           }

                           ?>
                           
                        </ul>
                        <br>
                        <h3 class="agileits-sear-head" style="color: #ea1d5d;">Brand</h3>
                        <ul>
                           <?php

                           $brndData = $brnd->getAllBrand();

                           if ($brndData) 
                           {
                              while ($row = $brndData->fetch()) 
                              {
                                 
                                 $bID = $row['Brand_ID'];
                                 $bName = $row['Brand_Name'];

                                 ?>
                                  <li>
                                    <a href="">
                                        <span>
                                          <?= $bName;?>
                                         </span>
                                    </a>   
                                 </li>
                                 <?php
                              } 
                           }

                           ?>
                           
                        </ul>
                     </div>
                     <!-- //price range -->
               </div>