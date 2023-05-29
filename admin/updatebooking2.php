<?php
session_start();
include("../dbcon.php");

{
  
$date=date('d-M-Y');
$existingstock="select * from `stock` where id=(select max(id) from stock)";
$x=mysqli_query($con,$existingstock);
$r=mysqli_fetch_assoc($x);
$stock=$r['stock']-1;


$sql="INSERT INTO `stock`(`date`, `stock`)
 VALUES ('$date','$stock')";

 if(mysqli_query($con,$sql))
 {
  $_SESSION['success']="Successfully Updated"; 
  echo("<script>location.href = 'booking.php';</script>");
  
 }
 else
 {
  $_SESSION['error']="Something went Wrong.."; 
  header("location:booking.php"); 
 }
}
?>