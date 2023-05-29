<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Custom CSS -->
    <link rel="stylesheet" href="style/mobcss.css">
    <link rel="stylesheet" href="style/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="files/boot.css">
     <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Kapsona Gas Booking</title>
    <link rel="icon" type="image" href="image/drona.jpg">
    <style>
    html {
      scroll-behavior:smooth
    }
    .container-fluid {
        margin-left:0px;padding:0px;
    }
   
    </style>
  </head>
  <body>
<!-- php navbar  -->
<?php include 'navbarindex.php';?>
<!--php navbar ends -->

<!-- PhP Side Social Icons -->
<?php include 'sidebar.php';?>
<!-- PhP Side Social Icons End -->


<div class="container-fluid">

<div class="row mt-5" >
<div class="col-lg-12 col-md-12 col-sm-12 ">
<?php
session_start();
if(isset($_SESSION['success']))
{
  ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success Message</strong> <?php echo $_SESSION['success'] ?>
  <button type="button" class="close" data-dismiss="alert" ><span>&times;</span></button>
</div>
  <?php
  unset($_SESSION['success']);
}
?>
<?php
if(isset($_SESSION['error']))
{
  ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error Message</strong> <?php echo $_SESSION['error'] ?>
  <button type="button" class="close" data-dismiss="alert" ><span>&times;</span></button>
</div>
  <?php
  unset($_SESSION['error']);
}
?>

</div>
</div>
<div class="row my-5" id="home">
  <div class="mainscreen-left">
    <h1 class='display-12 text-center'>Kapsona's Office</h1>
    <h1 class='display-14 text-center'>Gas Booking Portal </h1>
    <h1 class='dude text-center mt-4'>We Deliver Happiness</h1>
    <center><a href="registration.php"><button class="btn btn-outline-dark mt-4">Get Started</button></a></center>
  </div>
  <div class="mainscreen-right">
<!-- slider start -->
  <div id="carouselExampleIndicators" class="carousel slide mt-2" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="image/GAS1.jpg" class="d-block w-100 kaps" alt="...">
      </div>
      <div class="carousel-item">
        <img src="image/indane.jpg" class="d-block w-100 kaps" alt="..." >
      </div>
      <div class="carousel-item">
        <img src="image/service.jpg" class="d-block w-100 kaps" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<!-- slider end -->
</div>
</div>


<div class="row mt-5" >
  <!-- Left to right slider text -->
<?php
            include("dbcon.php");
            $sql="select * from schedule ";
            $x=mysqli_query($con,$sql);
            while($r=mysqli_fetch_assoc($x))
            {
            ?>
             <div class="marq text-center">
             <marquee class="marque">** <?php echo $r['message']?> **</marquee>
            </div>
            <?php
            }
            ?>
     
<!-- Left to right slider text end-->
<div class="bg-dark text-white py-3 text-center thorough">
Features / Services
</div>
</div>


<div class="box-mid-index">
<div class="sub-box-index">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Instant Booking</h5>
    <h6 class="card-subtitle mb-2 text-muted">Online Booking Portal</h6>
    <p class="card-text">Customers Can book LPG anytime <br> anywhere</p>
    </div>
</div>
</div>

<div class="sub-box-index">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Safe Payment</h5>
    <h6 class="card-subtitle mb-2 text-muted">Online Pay For LPG</h6>
    <p class="card-text">Safely Pay Online through any easy methods suitable to you</p>
    </div>
</div>
</div>

<div class="sub-box-index">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Quick Delivery</h5>
    <h6 class="card-subtitle mb-2 text-muted">Fast Service To Deliver</h6>
    <p class="card-text">LPG Deliver To Your Doorstep By Delivery Boy</p>
    </div>
</div>
</div>

<div class="sub-box-index">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">History</h5>
    <h6 class="card-subtitle mb-2 text-muted">View History & Transaction</h6>
    <p class="card-text">Customer Can Check Their Booking History & Transactions </p>
    </div>
</div>
</div>

</div>


<div class="row mt-5" >
<div class="thorough bg-dark text-white py-3 text-center">
Contact Us /Query/ Complain
</div>
</div>
<div class="row my-5" id="contact">
<div class="col-lg-4 col-md-4 col-sm-12 text-center">
<span class="dude">Address :</span> Office: - G27/2, Kapsona's Den <br> Mundamvelli <br> Kochi, Kerala
</div>
<div class="col-lg-4 col-md-4 col-sm-12 text-center">
<span class="dude">Office:</span> 0484-123-456
</div>
<div class="col-lg-4 col-md-4 col-sm-12 text-center">
<span class="dude">Mob:</span> 8275615382
</div>
</div>

<!-- Contact/ Feedback Form -->

<form action="contact.php" method="post" class="cust-cust-form">
<h4 class="text-center"> Customer Feedback </h4>
<div class="row p-2" >
  <div class="col-lg-6 col-md-6 col-sm-12 my-1"><input type="text" name="name" placeholder="Enter Your Name" class=form-control></div>
  <div class="col-lg-6 col-md-6 col-sm-12 my-1"><input type="text" name="mob" placeholder="Enter Your Mobile" class=form-control></div>
</div>
<div class="row p-2">
  <div class="col-lg-12 col-md-12 col-sm-12"><input type="text" name="sub" placeholder="Enter Subject" class=form-control></div>
</div>
  <div class="row p-2"><div class="col-lg-12 col-md-12 col-sm-12"><textarea name="msg" placeholder="Enter Message" class=form-control></textarea></div>
</div>
<div class="row p-2" ><div class="col-lg-12 col-md-12 col-sm-12 text-center"><button class="btn btn-outline-primary" name="submit">SUBMIT</button></div></form>
</div>

<!-- php footer -->
<?php include 'footer.php';?>

</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="files/boot.js"></script> 
    <script src="files/boot1.js"></script>
    <script src="files/boot2.js"></script>
     </body>
</html>