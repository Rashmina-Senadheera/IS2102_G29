<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
    <link rel="stylesheet" href="sidenav.css">
    <!-- Boxicons CDN Link -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <section class="home-section">
        <nav>
            
            
            </div>
            <div class="sidebar-button">
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="sidebar-button">
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="sidebar-button">
                <span class="admin_name">Profile</span>
             </div>
             <div class="name">
            <div class="description">
                <div class="head">Hello shamin!<br></div>
            </div>
            <div class="logout"><a href="logout.php"  id="logout" onclick="confirm()">logout</a></div>
        </nav>
       
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>

</body>

</html>