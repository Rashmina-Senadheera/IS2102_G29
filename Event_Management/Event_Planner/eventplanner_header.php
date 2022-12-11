<!-- font awesome link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
<link rel="stylesheet" href="../css/navigationBar.css">

<header class="headAll">
    <div id="menu-bar" class="fas fa-bars"></div>
    <div class="header-2" id="header-2">
        <nav class="navbar" id="navbar">
            <a href=<?php echo SITEURL ?>>About Us</a>
            <a href=<?php echo SITEURL ?>>Contact Us</a>
        </nav>
        <!-- login/profile button -->
        <div class="icons">
            <a id="profile-name" href=<?php echo SITEURL ?> class="btna">
                <?php 
                    if(isset($_SESSION['user_name'])){
                        echo $_SESSION['user_name'];
                    } else {
                        echo "Login";
                    }
                 ?>
            </a>
        </div>
    </div>
</header>

<!-- custom js -->
<script>
    let menubar = document.getElementById('menu-bar');
    let navbar = document.getElementById('navbar');
    let header = document.getElementById('header-2');

    menubar.addEventListener('click', () => {
        menubar.classList.toggle('fa-times');
        navbar.classList.toggle('active');
        header.classList.toggle('active');
    });
</script>