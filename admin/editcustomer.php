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

    <title>Edit Customer</title>
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
  <?php include "adminnav.php"?>
  <?php include "protect.php"?>
  <div class="heading-ad">
        <h2 class="text-center"> Edit Customer </h2>
</div>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12"></div>

<div class="col-lg-4 col-md-4 col-sm-12">
  
<?php

include "../dbcon.php";
$id=$_GET['id'];
$sql="select * from registration where id=$id";
$x=mysqli_query($con,$sql);
if($r=mysqli_fetch_assoc($x))
{
?>
<form action="updatecustomer.php" method="post" class="border border-primary p-4 mb-4 shadow">
<div class="form-group"><label for="name">Name</label><input type="text" name="name" id="name" value='<?php echo $r['name']?>' class="form-control"></div>
<div class="form-group"><label for="username">Username</label><input type="text" name="username" id="username" value='<?php echo $r['username']?>' class="form-control"></div>
<div class="form-group"><label for="mob">Mobile</label><input type="text" name="mob" id="mob" value='<?php echo $r['mob']?>' class="form-control"></div>
<div class="form-group"><label for="consumer">Consumer ID</label><input type="text" name="consumer" id="consumer" value='<?php echo $r['consumer']?>' class="form-control"></div>
<div class="form-group"><label for="address">Address</label><textarea  name="address" id="address" class="form-control"><?php echo $r['adress']?></textarea></div>
<div class="form-group text-center"><button type="submit" class="btn btn-primary" value="<?php echo $id ?>"name="submit">Submit changes</button></div>
</form>

<?php
}
?>


<!-- Reset Password to default by Admin -->
<?php

include "../dbcon.php";
$id=$_GET['id'];
$sql="select * from registration where id=$id";
$x=mysqli_query($con,$sql);
if($r=mysqli_fetch_assoc($x))
{
?>
<form action="resetpassword.php" method="post" class="border border-primary p-4 mb-4 shadow">
  <div class="text-center">
  <div class="form-group"><label for="password">Default Password</label><input type="text" name="reset" id="password" value='<?php echo $r['username']?>' class="form-control"></div>
  <div class="form-group text-center"><button type="submit" class="btn btn-reset" value="<?php echo $id ?>"name="submit">Reset Password</button></div>
</div>
</form>

<?php
}
?>
<!-- Reset Password -->

<!-- Personal Transferred Out by Admin -->
<?php

include "../dbcon.php";
$id=$_GET['id'];
$sql="select * from registration where id=$id";
$x=mysqli_query($con,$sql);
if($r=mysqli_fetch_assoc($x))
{
?>
<form action="transfer.php" method="post" class="border border-primary p-4 mb-4 shadow">
  <div class="text-center">
  <div class="form-group"><input type="text" name="transfer" id="transfer" value='Transfer <?php echo $r['name']?>? He will not be able to book gas anymore.' class="form-control" readonly></div>
  <div class="form-group text-center"><button type="submit" class="btn btn-transfer" value="<?php echo $id ?>"name="submit">Mark Transferred</button></div>
</div>
</form>

<?php
}
?>
<!-- Transfer -->


  <div class="text-center">
    <a href="customer.php" class="btn btn-dark">Back</a>
  </div>

</div>

<div class="col-lg-4 col-md-4 col-sm-12"></div>

</div>

<?php include "../footer.php"?>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>
     </body>
</html>

