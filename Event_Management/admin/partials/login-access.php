<?php 
    //check whether the user is logged in or not()
    if(!isset($_SESSION['user'])) //user in not logged in 
    {
        
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Panel</div>";
        //redirect to login page
        header('location:'.SITEURL.'admin/login.php');
    }

?>