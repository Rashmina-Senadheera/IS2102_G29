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

    define('STRIPE_API_KEY', 'sk_test_51N7vTMSGWwdlEMD2cqWisd3G2XwahZamsM6H9RGMA8Tmna054382Hr70Ny0hK1kImoWqx3LKyeTpki7l4ahBhVSp00rCZbg7xc'); 
    define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51N7vTMSGWwdlEMD2DfdL2mnkHPY8akHYJgw22ABkdPXSLHmT0Zffl7R2UkmHSHsHe7I73JhfZmEvCupXl7udrG9K005IulF7mY'); 
    define('STRIPE_SUCCESS_URL', 'http://localhost/e/IS2102_G29/Event_Management/pages/payment/payment-success.php'); //Payment success URL 
    define('STRIPE_CANCEL_URL', 'http://localhost/stripe/stripe/payment-cancel.php'); //Payment cancel URL
?>