<?php 
    //inlcude constants
    include('../config/constants.php');
    //destroy the session and redirect to  login page
    session_destroy();//unsets $_SESSION['user']
    
    header('location:'.SITEURL.'admin/login.php');
?>