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

    <title>Invoice</title>
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
<div class="col-lg-1 col-md-1 col-sm-1">
</div>
<div class="col-lg-10 col-md-10 col-sm-10 mt-2">
<h1 class="text-center">LPG INVOICE</h1>

</div>
<div class="col-lg-1 col-md-1 col-sm-1">
<a href="profile.php" class="btn btn-outline-warning float-right mr-4 my-3">Close</a></div>
</div>
</div><div class="row mt-4">
<div class="col-lg-1 col-md-1 col-sm-1"></div>
<div class="col-lg-10 col-md-10 col-sm-10">
<?php
session_start();
include("dbcon.php");
$bookingid=$_SESSION['bookingid'];
$sql="select * from booking where id=$bookingid";
$x=mysqli_query($con,$sql);
if($r=mysqli_fetch_assoc($x))

{
?>
<table class="table table-bordered">
  <tr><th rowspan="2" colspan="2"><h2>DOMESTIC GAS</h2></th>
      <th>Date</th><td><?= $r['bookingdate']?></td>
  </tr>
  <tr><th>Booking id</th><td><?= $bookingid?></td></tr>
  <tr><th>Customer Name</th><td><?= $r['name']?></td><th>Mobile</th><td><?= $r['mob']?></td></tr>

<!-- the "pending on delivery" is to be changed to variable "status" after online payment portal is activated -->

<tr><th>Address</th><td><?= $r['address']?></td><th>Status</th><td>Pending on Delivery</td></tr>
<tr><th>Price</th>
    <td>&#8377;<?= $_SESSION['price']?></td>
    <th>Handling and Delivery Charges</th>
    <td>&#8377;<?=$_SESSION['subsidy']?></td>
</tr>

<tr><th colspan="2">Total Price</th><td colspan="2" align="center" style="font-size:20px;"><b>&#8377;<?=$r['amount']?></b></td></tr>
</table>
<span>The rates are tentative. Rates during the time of delivery has to be paid.</span>
<?php
}
?>
</div>
<div class="col-lg-1 col-md-1 col-sm-1"></div>
</div>
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 text-right">
<button class="btn btn-warning" onclick="window.print()">Print</button></div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="files/boot.js"></script> 
    <script src="files/boot1.js"></script>
    <script src="files/boot2.js"></script>
     </body>
</html>