<?php
include("../dbcon.php");
session_start();

if(isset($_POST['submit']))
{
    extract($_POST);

$transfer='0'; 
  

$sql="UPDATE `registration` SET `status`='$transfer' WHERE id=$submit";
    if(mysqli_query($con,$sql))
    {
        $_SESSION['success']="Personnel Transferred Successfully"; 
        header("location:customer.php");  
    }
    else
    {
        $_SESSION['error']="Problem in Updation"; 
        header("location:customer.php");  
    }
}
?>
