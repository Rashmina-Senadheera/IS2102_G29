<?php 
    //start session
    session_start();

    define('SITEURL','http://localhost/e/IS2102_G29/Event_Management/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','eventra');
    
    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($conn));
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));
?>