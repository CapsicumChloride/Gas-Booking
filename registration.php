<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="files/boot.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
      <!-- Font Awesome CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="style/mobcss.css">
    <link rel="stylesheet" href="style/style.css">

    <title>LPG GAS</title>
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
  <h1 class="text-center">Consumer Registration Form</h1>
</div>

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

<div class="flex-cust">
  <div class="flex-container-cust">

    <div class="box-cust-left">
      <img src="image/GAS1.jpg" alt="" class="img-box-left">
    </div>

    <div class="box-cust-right">

      <form action="registration2.php" class="p-2 border border-danger shadow" method="post" enctype="multipart/form-data"  >
      <table class="table table-borderless">

      <tr><th>Name</th><td><input type="text" name="name" id="name" placeholder="Enter Name" required pattern="[a-zA-Z\s]+" title="Only Characters Allowed in Name" class="form-control"></td></tr>
      <tr><th>Username</th><td><input type="text" name="username" id="username" placeholder="Enter Username" required pattern="[a-zA-Z\s]+" title="Only Characters Allowed in username" class="form-control"></td></tr>
      <tr><th>Mobile</th><td><input type="text" name="mob" id="mob" placeholder="Enter Mob" class="form-control"pattern="[6789][0-9]{9}" title="Enter Only 10 digit Number & Must Start with 6|7|8|9" required></td></tr>
      <tr><th>Consumer ID</th><td><input type="text" name="consumer" id="consumer" placeholder="Enter Consumer ID" class="form-control" title="As per your LPG Gas Card " required></td></tr>
      <tr><th>Address</th><td><textarea name="address" id="address" required placeholder="Enter Addresss including Qtr No." class="form-control"></textarea></td></tr>
      <tr><th>Photo</th><td><input type="file" name="photo" id="photo" class="form-control" required></td></tr>


      <tr><th>Password</th><td><input type="password" name="password" id="password" onkeyup='check();' placeholder="Enter Password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
      title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"required class="form-control"/></td></tr>

      <tr><th>Repeat Password</th><td><input type="password" name="repeatpassword" id="repeatpassword" onkeyup='check();' placeholder="Re-Enter Password"
      title="Password Must Match"required class="form-control"/></td></tr> 

      <tr><th></th><td><b><span id='message'></span></b></td></tr> 
      
           <script>
                 var check = function() {
                  if (document.getElementById('password').value ==
                    document.getElementById('repeatpassword').value) {
                    document.getElementById('message').style.color = 'green';

                    document.getElementById('message').innerHTML = 'Matching';
                  } else {
                    document.getElementById('message').style.color = 'red';
                    document.getElementById('message').innerHTML = 'Not Matching';
                  }
                }
            </script>

      <tr><th>Please Confirm</th><td><input type="checkbox" name="chkl[ ]" value="Confirm" required>My Registered Agency is Kapsona Gas Agency</td></tr>  
      
      <tr><td colspan="2" class="text-center">
      <br>
        <a href="index.php"><button class="btn btn-cust">BACK</button></a>
        <button type="submit" name="submit" class="btn btn-submit-cust">SUBMIT</button>
      </td></tr>
      </table>
      </form>
    </div>
</div>

</div>

<div class="special" style="display:block";></div> 
<div class="specialtwo"></div> 
<!-- php footer -->

<?php include 'footer.php';?>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="files/boot.js"></script> 
    <script src="files/boot1.js"></script>
    <script src="files/boot2.js"></script>

</body>
</html>