<?php

include("dbcon.php");
session_start();
if(isset($_POST['submit']))
{
  extract($_POST);
  $query="select * from registration where username='$username'";

  $x=mysqli_query($con,$query);  // used to execute query
  if(mysqli_num_rows($x)>0)  // used to count rows
  {
   $_SESSION['error']="Something Went Wrong : Username Already Exists."; 
   header("location:registration.php");  
  }
  else
  {
   echo $registrationdate=date('Y-m-d'); 
  $photo_tmp_name=$_FILES['photo']['tmp_name'];
  $photo_name=$_FILES['photo']['name'];
  $pswd=password_hash($password,PASSWORD_BCRYPT);
  move_uploaded_file($photo_tmp_name,"upload/".$photo_name);
  $sql="INSERT INTO `registration`(`name`, `username`, `mob`, `consumer`, `adress`, `photo`, `password`, `status`, `date`) 
  VALUES ('$name','$username','$mob','$consumer','$address','$photo_name','$pswd','1','$registrationdate')";
   if(mysqli_query($con,$sql))
  {
     $_SESSION['success']="Registration Successfully.. Welcome $name let's Begin After Login"; 
     header("location:login.php"); 
  }
  else
  {
    $_SESSION['error']="Something Went Wrong"; 
    header("location:registration.php");  
 }
}
}
?>