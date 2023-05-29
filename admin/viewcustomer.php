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

    <title>View Customer</title>
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
<div class="row my-2">
<div class="col-lg-11 col-md-11 col-sm-11"><h1>View Customer</h1></div>
<div class="col-lg-1 col-md-1 col-sm-1"><a href="customer.php" class="btn btn-dark">BACK</a></div>
</div>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12"></div>
<div class="col-lg-4 col-md-4 col-sm-12">
<?php

include "../dbcon.php";
$id=$_GET['id'];

$sql1="select * from registration where id=$id";
$x=mysqli_query($con,$sql1);
if($r=mysqli_fetch_assoc($x))
{
?>
<table class="table table-bordered">
<tr><td colspan="2" class="text-center">
<img src="../upload/<?php echo $r['photo']?>" class="img-thumbnail" 
style="height:300px;width:250px" alt=""></td></tr>
<tr><th>Name</th><td><?= $r['name']?></td></tr>
<tr><th>Username</th><td><?= $r['username']?></td></tr>
<tr><th>Mobile</th><td><?= $r['mob']?></td></tr>
<tr><th>Consumer No.</th><td><?= $r['consumer']?></td></tr>
<tr><th>Registration ID</th><td><?= $r['id']?></td></tr>
<tr><th>Registration Date</th><td><?= $r['date']?></td></tr>
<tr><th>Address</th><td><?= $r['adress']?></td></tr>
</table>
<?php
}
?>

 <div class="text-center">
    <a href="editcustomer.php?id=<?php echo $r['id']?>" class="btn btn-reset">Edit Customer</a>
  </div>
  <br>

<!-- Write a message to customer -->
<?php

include "../dbcon.php";
$id=$_GET['id'];
$sql="select * from registration where id=$id";
$x=mysqli_query($con,$sql);
if($r=mysqli_fetch_assoc($x))
{
?>
<form action="writemessage.php" method="post" class="border border-primary p-4 mb-4 shadow">
  <div class="text-center">
  <div class="form-group"><label for="message"><h3>Admin Message</h3></label><input type="text" name="message" id="message" value="Write a message for customer"
   class="form-control"></div>
  <div class="form-group text-center"><button type="submit" class="btn btn-reset" value="<?php echo $id ?>"name="submit">Send Message</button></div>
</div>
</form>

<?php
}
?>

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

