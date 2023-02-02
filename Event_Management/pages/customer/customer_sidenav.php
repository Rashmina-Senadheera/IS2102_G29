<head>
    <link rel="stylesheet" href="../../css/sidenav.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!--navigation bar left-->
    <div class="sidebar">-->
        <div class="logo-details">
            <img src="../../images/logo-white.svg" alt="logo" />
            <span class="logo_name">Eventra</span>
        </div>
        <ul class="nav-links">
            
            <li>
                <a href="customer_quotation.php">
                    <i class='bx bx-task'></i>
                    <span class="links_name">Quotations</span>
                </a>
            </li>
            <li>
                <a href="CompletedEvents.php">
                    <i class="fa-solid fa-calendar"></i>
                    <span class="links_name">Completed Events</span>
                </a>
            </li>
            <li>
                <a href="OngoingEvents.php">
                    <i class="fa-regular fa-calendar"></i>
                    <span class="links_name">Ongoing Events</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-person"></i>
                    <span class="links_name">Event Planners</span>
                </a>
            </li>
            <li>
                <a href="order.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Orders</span>
                </a>
            </li>
            <li>
                <a href="Payments.php">
                    <i class='bx bx-money'></i>
                    <span class="links_name">Payments</span>
                </a>
            </li>      
            <li>
                <a href="ChatWithEP.php">
                    <i class='bx bx-message rounded detail'></i>
                    <span class="links_name">Messages</span>
                </a>
            </li>
            <li>
                <a href="Profile.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Profile</span>
                </a>
            </li>
            <li class="log_out">
               <a href="logout.php">
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
