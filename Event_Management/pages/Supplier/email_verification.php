<?php
include('../../constants.php');
include('header.php');
include('controllers/commonFunctions.php');

$sendOTP = false;
if (isset($_SESSION['email']) && isset($_SESSION['user_name']) && isset($_SESSION['from_page'])) {
    if ($_SESSION['from_page'] == 'signin') {
        // check user already logged in
        if (isset($_SESSION['role']) && isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
            $sendOTP = true;
        } else {
            session_destroy();
            header("location: sign_in.php");
        }
    } else if ($_SESSION['from_page'] == 'register') {
        $sendOTP = true;
    } else {
        session_destroy();
        header("location: sign_in.php");
    }
} else {
    session_destroy();
    header("location: sign_in.php");
}

if ($sendOTP && !isset($_SESSION['otp'])) {
    // generate OTP and store in session
    $otp = rand(100000, 999999);
    $_SESSION['otp'] = $otp;

    // send email OTP
    sendEmailOTP($_SESSION['email'], $_SESSION['user_name'], $otp);
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navigationBar.css">
    <link rel="stylesheet" href="../css/sidenav.css">
    <link rel="stylesheet" href="../css/sign_up.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>
    <div class="register-body">
        <form class="register-form" id="em" method="POST" action="./controllers/verify-otp.php">

            <p class="heading" >Email Verification</p>
            <div class="form-description">
                OTP has been sent to <?php echo $_SESSION['email'] ?>. Please enter the OTP to verify your email.
                (Please check your spam folder if you do not see the email in your inbox.)
            </div>
            <!-- Show errors -->
            <div class="signupTopError"><?php echo showSessionMessage('error') ?></div>

            <div class="otp_row">
                <div class="input">
                    <input type="text" name="otp" class="input-field" required />
                    <label class="input-label">Enter OTP</label>
                    <div class="signupError"><?php echo showSessionMessage('error-firstname') ?></div>
                </div>
            </div>

            <div class="action">
                <button class="action-button">Verify</button>
            </div>
        </form>
    </div>

</body>

</html>