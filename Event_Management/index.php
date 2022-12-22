
    <?php
    include('constants.php');
    $emailerr =$pwderr="";
    $email = $password=$error="";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
   
    if(empty($_POST['email']))
    {
        $emailerr = "Email is required";
    }
    else{
        $email = mysqli_real_escape_string($conn,$_POST['email']);
    }
    if(empty($_POST['pwd'])){
        $pwderr = "Password is required";
    }
    else{
        $password = mysqli_real_escape_string($conn,$_POST['pwd']);
    }
        

    
    if($emailerr=="" & $pwderr==""){
    
        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        if($count == 1){
            $rows = mysqli_fetch_assoc($res);
            $_SESSION['user'] = $rows['username'];
            $_SESSION['role'] = $rows['role'];
            $role = $_SESSION['role'];
            if($role== 'admin'){
                header('location:'.SITEURL.'admin/dashboard.php');
            }
            else if($role == 'customer'){
                header('location:'.SITEURL.'landing_page.php');
            }
            
            
            
        }
        else {
            $error = "Username or Password is incorrect";
        }
    }

    }


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
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="login-form" class="login-form">
                    <span class="email">
                    Email Address: <br />
                    <input type="text" name="email" placeholder="Enter your email" >
                    <span class="error"> <?php echo $emailerr; ?></span> 
                    <br><br>
                    </span>
                    
                    Password: <br>
                    <input type="password"  name="pwd" class="pwd" id="pwd" placeholder="Enter your password">
                    <span class="password" onclick="show_password()">
                    <img src="images/eye.png" id="show_password_icon" class="password_icon" >
                    <img src="images/hidden.png" id="hide_password_icon"  class="password_icon">
                    </span>
                    <span class="error"><?php echo $pwderr; ?></span>
                    <br><br>
                    
                    <span class="error"> <?php echo $error; ?> </span>
                    <br>
                    <input type="submit" name="login" value="Login" >
                    <br>
                    <span class="sign_up_link">
                    Don't have an account?
                    <a href="sign_up.php">Sign Up</a>
                    </span>
                </form>
                
            </div>
        </div>
    </div>

</body>
</html>
<?php


?>

