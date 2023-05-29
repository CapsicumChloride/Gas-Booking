<?php
include("../dbcon.php");
session_start();

if(isset($_POST['submit']))
{
    extract($_POST);

 

$sql="UPDATE `registration` SET `message`='$message'  WHERE id=$submit";
    if(mysqli_query($con,$sql))
    {
        $_SESSION['success']="Message Sent."; 
        header("location:customer.php");  
    }
    else
    {
        $_SESSION['error']="Problem in Updation"; 
        header("location:customer.php");  
    }
}
?>
