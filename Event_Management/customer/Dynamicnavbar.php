
<?php 
session_start();



 ?>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center" id="dnNBR">

    <h1 class="logo me-auto" id="eTitle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
      
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          
          <li><a href="Event Planners.php" >Event Planners</a></li>
          <li><a href="about.php">About Us</a></li>
          


        <i class="bi bi-list mobile-nav-toggle"></i>
        <li><a href="contact.php">Contact Us</a></li>


        <li><a href="Update.php"><span><?=$_SESSION['fname']?></span></li>
      
        </ul>
      </nav><!-- .navbar -->

      <a href="logout.php" class="get-started-btn">Logout</a>


    </div>
  </header>
  
