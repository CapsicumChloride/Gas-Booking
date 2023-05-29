<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="files/boot.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>Bill & Payment</title>
    <link rel="icon" type="image" href="image/drona.jpg">
    <style>
    .container-fluid {
        margin:0px;padding:0px;
    }

    body {
        overflow-x :hidden;
    }
    </style>
  </head>
  <body>
<div class="container-fluid">
<!-- navbar start  -->
<div class="row mt-4">
  <div class="col-lg-10 col-md-10 col-sm-10 mt-2">
      <h1 class="text-center">Kapsona's LPG Bill</h1>
      <?php
      session_start();

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
  <div class="col-lg-1 col-md-1 col-sm-1"><a href="profile.php" class="btn btn-outline-warning float-right mr-4 my-3">Back</a></div>
</div>
<div class="row mt-4">
  
  <div class="col-lg-5 col-md-5 col-sm-10">
    <?php
    include("dbcon.php");
    $date=date('d-M-Y');
    $sql="select * from `lpg` where id=(select max(id) from lpg)";
    $x=mysqli_query($con,$sql);
    if($r=mysqli_fetch_assoc($x))
    {
          $_SESSION['price']=$r['price'];
          $_SESSION['subsidy']=$r['subsidy'];
          $_SESSION['total']=$r['price']+$r['subsidy'];
        $sq="select max(id) as maxid from booking";
        $y=mysqli_query($con,$sq);
        $result=mysqli_fetch_assoc($y);
        $bookingid=$result['maxid'];
        $_SESSION['bookingid']=$bookingid;

        ?>
      <table class="table table-bordered">
      <tr><th>Customer ID</th><td><?=$_SESSION['regid']?></td></td><th>Booking Id</th><td><?=$bookingid?></td></tr>
      <tr><th>Customer Name</th><td><?= $_SESSION['name']?></td><th>Date</th><td><?=$date?></td></tr>
      <tr><th>Customer Mobile</th><td><?= $_SESSION['mob']?></td><th>Address</th><td><?= $_SESSION['address']?></td></tr>
      <tr><th>Price</th><td>&#8377; <?= $r['price']?></td><th>Handling & Delivery Charges</th><td>&#8377; <?= $r['subsidy']?></td></tr>
      <tr><th>Total Price To Pay</th><td colspan="3" align="center"> &#8377;<?=$r['price']+$r['subsidy'] ?></td></tr>

      </table>
      <?php
    }
?>
</div>
<div class="col-lg-5 col-md-5 col-sm-10">
  <form action="" class="p-2 border border-danger shadow" method="post" >
    <div class="form-group form-inline">
     
      <div class="form-group form-inline">
        <label for="">Payment Type</label>
        <input type="radio" name="cardtype" value="UPI" class="mx-4">Google Pay/ UPI
        <span class="mx-4">|</span>
        <input type="radio" name="cardtype" value="Netbanking" class="mx-4">Online Banking
      </div>
      <br></br>
      <div class="form-group form-inline">
        <label for="">Total Amount To Be Paid</label>&nbsp;
        <input type="text" name="amount" class="form-control" readonly value="<?= $_SESSION['total']?>">
      </div>
    </div>

      <div class="form-group text-center">
      <button type="submit" name="submit" class="btn btn-outline-success btn-sm">SUBMIT</button>
    </div>
  </form>
</div>
<div class="col-lg-1 col-md-1 col-sm-1"></div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="files/boot.js"></script> 
    <script src="files/boot1.js"></script>
    <script src="files/boot2.js"></script>
     </body>
</html>

<?php

$price=$r['price'];
$subsidy= $_SESSION['subsidy'];

if(isset($_POST['submit']))
{
  extract($_POST);
  
  $query="UPDATE `booking` SET `cardtype`='$cardtype', `price`='$price',  `handlingcharge`='$subsidy', `amount`='$amount' WHERE id=$bookingid";

if(mysqli_query($con,$query))
{
  $_SESSION['success']="Booking Done Successfully .. Please Pay During Delivery"; 
  header("location:bill.php"); 
}
else
{
  $_SESSION['error']="Something went Wrong.."; 
  header("location:payment.php"); 
}

}


?>