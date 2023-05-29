<?php
include("../dbcon.php");
session_start();

if(isset($_POST['submit']))
{
    extract($_POST);

$sql="UPDATE `registration` SET `name`='$name',`username`='$username',`mob`='$mob',`consumer`='$consumer',`adress`='$address' WHERE id=$submit";
    if(mysqli_query($con,$sql))
    {
        $_SESSION['success']="Customer Data Updated Successfully"; 
        header("location:customer.php");  
    }
    else
    {
        $_SESSION['error']="Problem in Updation"; 
        header("location:customer.php");  
    }
}
?>
