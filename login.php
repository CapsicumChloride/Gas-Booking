<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="files/boot.css">
      <!-- Font Awesome CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="style/mobcss.css">
    <link rel="stylesheet" href="style/style.css">


    <title>Login</title>
    <link rel="icon" type="image" href="image/drona.jpg">

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
<!-- php navbar  -->
<?php include 'navbarindex.php';?>
<!--php navbar ends -->

<!-- PhP Side Social Icons -->
<?php include 'sidebar.php';?>
<!-- PhP Side Social Icons End -->

<div class="container-fluid">



<div class="reg-cust">

  <h1 class="text-center">Login Form</h1>


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
      <img src="image/GAS1.jpg" alt="" class="img-box-left">
    </div>

    <div class="box-cust-cust-right">

    <form action="login2.php" class="p-2 border border-danger shadow" method="post" >
    <table class="table table-borderless">
      <tr><th>Username</th><td><input type="text" name="username" id="username" required placeholder="Enter Username" class="form-control" 
      value="<?php  if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>"></td></tr>

        <tr>
          <th>Password</th>
          <td>
            <input type="password" name="password" id="password" 
              placeholder="Contact admin for default password" class="form-control" 
              value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>">
                 
          </td>
        </tr>
        
        
        <tr>
          
          <td class="text-right"><input type="checkbox" name='remember'></td><td>Remember Me</td>
          
        </tr>
      
        
        <tr><td colspan="2" class="text-center">
          <a href="index.php"><button type="submit" name="submit" class="btn btn-cust">BACK</button></a>
          <button type="submit" name="submit" class="btn btn-submit-cust">LOGIN</button>
        </td></tr>
        
        </table>
        </form>
      
    </div>
</div>
<div class="special"></div>
<div class="specialtwo"></div>       
<!-- php footer -->
<div>
  <?php include 'footer.php';?>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="files/boot.js"></script> 
    <script src="files/boot1.js"></script>
    <script src="files/boot2.js"></script>
     </body>
</html>