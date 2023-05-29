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

    <title>Reports</title>
    <link rel="icon" type="image" href="../image/drona.jpg">
</head>
<body>
      <?php include "protect.php"?>;
        
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

<div class="container-ad">
    <?php include "adminnav.php"?>

    <div class="heading-ad text-center">
        <h1> Welcome Admin </h1>
    </div>

    <div class="flex-box-admin";>
        <div class="admin-leftpane"><!-- Only for Wide Screens -->
                
                <ul class="nav flex-column nav-pills">
                <li class="nav-item">
                <a class="nav-link " href="dashboard.php">Dashboard</a>
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
                <a class="nav-link active" href="reports.php">Reports</a>
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
            <button class="admin-but">Admin <br>Dashboard</button>
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
            <button class="admin-but superactive">View<br>Reports</button>
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
                <h5 class="card-title">Transferred Out Personnel</h5>
                <p class="card-text">
                <?php
                    $date=date('d-M-Y');
                    include("../dbcon.php");
                    $sql="select * from registration where status='0'";
                    $x=mysqli_query($con,$sql);
                    $num=mysqli_num_rows($x);
                    echo "<h1 class='display-4'>".$num."</h1>";
                    ?>
                </p>
                <a href="transferred.php"><button class=" btn btn-reset btn-fulllength";>View Details </button></a>
                </div>
                </div>
            </div>
            <div class="flex-item-admin">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Gas Return</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Format for Higher Agency</h6>
                    <p class="card-text">
                    <?php
                    $date=date('d-M-Y');
                    include("../dbcon.php");
                    echo $date;
                    ?>
                    </p>
                    <a href="gasreturn.php" target="_blank"><button class=" btn btn-primary btn-fulllength";>Monthly Gas Return </button></a>
                    </div>
                </div>
            </div>

            <div class="flex-item-admin">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Gas Bookings</h5>
                      <h6 class="card-subtitle mb-2 text-muted">By Individual</h6>
                      <p class="card-text">
                          <?php
                          $id = null;
                          if(isset($_GET['submit'])){
                            $id =  $_GET['id'];
                            echo $id;
                          }  
                          ?>
                        <form target="_blank" method="GET" action="reportindividual.php?id=<?php echo $id ?? "";?>">
                        <input type="text" name="id" value="" class="form-control" placeholder="Username">
                        <p></p>
                        <button type="submit" name="submit" class="btn btn-primary">Get Details</button>
                        </form>
                    
                      </p>
                    </div>
                </div>
            </div>

            <div class="flex-item-admin">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Pending Payments</h5>
                    <h6 class="card-subtitle mb-2 text-muted">As on Date</h6>
                    <p class="card-text">
                    <?php
                    $date=date('d-M-Y');
                    include("../dbcon.php");
                    $sql="select * from booking WHERE paystatus='pending' and status='delivered'";
                    $x=mysqli_query($con,$sql);
                    $num=mysqli_num_rows($x);
                    echo "<h1 class='display-4'>".$num."</h1>";
                    ?>
                    </p>
                    <a href="booking.php"><button class=" btn btn-primary btn-fulllength";>View Details</button></a>
                    </div>
                </div>
            </div>


            <div class="flex-item-admin">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Bulk Issues One</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Total This Month</h6>
                    <p class="card-text">
                    <?php
                    $date=date('Y-m-d');
                    $first=date('Y-m-01');
                    $sql_qry = "SELECT SUM(quantity) AS count FROM sectionone WHERE issuedate BETWEEN '$first' AND '$date' ";
                    $duration = $con->query($sql_qry);
                    $record = $duration->fetch_array();
                    $total = $record['count'];
                    
                    echo "<h1 class='display-4'>".$total."</h1>";
                    ?>
                    </p>
                    <a href="sectiononeissue.php" target="_blank"><button class=" btn btn-primary btn-fulllength";>View Details</button></a>
                    </div>
                </div>
            </div>

            <div class="flex-item-admin">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Bulk Issues Two</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Total This Month</h6>
                    <p class="card-text">
                    <?php
                    $date=date('Y-m-d');
                    $first=date('Y-m-01');
                    $sql_qry = "SELECT SUM(quantity) AS count FROM sectiontwo WHERE issuedate BETWEEN '$first' AND '$date' ";
                    $duration = $con->query($sql_qry);
                    $record = $duration->fetch_array();
                    $total = $record['count'];
                    
                    echo "<h1 class='display-4'>".$total."</h1>";
                    ?>
                    </p>
                    <a href="sectiontwoissue.php" target="_blank"><button class=" btn btn-primary btn-fulllength";>View Details</button></a>
                    </div>
                </div>
            </div>

            
            </div>
            
           
        </div>
   
</div>



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>


</body>
