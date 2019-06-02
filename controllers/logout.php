<?php
session_start();

//If the user is logged in 
if(isset($_SESSION['id']))
{
    //Unset session variables and destroy our session
    unset($_SESSION['id']);
    unset($_SESSION['fname']);
    unset($_SESSION['lname']);
    unset($_SESSION['email']);
    unset($_SESSION['username']);
    
    session_destroy();
    header("location: /");
}
else
{
    header("location: /views/login.php");
}
