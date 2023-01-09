
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script defer src="activePage.js" ></script>
</head>
<body>

    <header class="lp_header">
        <div class="reg_top_head">
        <span>
        <img src="images/logo-white.svg" class="reg_header_logo">
        </span>
        <span>
        <div class="user_details">
                <span class="user_name">
                   
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
                </span>

                <img src="images/user.png" class="user_logo">
                

                </div>
        </span>

        </div>
        <div class="header_menu">
            <label>
                <h1>Your Event, Your Way</h1>
            </label>
            <span>
                <input type="search" placeholder="Search Here">
                <input type="submit" value="Search" class="btn">
            </span>
            <span>
            <ul class="menu_items">
                <li class="menu_link"><a href="landing_page.php">Home</a></li>
                <li class="menu_link"><a href="event_planners.php">Event Planners</a></li>
                <li class="menu_link"><a>About us</a></li>
                <li class="menu_link"><a>Contact Us</a></li>
            </ul>
            </span>
           
        </div>
        
    </header>
        
            
    <script>
    function logout_check(){
        var result = confirm("Do you want to leave the site?");
        if(result==false){
            event.preventDefault();
        }
    }
</script> 
</body>
</html>