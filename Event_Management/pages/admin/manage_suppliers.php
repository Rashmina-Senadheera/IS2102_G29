<?php
    include('admin_header.php');
    include('admin_nav.php');
    //include('header.php');
    //include('login_access.php');
    //include('constants.php');
    $_SESSION['page_name'] = "Supplier Details";
   
?>

<body>

             <main class="admin_main">
             <div class="blur_bg" id="blur_bg"></div>
                <div class="search_add">
                    <span class="search">
                        <label class="search_customers">Suppliers</label>
                        <input type="search" name="search_box" placeholder="Search Here">
                                  
                        <i class="fa fa-search icon"></i>
                        <input type="submit" class="btn_search" value="Search">
                        
                    </span>
                    <a href="#" class="add-btn">Add Supplier</a>
                </div>
                <div class="add-form" id="add-form">
                    <span>
                    <label >Supplier Details </label>
                    <i class="fa-solid fa-xmark close" ></i>
                    </span>
                   <form action="" method="POST" class="add" id="add">
                        <div class="info-box">
                            <div class="error-text"></div>
                            <div class="box">
                                <span class="details">Full Name <label class="error">*</label></span>
                                <input type="text" name="name" placeholder="Enter Name" required>
                            </div>
                            <div class="box">
                                <span class="details">Password<label class="error">*</label></span>
                                <input type="password" name="pwd" placeholder="Enter Password" required>
                            </div>
                            <div class="box">
                                <span class="details">Email<label class="error">*</label></span>
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
                        <span>
                        <input type="submit" value="Add Customer" class="add-btn submit-form">
                        <input type="hidden" value="supplier" name="role" class="role">
                        </span>
                    </form>

                    
                    
                </div>
                
          
                <table class="details_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th >Name</th>
                        <th >Email</th>
                        <th>Actions </th>
                    </tr>
                    </thead>
                    <tbody class="table_body">
                    
                    </tbody>
                    
                </table>
                
                
            
            <script src="../../js/form_visiblity.js"></script>
            <script src="../../js/add-form.js"></script>
            <script src="../../js/supplier_info_table.js"></script>
            </main>

</body>
</html>
