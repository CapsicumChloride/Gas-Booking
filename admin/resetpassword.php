<?php
include("../dbcon.php");
session_start();

if(isset($_POST['submit']))
{
    extract($_POST);

$pswd=password_hash($reset,PASSWORD_BCRYPT);    

$sql="UPDATE `registration` SET `password`='$pswd'  WHERE id=$submit";
    if(mysqli_query($con,$sql))
    {
        $_SESSION['success']="Password Reset to Default Successfully"; 
        header("location:customer.php");  
    }
    else
    {
        $_SESSION['error']="Problem in Updation"; 
        header("location:customer.php");  
    }
}
?>
