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

    <title>Ad Customer</title>
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
<div class="container-ad"><?php include "adminnav.php"?><?php include "protect.php"?></div>  
<div class="container-fluid">
<div class="row my-2">
<div class="col-lg-11 col-md-11 col-sm-11"><?php
      
        if(isset($_SESSION['success']))
        {
          ?><div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success Message</strong><?php echo $_SESSION['success'] ?><button type="button" class="close" data-dismiss="alert" ><span>&times;</span></button>
        </div><?php
          unset($_SESSION['success']);
        }
        ?><?php
        if(isset($_SESSION['error']))
        {?><div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error Message</strong><?php echo $_SESSION['error']?><button type="button" class="close" data-dismiss="alert" ><span>&times;</span></button>
</div><?php
  unset($_SESSION['error']);
}
?></div>

</div>
<div class="heading-ad">
        <h2 class="text-center"> Ad Customer </h2>
</div>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-12"></div>

<div class="col-lg-4 col-md-4 col-sm-12">
  <form action="" class="p-2 border border-danger shadow" method="post" enctype="multipart/form-data"  >
    <table class="table table-borderless">
      <tr><th>Name</th><td><input type="text" name="name" id="name" placeholder="Enter Name" class="form-control"></td></tr>
      <tr><th>Username</th><td><input type="text" name="username" id="username" placeholder="Enter Username" class="form-control"></td></tr>
      <tr><th>Mobile</th><td><input type="number" name="mob" id="mob" placeholder="Enter Mobile No" class="form-control"></td></tr>
      <tr><th>Consumer ID</th><td><input name="consumer" id="consumer" type="number" placeholder="Enter Consumer No." class="form-control"></textarea></td></tr>
      <tr><th>Address</th><td><textarea name="address" id="address" placeholder="Enter Addresss" class="form-control"></textarea></td></tr>
      <tr><th>Password</th><td><input type="text" name="password" id="password" placeholder="Default should be username" class="form-control"></td></tr>
      

      <tr><td colspan="2" class="text-center"><button type="submit" name="submit" class="btn btn-success btn-sm">SUBMIT</button></td></tr>
  </table>
</form>
<br>
<div class="text-center"><a href="customer.php" class="btn btn-dark">BACK</a></div>
</div>
<div class="col-lg-4 col-md-4 col-sm-12"></div>
</div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>
     </body>
</html>
<?php
include("../dbcon.php");
if(isset($_POST['submit']))
{
  extract($_POST);
  $query="select * from registration where username='$username'";
  $x=mysqli_query($con,$query);  
  if(mysqli_num_rows($x)>0)  
  {
   $_SESSION['error']=" Consumer Already Exists."; 
   echo "<script type='text/javascript'>
   
   alert('Something Went Wrong');
   window.open('addcustomer.php', '_self')
   
   </script>";
   
  }
  else
  {

  $pswd=password_hash($password,PASSWORD_BCRYPT);
  $idad="select * from `registration` where id=(select max(id) from registration)";
  $x=mysqli_query($con,$idad);
  $r=mysqli_fetch_assoc($x);
  $s=$r['id'];
  $regid=$s+1;
  
  echo $registrationdate=date('Y-m-d');
  $sql1="INSERT INTO `registration`(`name`,`username`,`mob`, `consumer`, `adress`, `photo`, `password`, `status`, `date`)
  VALUES ('$name','$username','$mob','$consumer','$address','user.jpg','$pswd', '1', '$registrationdate')";

  $sql2="INSERT INTO `connection`(`regid`, `name`, `username`, `consumer`, `adress`, `mob`, `proof`, `status`, `date`) 
  VALUES ('$regid','$name','$username','$consumer','$address','$mob','addedbyadmin.jpg', 'approved', '$registrationdate')";

$query1=mysqli_multi_query($con,$sql1);
$query2=mysqli_multi_query($con,$sql2);
  
  if($query1)
  {
     $_SESSION['success']=" Customer Added Successfully"; 
     echo "<script type='text/javascript'>
     
     alert('Success');
     window.open('addcustomer.php', '_self')
     
     </script>";
  }
  else
  {
    $_SESSION['error']=" Consumer Already Exists."; 
    echo "<script type='text/javascript'>
    
    alert('Something Went Wrong');
    window.open('addcustomer.php', '_self')
    
    </script>";
 }
}
}
?>