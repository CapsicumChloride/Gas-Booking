<?php
include("dbcon.php");
session_start();
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="select * from registration where username='$username'";
    $x=mysqli_query($con,$sql);
    if($r=mysqli_fetch_assoc($x))
    {
     $dbpswd=$r['password'];
     $name=$r['name'];
     $id=$r['id'];
     
     if(password_verify($password,$dbpswd))
     {
         if(isset($_POST['remember']))
         {
            setcookie('username',$username,time()+60*60*24);
            setcookie('password',$password,time()+60*60*24);
            $_SESSION['name']=$name;
            $_SESSION['id']=$id;
            header("location:profile.php");
         }
         else
         {
            $_SESSION['name']=$name;
            $_SESSION['id']=$id;
            header("location:profile.php");
         }
          }
     else
     {
        $_SESSION['error']="Something Went Wrong Password Invalid"; 
        header("location:login.php"); 
     }
}
    else
    {
        $_SESSION['error']="Something Went Wrong Username Invalid"; 
        header("location:login.php"); 
    }
    }
?>



