
<head>
    <link rel="stylesheet" href="../css/sidenav.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>


    <!--navigation bar left-->
    <div class="sidebar">
        <div class="logo-details">
            <!-- <i class='bx bxl-c-plus-plus'></i> -->
            <img src="../images/logo-white.svg" alt="logo" />
            <span class="logo_name">Eventra</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href=<?php echo 'http://localhost/Event_Management002/customer/Profile.php' ?>>
                    <i class='bx bx-user'></i>
                    <span class="links_name">Profile</span>
                </a>
            </li>
            <li>
                <a href=<?php echo  'http://localhost/Event_Management002/customer/Password.php'  ?>>
                    <i class='bx bx-package'></i>
                    <span class="links_name">Password</span>
                </a>
            </li>
            <li>
                <a href=<?php echo  'http://localhost/Event_Management002/customer/QuotationNw.php'  ?>>
                    <i class='bx bx-task'></i>
                    <span class="links_name">Quotations</span>
                </a>
            </li>
            <li>
                <a href=<?php echo  'http://localhost/Event_Management002/customer/Events.php'  ?>>
                    <i class='bx bx-calendar-event'></i>
                    <span class="links_name">Events</span>
                </a>
            </li>
            <li>
                <a href=<?php echo  'http://localhost/Event_Management002/customer/Payments.php'  ?>>
                    <i class='bx bx-money'></i>
                    <span class="links_name">Payments</span>
                </a>
            </li>
            
            <li>
                <a href=<?php echo  'http://localhost/Event_Management002/customer/Feedback.php'  ?>>
                    <i class='bx bx-heart'></i>
                    <span class="links_name">Feedback</span>
                </a>
            </li> 

            <li class="log_out">
               <a href=<?php echo 'http://localhost/Event_Management002/customer/logout.php'  ?>>
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>

</body>