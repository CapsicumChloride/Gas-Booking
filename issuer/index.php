<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../files/boot.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
    <link rel="stylesheet" href="../style/mobcss.css">
    <link rel="stylesheet" href="../style/style.css">


    <title>Kapsona Gas - Issuer Login</title>
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
  <!-- php navbar  -->
  <?php include 'navbarindex.php';?>

  <!--php navbar ends -->
  </div>

<div class="reg-cust">

  <h1 class="text-center">Issuer Login</h1>



<?php
session_start();

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
</div>

<div class="flex-cust">
  <div class="flex-container-cust">

    <div class="box-cust-cust-left">
      <img src="../image/GAS1.jpg" alt="" class="img-box-left">
    </div>

    <div class="box-cust-cust-right">

    <form action="login.php" class="p-2 border border-danger shadow" method="post" >
    <table class="table table-borderless">
    <tr><th>Login ID</th><td>
      <input type="text" name="email" id="email" placeholder="Enter Issuer ID" class="form-control"
      value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>"></td></tr>
      <tr><th>Password</th>
      <td>
      <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control"
      value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>"></td></tr>

      
      <tr><td class="text-right"><input type="checkbox" name='remember'></td><td>Remember Me</td></tr>
      <tr><td colspan="2" class="text-center"><button type="submit" name="submit" class="btn btn-success btn-sm">LOGIN</button></td></tr>
      </table>
      </form>
</div>
</div>
<div class="special"></div>  
<div class="specialtwo"></div>         
<!-- php footer -->
<div>
  <?php include '../footer.php';?>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../files/boot.js"></script> 
    <script src="../files/boot1.js"></script>
    <script src="../files/boot2.js"></script>
     </body>
</html>