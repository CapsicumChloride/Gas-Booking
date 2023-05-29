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

    <title>Transferred Personnel</title>
    <link rel="icon" type="image" href="../image/drona.jpg">
</head>
<body>

<div class="container-ad">
    <?php include "adminnav.php"?>
    <br>
    

    <div class="flex-box-admin";>
      
      <div class="flex-admin">
                  
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
            

            <span class="h2"> Transferred Out Personnel</span> 

                  <div class="">
                    <div>
                    <?php
                    $date=date('d-M-Y');
                    
                    ?>
                    </div>
                  </div>
            
                  <table class="table table-bordered">

                  <tr><th>Customer Id</th><th>Name</th><th>Username</th><th>Consumer No.</th><th>Address</th><th>Mobile</th><th>Transferred Date</th></tr>

                  <?php
                  include("../dbcon.php");

                  $sql="select * from registration where status='0'";
                  $x=mysqli_query($con,$sql);
                  while($r=mysqli_fetch_assoc($x))
                  {
                  ?>
                  <tr><td><?=$r['id']?></td><td><?=$r['name']?></td><td><?=$r['username']?></td><td><?=$r['consumer']?></td><td><?=$r['adress']?></td><td><?=$r['mob']?></td><td><?=$date?></td>
                  

                  </tr>
                  <?php
                  }
                  ?>
                  </table>
                  <div style="width:100%; float:right;">
                    <div class="col-lg-1 col-md-1 col-sm-1" style="float:right";><a href="reports.php" class="btn btn-dark">BACK</a></div>
                  </div>
            
            
        </div>
    

</div>





<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>


</body>

