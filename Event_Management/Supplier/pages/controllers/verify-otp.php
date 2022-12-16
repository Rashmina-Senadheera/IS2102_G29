<?php
session_start();

// Check the method of the request
// If request methot is not POST redirect to the register page
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../sign_in.php");
} else {
    // include the database config file
    include_once '../../constants.php';
    include_once './commonFunctions.php';

    // get entered otp
    $otp = checkInput($_POST['otp']);

    // get otp from session
    $otp_session = $_SESSION['otp'];

    // check if otp is correct
    if ($otp == $otp_session) {

        // update the user status to active
        $sql = "UPDATE user SET email_verified = '1' WHERE email = '" . $_SESSION['email'] . "'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            // remove otp and email from session
            unset($_SESSION['otp']);
            unset($_SESSION['email']);
            unset($_SESSION['userStatus']);

            // from page = login page
            if ($_SESSION['from_page'] == 'signin') {
                unset($_SESSION['from_page']);
                $_SESSION['success'] = "Your account has been verified successfully!";
                header("location: ../../location_check.php");
            } else if ($_SESSION['from_page'] == 'register') {
                unset($_SESSION['from_page']);
                $_SESSION['success'] = "Your account has been created successfully! Please login to continue.";
                header("location: ../sign_in.php");
            }
        } else {
            $_SESSION['error'] = "Something went wrong! Please try again!";
            header("location: ../email_verification.php");
        }
    } else {
        $_SESSION['error'] = "Incorrect OTP!";
        echo $otp;
        echo $otp_session;
        header("location: ../email_verification.php");
    }
}
