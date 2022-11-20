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
        

    $sql = "SELECT * FROM tbl_admin WHERE email='$email' AND password='$password'";
    $res = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($res);

    if($count == 1){
        $_SESSION['login'] = "Login Successful";
        $rows = mysqli_fetch_assoc($res);
        $_SESSION['user'] = $rows['name'];
        header('location:'.SITEURL.'dashboard.php');
    }
    else {
        $error = "Username or Password is incorrect";
    }
    
}
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body class="sign_body">
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
            <img src="images/Events.png" class="admin_img">
            <div class="white-box">
                <img src="images/logo.png" class="logo">
                   <p class="heading">Sign Up</p> 
                   <hr class="hr1">
                   <div class = "error margin-left-60">
                <?php 
                 if(isset($_SESSION['no-login-message'])){
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                 }
                ?>
                </div>
                
                 <div class="select_register">
                    <span class="register_as">
                        Register as,
                    </span>
                    <span class="btn btn_register select_customer">
                        <img src="images/customer.png">
                        <a href="#">Customer</a>
                    </span>
                    <span class="btn btn_register select_event_planner">
                        <img src="images/event_planner.png">
                        <a href="#">Event Planner</a>
                    </span>
                    <span class="btn btn_register select_supplier">
                        <img src="images/supplier.png">
                        <a href="#">Supplier</a>
                    </span>
                    <span class="sign_in_txt">
                    Already have an account?
                    <a href="index.php">Sign In</a>
                    </span>
                 </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php


?>

