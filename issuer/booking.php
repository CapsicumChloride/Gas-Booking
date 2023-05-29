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

    <title>Issuer - Gas Bookings</title>
    <link rel="icon" type="image" href="../image/drona.jpg">
</head>
<body>

<div class="container-ad">
<?php include 'adminnav.php';?>
<?php include 'protect.php';?>

    <div class="heading-ad text-center">
        <h1> Welcome Issuer </h1>
    </div>

        <div class="issuer">
                  
            <?php
            
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
            

                    <div class="left-date">
                      <div>
                      <?php
                      $date=date('d-M-Y');
                      echo "Delivery Date : ".$date;
                      ?>
                      </div>
                    </div>

                    <div class="right-stock">
                      <div>
                      <?php
                      include("../dbcon.php");
                      
                      $sql="select * from `stock` where id=(select max(id) from stock)";
                      $x=mysqli_query($con,$sql);
                      $r=mysqli_fetch_assoc($x);
                      echo "Stock : ".$r['stock']."";
                      ?>
                      </div>
                    </div>

                  <!-- Ships Galley Issue-->
                  <div class="galley-chamber">                    
                    <h3> ISSUE TO SECTION ONE</h3> 
                    <table class="table table-bordered">
                                                 
                      <form action="" method="post" class="border border-primary p-4 mb-4 shadow">
                      <div class="form-group chamber-item"><label for="issuedby">Issued By</label><input type="text" name="issuedby" id="issuedby" class="form-control"></div>
                      <div class="form-group chamber-item"><label for="receivedby">Received By</label><input type="text" name="receivedby" id="receivedby" class="form-control"></div>
                      <div class="form-group chamber-item"><label for="quantity">Qty Issued</label><input type="text" name="quantity" id="quantity" class="form-control"></div>
                      <br>
                      <div class="form-group text-center chamber-button"><button type="post" class="btn btn-primary" name="sectiononeissue">Issue Gas</button></div>
                      </form>
                    </table>
                  </div>
                  <!--End Ships Galley Issue-->

                  <!-- Ward Room Issue-->
                  <div class="wardroom-chamber">                    
                    <h3> ISSUE TO SECTION TWO</h3> 
                    <table class="table table-bordered">
                                    
                      <form action="" method="post" class="border border-primary p-4 mb-4 shadow">
                      <div class="form-group chamber-item"><label for="issuedby">Issued By</label><input type="text" name="issuedby" id="issuedby" class="form-control"></div>
                      <div class="form-group chamber-item"><label for="receivedby">Received By</label><input type="text" name="receivedby" id="receivedby" class="form-control"></div>
                      <div class="form-group chamber-item"><label for="quantity">Qty Issued</label><input type="text" name="quantity" id="quantity" class="form-control"></div>
                      <br>
                      <div class="form-group text-center chamber-button"><button type="submit" class="btn btn-primary" name="sectiontwoissue">Issue Gas</button></div>
                      </form>
                    </table>
                  </div>
                  <!--End Ward Room Issue-->

                  <!-- Individual Issue-->
                  <div class="booking-chamber">
                  <h3> INDIVIDUAL BOOKINGS</h3> 
                    
                    <table class="table table-bordered">
                    
                    <tr><th>Booking Id</th><th>Customer Id</th><th>Name</th><th>Delivery Address</th><th>Mobile</th><th>Booking Date</th><th>Delivery</th></tr>
                    <?php
                    include("../dbcon.php");

                    $sql="select * from booking where status='not delivered'";
                    $x=mysqli_query($con,$sql);
                    
                    while($r=mysqli_fetch_assoc($x))
                    {
                    ?>
                    <tr><td><?=$r['id']?></td><td><?=$r['regid']?></td><td><?=$r['name']?></td><td><?=$r['address']?></td><td><?=$r['mob']?></td><td><?=$r['bookingdate']?></td>
                    <td><a href="updatebooking.php?id=<?=$r['id']?>" class="btn btn-custom btn-sm">UPDATE</a></td>

                    </tr>
                    <?php
                    }
                    ?>
                    </table>

                  </div>  
                  <!--End Individual Issue-->

                  <!-- Payment Section-->
                  <div class="payment-chamber">
                  <h3> PAYMENT </h3> 
                    
                    <table class="table table-bordered">
                    
                    <tr><th>Booking Id</th><th>Customer Id</th><th>Name</th><th>Delivery Address</th><th>Mobile</th><th>Delivery Date</th><th>Payment</th></tr>
                    <?php
                    include("../dbcon.php");

                    $sql="select * from booking where paystatus='pending' AND status='delivered'";
                    $x=mysqli_query($con,$sql);
                    
                    while($r=mysqli_fetch_assoc($x))
                    {
                    ?>
                    <tr><td><?=$r['id']?></td><td><?=$r['regid']?></td><td><?=$r['name']?></td><td><?=$r['address']?></td><td><?=$r['mob']?></td><td><?=$r['deliverdate']?></td>
                    <td><a href="updatepayment.php?id=<?=$r['id']?>" class="btn btn-custom btn-sm">UPDATE</a></td>

                    </tr>
                    <?php
                    }
                    ?>
                    </table>

                  </div>  
                  <!--End Individual Issue-->
            
        </div>
    

</div>





<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>


</body>

<?php
//Post Galley Issue to Galley Issue Table

if(isset($_POST['sectiononeissue']))
{
  extract($_POST);

$existingstock="SELECT * from `stock` WHERE id=(select max(id) from stock)";
$x=mysqli_query($con,$existingstock);
$r=mysqli_fetch_assoc($x);
$stock=$r['stock']-$quantity;

$issuedate=date('Y-m-d');

$sql1="INSERT INTO `sectionone`(`issuedby`, `receivedby`, `issuedate`, `quantity`) 
VALUES ('$issuedby','$receivedby','$issuedate', '$quantity')";

$sql2="INSERT INTO `stock`(`date`, `stock`)
 VALUES ('$issuedate','$stock')";

$query1=mysqli_multi_query($con,$sql1);
$query2=mysqli_multi_query($con,$sql2);

if($query1)
 {
  $_SESSION['success']="Successfully Updated"; 
  echo("<script>location.href = 'booking.php';</script>");
  
 }
 else
 {
  $_SESSION['error']="Something went Wrong.."; 
  header("location:booking.php"); 
 }
}

//Post Ward Room Issue to Ward Room Issue Table

if(isset($_POST['sectiontwoissue']))
{
  extract($_POST);

$existingstock="SELECT * from `stock` WHERE id=(select max(id) from stock)";
$x=mysqli_query($con,$existingstock);
$r=mysqli_fetch_assoc($x);
$stock=$r['stock']-$quantity;

$issuedate=date('Y-m-d');

$sql1="INSERT INTO `sectiontwo`(`issuedby`, `receivedby`, `issuedate`, `quantity`) 
VALUES ('$issuedby','$receivedby','$issuedate', '$quantity')";

$sql2="INSERT INTO `stock`(`date`, `stock`)
 VALUES ('$issuedate','$stock')";

$query1=mysqli_multi_query($con,$sql1);
$query2=mysqli_multi_query($con,$sql2);

if($query1)
 {
  $_SESSION['success']="Successfully Updated"; 
  echo("<script>location.href = 'booking.php';</script>");
  
 }
 else
 {
  $_SESSION['error']="Something went Wrong.."; 
  header("location:booking.php"); 
 }
}

?>