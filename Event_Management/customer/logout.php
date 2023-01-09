<?php 
    include('../constants.php');
    session_destroy();
    header('location:'.SITEURL.'index.php');


?>