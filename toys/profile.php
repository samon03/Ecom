<?php 
include 'include/head.php'; 
include 'include/header.php';
include 'classes/Customer.php';

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
         <li>Profile</li>
      </ul>
   </div>
</div>
<!-- //short-->
<!--About -->
<section class="about py-lg-4 py-md-3 py-sm-3 py-3">
   <div class="container py-lg-5 py-md-4 py-sm-4 py-3">

      <!-- <div class="row">

         <div class="col-lg-6 clients-w3layouts-row">
            <div class="least-w3layouts-text-gap">
                <h4 style="color: #ea1d5d;">Your Orders </h4>
                <br>
               <div class="row">
                  <div class="col-md-12 col-sm-12 news-img">
                    <div class="high">
                       <div class="sets" style="color: #0047b3;">
                         <i class="fa fa-pencil-square"
                         style="border-radius: 50%; margin-right: 5px; color: #0047b3;"></i>
                         <label> Recent Posted Group </label>
                      </div>
                      <div class="sets">
                         <i class="fa fa-window-restore"
                         style="border-radius: 50%; margin-right: 5px; color: #000;"></i>
                         <label>reTitle </label>
                         <span style="color: grey; font-size: 11px; font-weight: normal; text-align: right;">reTime</span>
                      </div>

                   </div>
                </div>

             </div>
          </div>
       </div> -->
       <center>
       <div class="col-lg-6 clients-w3layouts-row" style="text-align: left;">
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
       </center>
    </div>
 </div>
</div>
</div>


</div>
</section>
<!--//about -->
<?php include 'include/footer.php'; ?>
