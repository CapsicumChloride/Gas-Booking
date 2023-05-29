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

    <title>Feedback Messages</title>
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
  <?php include "adminnav.php"?>;
  <?php include "protect.php"?>

  <div class="heading-ad">
        <h1 class="text-center"> Welcome Admin! </h1>
        
    </div>

    <div class="flex-box-admin";>
        <!-- Only for Wide Screens -->
        <div class="admin-leftpane"> 
                
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
                    <a class="nav-link" href="reports.php">Reports</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" href="message.php">Feedback Messages</a>
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
                  <button class="admin-but">View<br>Reports</button>
                  </a> 
                  <a href="message.php">
                    <button class="admin-but superactive">Feedback <br> Messages</button>
                  </a>
                </div>
              <!-- Only for Small Screens End-->    
        </div>
        
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

<span class="h2">New Feedback Messages</span>

<!-- New Messages -->

      <table class="table table-bordered mt-3">
      <tr><th>Customer Name</th><th>Mobile</th><th>Subject</th><th>Message</th><th>Action</th></tr>

      <?php
      include "../dbcon.php";

      $sql="select * from contact where status='0'";
      $x=mysqli_query($con,$sql);
      while($r=mysqli_fetch_assoc($x))
      {
      ?>
      <tr><td><?=$r['name']?></td><td><?=$r['mob']?></td><td><?=$r['sub']?></td>
      <td><?=$r['msg']?></td>
      <td>
      <form action="reply.php" method="post">
      <textarea name="reply" id=""  class="form-control"></textarea>
      <button class="btn btn-primary" name="submit" value="<?=$r['id']?>">SUBMIT</button>
      </form>
      </td>

      </tr>

      <?php
      }
      ?>
      </table>

<!-- All Messages -->      

<span class="h2">All Feedback Messages</span>

<table class="table table-bordered mt-3">
      <tr><th>Customer Name</th><th>Mobile</th><th>Subject</th><th>Message</th><th>Action Taken</th></tr>

      <?php
      include "../dbcon.php";

      $sql="select * from contact where status='1'";
      $x=mysqli_query($con,$sql);
      while($r=mysqli_fetch_assoc($x))
      {
      ?>
      <tr><td><?=$r['name']?></td><td><?=$r['mob']?></td><td><?=$r['sub']?></td><td><?=$r['msg']?></td><td><?=$r['reply']?></td></tr>

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
</html>

