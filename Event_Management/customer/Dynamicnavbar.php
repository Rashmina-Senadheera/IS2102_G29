<?php 
session_start();



 ?>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo me-auto"><a href="index.php"></a></h1> -->
      
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="index.php">Home</a></li>
          
          <li><a href="Event Planners.php" >Event Planners</a></li>
          <li><a href="about.php">About Us</a></li>
          


        <i class="bi bi-list mobile-nav-toggle"></i>
        <li><a href="contact.php">Contact Us</a></li>

        <li class="dropdown"><a href="#"><span><?=$_SESSION['']?></span> <i class="bi bi-chevron-down"></i></a>
            <ul>

                </li>
            
              <li><a href="Update.php">Update </a></li>
              <li><a href="ChangePass.php">Change Password</a></li>
              <li><a href="events.php">Events</a></li>
              <li><a href="QuotationNw.php">Quotation Request</a></li>
              <li><a href="payment.php">Payment Details</a></li>
              
            </ul>
          </li>
          
        </ul>
      </nav>

      <a href="logout.php" class="get-started-btn">Logout</a>


    </div>
  </header>
  
