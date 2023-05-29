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

    <title>Admin Dashboard</title>
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

<div class="container-ad">
    <?php include "adminnav.php"?>;
    <?php include "protect.php"?>

    <div class="heading-ad">
        <h1 class="text-center"> Welcome Admin </h1>
    </div>

    <div class="flex-box-admin";>
        <!-- Only for Wide Screens -->
        <div class="admin-leftpane"> 
                
                <ul class="nav flex-column nav-pills">
                    <li class="nav-item">
                    <a class="nav-link active" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="lpg.php">New Connection Applications</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="customer.php">Customers</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="booking.php">Gas Bookings</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="reports.php">Reports</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="message.php">Feedback Messages</a>
                    </li>
                </ul>
                
            
        </div>
      <!-- Only for Wide Screens End -->
      <!-- Only for Small Screens -->
      <div class="admin-topnav" style="display:none";>
          <a href="dashboard.php">
            <button class="admin-but superactive">Admin <br>Dashboard</button>
          </a>
          <a href="lpg.php">
            <button class="admin-but">Connection <br> Applications</button>
          </a>
          <a href="customer.php">
            <button class="admin-but">View<br>Customers</button>
          </a>
          <a href="booking.php">
            <button class="admin-but">Gas <br>Bookings</button>
          </a>
          <a href="reports.php">
            <button class="admin-but">View<br>Reports</button>
          </a>          
          <a href="message.php">
            <button class="admin-but">Feedback <br> Messages</button>
          </a>
      </div>
      <!-- Only for Small Screens End-->
        <div class="flex-admin">
            <div class="flex-item-admin">
                <div class="card">
                <div class="card-body">
                <h5 class="card-title">Gas Bookings</h5>
                <h6 class="card-subtitle mb-2 text-muted">Total No. of Booking</h6>
                <p class="card-text">
                <?php
                    $date=date('d-M-Y');
                    include("../dbcon.php");
                    $sql="select * from booking where status='not delivered'";
                    $x=mysqli_query($con,$sql);
                    $num=mysqli_num_rows($x);
                    echo "<h1 class='display-4'>".$num."</h1>";
                    ?>
                </p>
                <a href="booking.php" class="card-link">Total Bookings</a>
                </div>
                </div>
            </div>
            <div class="flex-item-admin">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Stock</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Total No. Cylinders Held</h6>
                    <p class="card-text">
                    <?php
                    include("../dbcon.php");
                    
                    $sql="select * from `stock` where id=(select max(id) from stock)";
                    $x=mysqli_query($con,$sql);
                    $r=mysqli_fetch_assoc($x);
                    echo "<h1 class='display-4'>".$r['stock']."</h1>";
                    ?>
                    </p>
                    <!-- Button which triggers add update stock pop-up --> 
                    <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#updatestock">Update Stock</button>
                    </div>
                </div>
            </div>
            <div class="flex-item-admin">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Price</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Sale Price</h6>
                    <p class="card-text">
                    <?php
                    include("../dbcon.php");
                    $sql="select * from `lpg` where id=(select max(id) from lpg)";
                    $x=mysqli_query($con,$sql);
                    $r=mysqli_fetch_assoc($x);
                    $k=$r['price'];
                    $l=$r['subsidy'];
                    $m=$k+$l;
                    echo "<h1 class='display-4'>".$m."</h1>";
                    ?>
                    </p>
                    <!-- Button which triggers add stock and change price pop-up --> 
                    <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#updateprice">Change Price</button>
                    </div>
                </div>
            </div>
            <div class="flex-item-admin">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Customers</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Total No. of Customers</h6>
                    <p class="card-text">
                    <?php
                    include("../dbcon.php");
                    $sql="select * from registration where status='1'";
                    $x=mysqli_query($con,$sql);
                    $num=mysqli_num_rows($x);
                    echo "<h1 class='display-4'>".$num."</h1>";
                    ?>
                    </p>
                    <a href="customer.php" class="card-link">Go To Customers</a>
                    </div>
                </div>
            </div>

            <div class="flex-item-admin">
            <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Schedule</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Issue Schedule</h6>
                    <p class="card-text">
                    <?php
                    include("../dbcon.php");
                    $sql="select * from schedule WHERE id='1'";
                    $x=mysqli_query($con,$sql);
                    $r=mysqli_fetch_assoc($x);
                    $adminmsg=$r['message'];
                    echo "<marquee style='color:red;'>*** $adminmsg ***</marquee>";
                    
                    ?>
                    </p>
                    <!-- Button which triggers update marque pop-up --> 
                    <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#updatemarque">Update</button>
                    </div>
                </div>
            </div>

            <div class="flex-item-admin">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Business Day</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Current Date</h6>
                    <p class="card-text">
                    <?php
                    include("../dbcon.php");
                    $date=date('d-M-Y');
                    $day=date ('l');
                    ?>
                    </p>
                    <a href="booking.php" class="card-link"><?php echo $day?></a>
                    <br></br>
                    <a href="booking.php" class="card-link"><?php echo $date?></a>
                    </div>
                </div>
            </div>
            </div>
            
        </div>
    </div>

