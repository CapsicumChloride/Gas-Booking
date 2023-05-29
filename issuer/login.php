<?php
include("../dbcon.php");
session_start();
if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="select * from issuer where email='$email'";
    $x=mysqli_query($con,$sql);
    if($r=mysqli_fetch_assoc($x))
    {
        $dbpswd=$r['password'];
        $id=$r['id'];
        
    
        if($password==$dbpswd)
        {
            session_start();
            $_SESSION["logged_in"] = true; 
            
           
            if(isset($_POST['remember']))
            {
                setcookie('email',$email,time()+60*60*24);
                setcookie('password',$password,time()+60*60*24);
                $_SESSION['id']=$id;
                header("location:booking.php");
            }
            else
            {
            
                $_SESSION['id']=$id;
                header("location:booking.php");
            }
            }
        else
        {
            $_SESSION['error']="Something Went Wrong Password Invalid"; 
            header("location:index.php"); 
        }
    }
        else
        {
            $_SESSION['error']="Something Went Wrong  User Id is Invalid"; 
            header("location:index.php"); 
        }
    }
?>



