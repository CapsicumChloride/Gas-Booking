<?php
session_start();
include("dbcon.php");
if(empty($_SESSION['name']) && empty($_SESSION['id']))
{
    $_SESSION['error']="Something Went Wrong Please Login First"; 
    header("location:login.php");    
}
$id=$_SESSION['id'];
?>
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
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style/mobcss.css">
    <link rel="stylesheet" href="style/style.css">

    <title>Booking History</title>
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
<?php include "navbar.php" ?>
<!-- php navbar end -->

<div class="row mt-4">
<div class="col-lg-1 col-md-1 col-sm-1">
</div>
<div class="col-lg-10 col-md-10 col-sm-10 mt-2" id="user-heading";>

<?php
include("dbcon.php");
$id=$_SESSION['id'];
$sql="select * from registration where id=$id";
$x=mysqli_query($con,$sql);
$r=mysqli_fetch_assoc($x);

?> 
<h1>Welcome : <?php echo ($_SESSION['name']) ?></h1>
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="profile.php">My Profile</a>
  </li>
 <?php
$sq="select * from connection where regid=$id and status='approved'";
$x=mysqli_query($con,$sq);
if(mysqli_num_rows($x)>0) {
?>
<li class="nav-item">
    <a class="nav-link" href="gas_booking.php">Gas Booking</a>
  </li>
  <?php }else{  ?>
  <li class="nav-item">
    <a class="nav-link" href="new_connection.php">New Connection</a>
  </li>
  <?php }  ?>
  <li class="nav-item">
    <a class="nav-link active" href="bookinghistory.php">Booking History</a>
  </li>
</ul>

</div>
<div class="col-lg-1 col-md-1 col-sm-1">
<a href="logout.php" class="btn btn-outline-warning float-right mr-4 my-3">logout</a></div>
</div>
</div>

<div class="row">
<div class="col-lg-1 col-md-1 col-sm-12 "></div>
<div class="col-lg-10 col-md-10 col-sm-12 p-4" id="row-row-cust">
<table class="table table-bordered">
<tr><th>Serial</th><th>Booking ID</th><th>Booking Date</th><th>Status</th><th>Delivery Date</th><th>Amount</th><th>Payment</th></tr>
<?php 
                                
                                    $query = "SELECT * FROM booking WHERE regid='$id'";
                                    $query_run = mysqli_query($con, $query, );
                                    $i=1;

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                           
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['bookingdate']; ?></td>
                                                <td><?= $row['status']; ?></td>
                                                <td><?= $row['deliverdate']; ?></td>
                                                <td><?= $row['amount']; ?></td>
                                                <td><?= $row['paystatus']; ?></td>
                                            </tr>
                                            
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                
                            ?>
</table>

</div>
<div class="col-lg-1 col-md-1 col-sm-12 "></div>
</div>

</div>

<div class="special"></div>      
<?php include "footer.php"?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="files/boot.js"></script> 
    <script src="files/boot1.js"></script>
    <script src="files/boot2.js"></script>
     </body>
</html>
