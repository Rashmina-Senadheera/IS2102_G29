<?php
    include('constants.php');
    include('login_access.php');
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    
</head>
<body>
    <header class="header">
    <div class="flex-row top_header">
        <span class="flex-row menu">
            <ul class="flex-row">
                <li><a href="landing_page.php">Home</a></li>
                <li><a href="event_planners.php">Event Planners</a></li>
                <li><a>About Us</a></li>
                <li><a>Contact Us</a></li>
            </ul>
        </span>
            <span class="flex-row details">
                <?php 
                    if(isset($_SESSION['user'])){
                        echo $_SESSION['user'];
                    }
                ?>
                <div class="dropdown_content">
                        <span class="dropdown_element">
                            <img src="images/profile.png" class="user_profile">
                            <a href="customer_profile.php">Profile</a>
                        </span>
                        <span class="dropdown_element" >
                            <img src="images/log-out.png" class="user_logout">
                            <a onclick="logout_check()" href="logout.php">Logout</a>
                            </span>

                </div>
                <img src="images/user.png" class="user_logo">
            </span>
        </div>
    </header>