<?php
    

        if( !isset($_SESSION['user'])  ) {
            $_SESSION['no-login-message'] = "Please SignIn to access";
            header('location:'.SITEURL.'index.php');
        }
    
   
?>