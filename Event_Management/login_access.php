<?php
    

        if( !isset($_SESSION['user_name'])  ) {
            $_SESSION['no-login-message'] = "Please SignIn to access";
            header('location:'.SITEURL.'index.php');
        }
    
   
?>