</div>


<!-- Modal update stock-->
<div class="modal fade" id="updateprice">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Update Price & Subsidy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
          <label for="">Purchase Cost</label>
          <input type="number" name="price" class="form-control">
          </div>
          <div class="form-group">
          <label for="">Handling Charges</label>
          <input type="number" name="subsidy" class="form-control">
          </div>
          <div class="form-group text-center">
          <button type="submit" class="btn btn-primary" name="submitprice">SUBMIT</button>
          </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- modal end -->

<!-- Modal update price-->
<div class="modal fade" id="updatestock">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Update Stock</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
      <div class="form-group">
      <label for="">Present Gas Stock</label>
      <input type="number" name="stock" class="form-control">
      </div>
      
      <div class="form-group text-center">
      <button type="submit" class="btn btn-primary" name="submitstock">SUBMIT</button>
      </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- modal end -->


<!-- Modal update marque-->
<div class="modal fade" id="updatemarque">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Update Scrolling Message on Main Page</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
          <label for="">Message</label>
          <input type="text" name="message" class="form-control">
          </div>
          <div class="form-group text-center">
          <button type="post" class="btn btn-primary" name="submitmarque">SUBMIT</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- modal end -->


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>


</body>

<?php
//Update Price

if(isset($_POST['submitprice']))
{
extract($_POST);
$date=date('d-M-Y');
$sql="INSERT INTO `lpg`(`date`, `price`, `subsidy`)
 VALUES ('$date','$price','$subsidy')";

 if(mysqli_query($con,$sql))
 {
  $_SESSION['success']="Price and Charges Successfully Updated."; 
  echo "<script type='text/javascript'>alert('Posted Successfully!')</script>";
 }
 else
 {
  $_SESSION['error']="Something went Wrong.."; 
  header("location:dashboard.php"); 
 }
}

//Add stock
if(isset($_POST['submitstock']))
{
  extract($_POST);
$date=date('d-M-Y');
$sql="INSERT INTO `stock`(`date`, `stock`)
 VALUES ('$date','$stock')";

 if(mysqli_query($con,$sql))
 {
  $_SESSION['success']="You Successfully Added Stock"; 
  echo "<script type='text/javascript'>alert('Posted Successfully!')</script>";
  
 }
 else
 {
  $_SESSION['error']="Something went Wrong.."; 
  header("location:dashboard.php"); 
 }
}


//Update Marque scrolling msg
if(isset($_POST['submitmarque']))
{
  extract($_POST);

$sql="UPDATE `schedule` SET `message`='$message'";

 if(mysqli_query($con,$sql))
 {
  $_SESSION['success']="You Successfully Updated Marque"; 
  echo("<script>location.href = 'dashboard.php';</script>");
  
 }
 else
 {
  $_SESSION['error']="Something went Wrong.."; 
  header("location:dashboard.php"); 
 }
}
?>

