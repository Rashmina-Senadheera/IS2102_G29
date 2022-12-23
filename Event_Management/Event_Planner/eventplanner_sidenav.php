<?php include('../constants.php');

// check user already logged in
if (isset($_SESSION['role']) && isset($_SESSION['user_id']) && isset($_SESSION['user_name']) && !isset($_SESSION['userStatus'])) {
    // check user role
    if ($_SESSION['role'] == 'event_planner') {
        // do nothing
    } else {
        // redirect to unauthorized page
        header('location: ' . SITEURL . 'Event_Planner/unauthorized.php');
        exit();
    }
} else {
    unset($_SESSION['role']);
    unset($_SESSION['user_id']);
    unset($_SESSION['user_name']);
    // redirect to unauthorized page
    header('location: ' . SITEURL . 'Event_Planner/unauthorized.php');
    exit();
}
?>

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
                <a href=<?php echo SITEURL . 'event_planner/Requests.php'  ?>>
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Requests</span>
                </a>
            </li>
            <li>
                <a href=<?php echo SITEURL . 'event_planner/Messages.php'  ?>>
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Messages</span>
                </a>
            </li>
            <li>
                <a href=<?php echo SITEURL . 'event_planner/os-list.php'  ?>>
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Order Requests</span>
                </a>
            </li>
            <li>
                <a href=<?php echo SITEURL . 'event_planner/Suppliers.php'  ?>>
                    <i class='bx bx-package'></i>
                    <span class="links_name">Suppliers</span>
                </a>
            </li>
            <li>
                <a href=<?php echo SITEURL . 'event_planner/CustomerQuotations.php'  ?>>
                    <i class='bx bx-task'></i>
                    <span class="links_name">Customer Quotations</span>
                </a>
            </li>
            <li>
                <a href=<?php echo SITEURL . 'event_planner/SupplierQuotations.php'  ?>>
                    <i class='bx bx-task'></i>
                    <span class="links_name">Supplier Quotations</span>
                </a>
            </li>
            <li>
                <a href=<?php echo SITEURL . 'event_planner/Payments.php'  ?>>
                    <i class='bx bx-money'></i>
                    <span class="links_name">Payments</span>
                </a>
            </li>
            <li>
                <a href=<?php echo SITEURL . 'event_planner/PackagesServices.php'  ?>>
                    <i class='bx bx-package'></i>
                    <span class="links_name">Packages & Services</span>
                </a>
            </li>
            <li>
                <a href=<?php echo SITEURL . 'event_planner/Calendar.php'  ?>>
                    <i class='bx bx-calendar'></i>
                    <span class="links_name">Calendar</span>
                </a>
            </li>
            <li>
                <a href=<?php echo SITEURL . 'event_planner/Reports.php'  ?>>
                    <i class='bx bxs-report'></i>
                    <span class="links_name">Reports</span>
                </a>
            </li>
            <li>
                <a href=<?php echo SITEURL . 'event_planner/Feedback.php'  ?>>
                    <i class='bx bx-message'></i>
                    <span class="links_name">Feedback</span>
                </a>
            </li>
            <li>
                <a href=<?php echo SITEURL . 'event_planner/Profile.php' ?>>
                    <i class='bx bx-user'></i>
                    <span class="links_name">Profile</span>
                </a>
            </li>
            <li></li>

            <li class="log_out">
                <a href="../logout.php">
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