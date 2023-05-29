<?php
session_start();
include("../dbcon.php");
$id=$_GET['id'];
$date=date('Y-m-d');
$sql="update booking set paystatus='paid', paydate='$date' where id=$id";
        
if(mysqli_query($con,$sql))
{
$_SESSION['success']="Payment Status Updated Successfully";
header("location:booking.php");
}

?>



