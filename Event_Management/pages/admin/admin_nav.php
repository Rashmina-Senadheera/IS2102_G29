<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin_nav.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script defer src="../../js/activeNav.js"></script>    
</head>
<body>

<div class="sidebar">
        <div class="logo-details">
            <img src="../../images/logo-white.svg" class="logo">
            <span class="logo_name">Eventra</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php" >
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="manage_customers.php">
                    <i class='bx bxs-user'></i>
                    <span class="links_name">Customer Details</span>
                </a>
            </li>
            <li>
                <a href="manage_event_planners.php">
                    <i class='bx bx-calendar-edit'></i>
                    <span class="links_name">Event Planner Details</span>
                </a>
            </li>
            <li>
                <a href="manage_suppliers.php">
                    <i class='bx bx-package'></i>
                    <span class="links_name">Supplier Details</span>
                </a>
            </li>
            <li>
                <a href="reports.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Reports</span>
                </a>
            </li>
        
            <li>
                <a href="profile.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Profile</span>
                </a>
            </li>
            <li>
                <a href="inquiries.php">
                    <i class="fa-solid fa-question"></i>
                    <span class="links_name">Inquiries</span>
                </a>
            </li>
 
           
            <li class="log_out">
                <a onclick="logout_check()" href="../logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
</div>  
    <script src= "../../js/logout_check.js"></script>
</body>
</html>



                