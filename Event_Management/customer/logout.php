<?php 
    // include('constants.php');
    // session_destroy();
    // header('http://localhost/Event_Management002/index.php');

    
    
     //to ensure you are using same session
    session_destroy(); //destroy the session
    header("location: ../home.php"); //to redirect back to "index.php" after logging out
    
   




?>