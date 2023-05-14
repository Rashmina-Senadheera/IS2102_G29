<?php
include "./db_conn.php";


?>
<!-- font awesome link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
<link rel="stylesheet" href="../../css/navigationBar.css">
<link rel="stylesheet" href="../../css/customer_quotation.css">
<header class="headAll">
    <div id="menu-bar" class="fas fa-bars"></div>
    <div class="header-2" id="header-2">
        <nav class="navbar" id="navbar">
            <a href="#">Home</a>
            <a href="#">Events</a>
            <a href="#">About Us</a>
            <a href="#">Contact Us</a>
        </nav>
        <!-- login/profile button -->
        <div class="icons">
            <a id="profile-name" href="#" class="btna"><?=$_SESSION['user_name']?></a>
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


