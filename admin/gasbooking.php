<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../files/boot.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/mobcss.css">

    <title>Gas Booking by Admin</title>
    <link rel="icon" type="image" href="../image/drona.jpg">
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
  <?php include "adminnav.php"?><?php include "protect.php"?><div class="row my-2">
 
<div class="text-center" style="width:100%">   <br><h1>Gas Booking By Admin</h1></div>
</div>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12"></div>
<div class="col-lg-4 col-md-4 col-sm-12">
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?><?php
include "../dbcon.php";
$id=$_GET['id'];
$sql1="select * from registration where id=$id";

$x1=mysqli_query($con,$sql1);

$r1=mysqli_fetch_assoc($x1);
$name=$r1['name'];
$username=$r1['username'];
$consumer=$r1['consumer'];
$mob=$r1['mob'];
$address=$r1['adress'];

$sql2="select * from `lpg` where id=(select max(id) from lpg)";
$x2=mysqli_query($con,$sql2);
$r2=mysqli_fetch_assoc($x2);
$_SESSION['price']=$r2['price'];
$_SESSION['subsidy']=$r2['subsidy'];
$_SESSION['total']=$r2['price']+$r2['subsidy'];
$amount=$_SESSION['total'];
$price=$_SESSION['price'];
$subsidy=$_SESSION['subsidy'];

if($x1)
{
?><form action="" method="post" enctype='multipart/form-data' class="cust-form";>
<div class="form-group"><label for="">Name</label><input type="text" name="name" value="<?= $name?>" class="form-control" readonly></div>
<div class="form-group"><label for="">Consumer ID</label><input type="text" name="consumer" value="<?= $consumer?>" class="form-control" readonly></div>
<div class="form-group"><label for="">Price</label><input type="text" name="price" value="<?= $_SESSION['price']?>" class="form-control" readonly></div>
<div class="form-group"><label for="">Handling Charges</label><input type="text" name="subsidy" value="<?= $_SESSION['subsidy']?>" class="form-control" readonly></div>
<div class="form-group"><label for="">Total Amount</label><input type="text" name="amount" value="<?= $_SESSION['total']?>" class="form-control" readonly></div>
<div class="form-group"><label for="">Mobile No.</label><input type="text" name="mob" value="<?= $mob?>" class="form-control"></div>
<div class="form-group"><label for="">Delivery Address</label><input type="text" name="address" value="<?= $address?>" class="form-control"></div>
<div class="form-group text-center"><button type="submit" class="btn btn-primary" name="submit">BOOK GAS</button></div>
<div class="form-group text-center"><a href="customer.php"><button type="button" class="btn btn-dark">BACK</button></a></div>
</form><?php
}?></div>

</div>

<div class="col-lg-4 col-md-4 col-sm-12"></div>

</div><?php include "../footer.php"?><?php
include("../dbcon.php");
if(isset($_POST['submit']))
{
extract($_POST);
$bookingdate=date('Y-m-d');

$sql3="INSERT INTO `booking`(`regid`, `name`, `username`, `consumer`, `mob`, `address`, `bookingdate`, `quantity`, `price`,`handlingcharge`, `amount`, `cardtype`) 
VALUES ($id,'$name','$username', '$consumer','$mob','$address','$bookingdate', '1','$price','$subsidy','$amount','Not Available')";

if(mysqli_query($con,$sql3))
{  
    $_SESSION['success']="You Successfully Booked Gas for $name"; 
    echo("<script>location.href = 'customer.php';</script>");
    
     }
else{
    $_SESSION['error']="Something went Wrong.."; 
    echo("<script>location.href = 'customer.php';</script>");
}
}
?></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>
     </body>
</html>

