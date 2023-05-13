<?php

// check user already logged in
if (isset($_SESSION['role']) && isset($_SESSION['user_id']) && isset($_SESSION['user_name']) && !isset($_SESSION['userStatus'])) {
    // check user role
    if ($_SESSION['role'] == 'supplier') {
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

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="../../css/sidenav.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


    <!--navigation bar left-->
    <div class="sidebar">
        <div class="logo-details">
            <img src="../../images/logo-white.svg" alt="logo">
            <span class="logo_name">Eventra</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="ps-list.php">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Product</span>
                </a>
            </li>
            <li>
                <a href="rs-list.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Quotations</span>
                </a>
            </li>
            
            <li>
                <a href="os-list.php">
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Orders</span>
                </a>
            </li>
            <li>
                <a href="calendar.php">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Calendar</span>
                </a>
            </li>
            <li>
                <a href="payments.php">
                    <i class='bx bx-message'></i>
                    <span class="links_name">Payments</span>
                </a>
            </li>
             <li>
                <a href="Messages.php" >
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Messages</span>
                </a>
            </li>
            <li>
                <a href="profile.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Profile</span>
                </a>
            </li>
           
            <!--<li>
                <a href="#">
                    <i class='bx bx-heart'></i>
                    <span class="links_name">Favrorites</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
            </li>-->
            <li class="log_out" style="position: absolute;" >
                <button type="button" id="btnlogOut">
                    <i class='bx bx-log-out'></i>
                    Log out
                </button>
            </li>

             <!-- <li class="log_out">
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <div class="logout">Log out</div>
                    <span class="links_name">Log out</span>
                </a>
            </li> -->
        </ul>
    </div>
    <!-- The Modal -->
    <div id="logModal" class="logmodal">
        <!-- Modal content -->
        <div class="modal-decline">
            <div class="modal-header">
                <span class="close2">&times;</span>
                Are you sure you want to logout?
            </div>
            <div class="modal-body">
                <div class="actionBtn">
                    <button type="button" id="rejectBtn" class="rejected" style="margin-left: 0;">
                        Cancel
                    </button>
                    <a href="logout.php">
                        <button type="button" class="accepted" style="margin-left: 0;">
                            Yes
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

</body>

<script>
    // Get the modal
    var modal = document.getElementById("logModal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close2")[0];

    // When the user clicks the button, open the modal 
    btnlogOut.onclick = function() {
        modal.style.display = "block";
    }
    

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    rejectBtn.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</html>