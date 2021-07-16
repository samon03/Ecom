<?php 
include 'include/head.php'; 
include 'include/header.php';
include 'classes/Customer.php';

$cid = $_GET['Customer_ID'];

$cur = new Customer();

$cusData = $cur->cusDetailsByid($cid)->fetch();

if ($cusData != false) 
{
 $cname = $cusData['Customer_Name'];
 $cphn = $cusData['Customer_Phone'];
 $caddrs = $cusData['Customer_Address'];
 $cemail = $cusData['Customer_Email'];
 $ccity = $cusData['Customer_City'];

 if (isset($_POST['saveBtn'])) 
 {
  $cusData = $cur->updateProfile($_POST, $cid);
  echo "<script>window.location.assign('profile.php')</script>";
}


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
  <center>
   <div class="col-lg-6 clients-w3layouts-row">
     <div class="least-w3layouts-text-gap">
       <form action="editProfile.php?Customer_ID=<?= $cid;?>" method="POST">
        <div class="row" style="text-align: left;">
          <div class="col-md-12 col-sm-12 clients-says-w3layouts">
            <h4>
              <input type="text" name="cname" value="<?= $cname; ?>">
            </h4>
          </div>
          <div class="news-agile-text">
            <p class="mt-3" >
             <span>
              Email : 
            </span>  
            <input type="text" name="cemail" value="<?= $cemail; ?>">
          </p>
          <p class="mt-3" >
           <span>
            Phone : 
          </span>
          <input type="text" name="cphn" value="<?= $cphn; ?>">  

        </p>
        <p class="mt-3">
          <span>
           Address : 
         </span>  
         <input type="text" name="caddrs" value="<?= $caddrs; ?>">

       </p>
       <p class="mt-3">
         <span>
          City : 
        </span> 
        <input type="text" name="ccity" value="<?= $ccity; ?>"> 

      </p>
      <br>
      <p>  
       
        <button type="submit" class="btn btn-success" name="saveBtn">
          Save
        </button>
      </p>
    </div>
  </div>
</form>
</div>
</div>
</center>
</div>


</div>
</section>
<!--//about -->
<?php include 'include/footer.php'; ?>
