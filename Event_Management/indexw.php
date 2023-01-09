
    <?php
    include('constants.php');
    

    $_SESSION['page_name'] = "LogIn";
    if( isset($_SESSION['user']) & $_SESSION['page_name'] == 'LogIn'){
    ?>
    <script>
        function logout_check(){
            var result = confirm("Do you want to leave the site?");
            if(result==true ){
                location.replace('logout.php');
            }
            else{
                location.replace('location_check.php');
                
            }
        }
    </script>
    <?php
    }

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <script>
             
        function show_password() {
            
            var pwd = document.getElementById('pwd');
            var spi = document.getElementById('show_password_icon');
            var hpi = document.getElementById('hide_password_icon');

            if(pwd.type === "password"){
                pwd.type = "text";
                hpi.style.display ="inline";
                spi.style.display ="none";

            }
            else{
                pwd.type ="password";
                hpi.style.display="none";
                spi.style.display ="inline";


            }
        }
    </script>
</head>
<body class="sign_body" onload="logout_check()">
        <header class="sign_in_header">
        <div class="header_menu">
            <ul class="menu_items">
                <li class="menu_link"><a href="landing_page.php">Home</a></li>
                <li class="menu_link"><a href="event_planners.php">Event Planners</a></li>
                <li class="menu_link"><a>About us</a></li>
                <li class="menu_link"><a>Contact Us</a></li>
            </ul>
        </div>
        </header>
    <div class="box center">
        <div class="off-white-box">
            <img src="images/admin.png" class="admin_img">
            <div class="white-box">
                <img src="images/logo.png" class="logo">
                   <p class="heading">Sign In</p> 
                   <hr class="hr1">
                   <div class = "error margin-left-60">
                    <?php 
                    if(isset($_SESSION['no-login-message'])){
                        echo $_SESSION['no-login-message'];
                        unset($_SESSION['no-login-message']);
                    }
                    ?>
                </div>
                <div class="error-text margin-left-60"></div>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="login-form" class="login-form">
                    <span class="email">
                    Email Address: <br />
                    <input type="email" name="email" placeholder="Enter your email" required>
                    
                    <br>
                    </span>
                    
                    Password: <br>
                    <input type="password"  name="pwd" class="pwd" id="pwd" placeholder="Enter your password" required>
                    <span class="password" onclick="show_password()">
                    <img src="images/eye.png" id="show_password_icon" class="password_icon" >
                    <img src="images/hidden.png" id="hide_password_icon"  class="password_icon">
                    </span>
    
                    
                    
                    <br>
                    <input type="submit" class="login" value="Login" >
                    <br>
                    <span class="sign_up_link">
                    Don't have an account?
                    <a href="sign_up.php">Sign Up</a>
                    </span>
                </form>
                
            </div>
        </div>
    </div>
    <script src="login.js"></script>
</body>
</html>
<?php


?>

