<?php
    include('admin_header.php');
    include('admin_nav.php');

    $_SESSION['page_name'] = "Event Planner Details";
    $_SESSION['role_name'] = "customer";
?>

<body>

             <main class="admin_main font-poppins">

             <div class="blur_bg" id="blur_bg"></div>
                <div class="search_add">
                    <span class="search">
                        <label class="search_customers">Event Planners</label>
                        <input type="search" name="search_box" placeholder="Search Here">          
                        <i class="fa fa-search icon"></i>
                        <input type="submit" class="btn_search" value="Search">
                        
                    </span>
                    <a href="#" class="add-btn" >Add Event Planner</a>
                </div>
                <div class="add-form" id="add-form">
                    <span>
                    <label >Event Planner Details </label>
                    <i class="fa-solid fa-xmark close" ></i>
                   
                    </span>
                   <form action="" method="POST" class="add" id="add">
                        <div class="info-box">
                        <div class="error-text"></div>
                            <div class="box">
                                <span class="details">Full Name</span>
                                <input type="text" name="name" placeholder="Enter Name" required>
                            </div>
                            <div class="box">
                                <span class="details">Password</span>
                                <input type="password" name="pwd" placeholder="Enter Password" required>
                            </div>
                            <div class="box">
                                <span class="details">Email</span>
                                <input type="text" name="email" placeholder="Enter Email" required>
                            </div>
                            
                            <div class="box">
                                <span class="details">Phone Number</span>
                                <input type="text" name="phone_num" placeholder="Enter Your Name" >
                            </div>
                            <div class="box">
                                <span class="details">Address</span>
                                <input type="text" name="address" placeholder="Enter Your Name" >
                            </div>
                        </div>
                        <input type="submit" value="Add Event Planner" class="add-btn submit-form">
                        <input type="text" value="event_planner" name="role" style="display: none;">
                    </form>
                </div>
                
          
                <table class="details_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th >Name</th>
                        <th >Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table_body">
                    
                    </tbody>
                </table>
            </main>
            <script src="javascript/form_visiblity.js"></script>
            <script src="javascript/add-form.js"></script>
            <script src="javascript/ep_info_table.js"></script>

</body>
</html>
