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

    <title>New Conenctions</title>
    <link rel="icon" type="image" href="../image/drona.jpg">
</head>
<body>

<div class="container-ad">
    <?php include "adminnav.php"?>;
    <?php include "protect.php"?>

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
                <a class="nav-link active" href="lpg.php">New Connection Applications</a>
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
            <button class="admin-but">Admin <br>Dashboard</button>
          </a>
          <a href="lpg.php">
            <button class="admin-but superactive">Connection <br> Applications</button>
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


            <span class="h2">New Gas Connection Applications</span>

            <table class="table table-bordered mt-3">
              <tr><th>Application Id</th><th>Name</th><th>Consumer ID</th><th>Address</th><th>Mobile</th><th>Type</th><th>Action</th></tr>
                    <?php
                    include("../dbcon.php");
                    $sql="select * from connection where status='not approved'";
                    $x=mysqli_query($con,$sql);
                    while($r=mysqli_fetch_assoc($x))
                    {
                    ?>
                <tr><td><?= $r['id']?></td><td><?= $r['name']?></td><td><?= $r['consumer']?></td><td><?= $r['adress']?></td><td><?= $r['mob']?></td>

               <td><a href="connectionview.php?id=<?= $r['id']?>" class="btn btn-info btn-sm">View</a></td>
              <td><a href="connectionstatus.php?id=<?= $r['id']?>&status=approved" class="btn btn-success btn-sm">
               Approve</a></td>
              <td><a href="connectionstatus.php?id=<?= $r['id']?>&status=rejected" class="btn btn-danger btn-sm">
              Reject</a></td>
              </tr>
              <?php
              }
             ?>
            </table>
            
        </div>
    

</div>




<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>


</body>

