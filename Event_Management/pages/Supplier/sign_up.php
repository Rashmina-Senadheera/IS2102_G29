<?php
include('../../constants.php');
include('controllers/commonFunctions.php');
include('../../header-sign.php');

// check user already logged in
if (isset($_SESSION['role']) && isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
    header("location: ../../location_check.php");
} else {
    unset($_SESSION['role']);
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
}
?>
<!-- DOCTYPE html> -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sign_in.css">
    <!-- <link rel="stylesheet" href="./css/navigationBar.css"> -->
	<link rel="stylesheet" href="../css/sign_up.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="../css/forms.css">
</head>

<body>
    <div class="loginbody" id="signup">
        <div class="box" id="signup">
            <div class="image-box" id="signup">
                <p class="heading" id="sp">Supplier Registration</p>
                <img src="../images/Login-2.svg" id="sp" class="sign_in_logo" />
            </div>
            <div class="white-box" id="signup">
				
                <form class="register-form" method="POST" action="./controllers/signup-ep.php">
                    <!-- Show errors -->
                    <div class="signupTopError"><?php echo showSessionMessage('error') ?></div>
                    <div class="row">
                        <div class="p-info-title" >
                            Personal Information
                        </div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <input type="text" name="firstname" class="input-field" required />
                            <label class="input-label">First Name <span>*</span></label>
                            <div class="signupError"><?php echo showSessionMessage('error-firstname') ?></div>
                        </div>
                        <div class="input">
                            <input type="text" name="lastname" class="input-field" required />
                            <label class="input-label">Last Name <span>*</span></label>
                            <div class="signupError"><?php echo showSessionMessage('error-lastname') ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <input type="tel" name="contact" class="input-field" required />
                            <label class="input-label">Contact Number <span>*</span></label>
                            <div class="signupError"><?php echo showSessionMessage('error-contact') ?></div>
                        </div>
                        <div class="input">
                            <input type="text" name="email" class="input-field" required />
                            <label class="input-label">Email <span>*</span></label>
                            <div class="signupError"><?php echo showSessionMessage('error-email') ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <input type="text" name="address" class="input-field" required />
                            <label class="input-label">Address <span>*</span></label>
                            <div class="signupError"><?php echo showSessionMessage('error-address') ?></div>
                        </div>
                        <div class="input">
                            <input type="text" name="nic" class="input-field" required />
                            <label class="input-label">NIC Number <span>*</span></label>
                            <div class="signupError"><?php echo showSessionMessage('error-nic') ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="p-info-title" id="tit">
                            Set Password
                        </div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <input type="password" name="password" class="input-field" required />
                            <label class="input-label">Password <span>*</span></label>
                            <div class="signupError"><?php echo showSessionMessage('error-password') ?></div>
                        </div>
                        <div class="input">
                            <input type="password" name="cpassword" class="input-field" required />
                            <label class="input-label">Confirm Password <span>*</span></label>
                            <div class="signupError"><?php echo showSessionMessage('error-cpassword') ?></div>
                        </div>
                    </div>

                    <div class="action">
                        <button class="action-button">Register</button>
                    </div>
                    <div class="login-card-info">
                        Have an account?
                        <a href="../../sign_in.php">Sign In</a>
                    </div>
                </form>
			</div>
		</div>
	</div>
</body>

</html>