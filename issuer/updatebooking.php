<?php
session_start();
include("../dbcon.php");
$id=$_GET['id'];
$date=date('Y-m-d');
$sql="update booking set status='delivered', deliverdate='$date', paystatus='pending' where id=$id";
        
if(mysqli_query($con,$sql))
{
$_SESSION['success']="Delivered Status Updated Successfully";
header("location:updatebooking2.php");
}

?>



