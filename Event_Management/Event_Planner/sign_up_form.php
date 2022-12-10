<?php
include('../constants.php');
include('eventplanner_header.php');

function showErrors($error)
{
    if (isset($_SESSION[$error])) {
        $tempErr = $_SESSION[$error];
        unset($_SESSION[$error]);
        return $tempErr;
    }
}
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navigationBar.css">
    <link rel="stylesheet" href="../css/sidenav.css">
    <link rel="stylesheet" href="../css/signupEP.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>
    <div class="register-body">
        <p class="heading">Event Planner Registration</span></p>
        <form class="register-form" method="POST" action="./controllers/signup-ep.php">

            <!-- Show errors -->
            <?php echo showErrors('error') ?>

            <div class="row">
                <div class="input">
                    <input type="text" name="firstname" class="input-field" required />
                    <label class="input-label">First Name <span>*</span></label>
                    <div class="signupError"><?php echo showErrors('error-firstname') ?></div>
                </div>
                <div class="input">
                    <input type="text" name="lastname" class="input-field" required />
                    <label class="input-label">Last Name <span>*</span></label>
                    <div class="signupError"><?php echo showErrors('error-lastname') ?></div>

                </div>
            </div>
            <div class="row">
                <div class="input">
                    <input type="text" name="email" class="input-field" required />
                    <label class="input-label">Email <span>*</span></label>
                    <div class="signupError"><?php echo showErrors('error-email') ?></div>
                </div>
                <div class="input">
                    <input type="text" name="nic" class="input-field" required />
                    <label class="input-label">NIC Number <span>*</span></label>
                    <div class="signupError"><?php echo showErrors('error-nic') ?></div>
                </div>
            </div>

            <div class="row">
                <div class="input">
                    <input type="tel" name="contact" class="input-field" required />
                    <label class="input-label">Contact Number <span>*</span></label>
                    <div class="signupError"><?php echo showErrors('error-contact') ?></div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="input">
                    <input type="password" name="password" class="input-field" required />
                    <label class="input-label">Password <span>*</span></label>
                    <div class="signupError"><?php echo showErrors('error-password') ?></div>
                </div>
                <div class="input">
                    <input type="password" name="cpassword" class="input-field" required />
                    <label class="input-label">Confirm Password <span>*</span></label>
                    <div class="signupError"><?php echo showErrors('error-cpassword') ?></div>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="input full">
                    <input type="text" name="address" class="input-field" required />
                    <label class="input-label">House No, Street <span>*</span></label>
                    <div class="signupError"><?php echo showErrors('error-address') ?></div>
                </div>
            </div>

            <div class="row">
                <div class="input">
                    <input type="text" name="city" class="input-field" required />
                    <label class="input-label">City <span>*</span></label>
                    <div class="signupError"><?php echo showErrors('error-city') ?></div>
                </div>
                <div class="input">
                    <input type="text" name="zip" class="input-field" required />
                    <label class="input-label">ZIP Code <span>*</span></label>
                    <div class="signupError"><?php echo showErrors('error-zip') ?></div>
                </div>
            </div>

            <div class="action">
                <button class="action-button">Register</button>
            </div>
            <div class="login-card-info">
                Have an account?
                <a href="../sign_in2.php">Sign In</a>
            </div>
        </form>
    </div>

</body>

</html>