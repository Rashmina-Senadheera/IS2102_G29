<?php
    include('admin_header.php');
    include('admin_nav.php');
    $_SESSION['page_name'] = "Customer Details";
   
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <script src="form_visiblity.js"></script>

</head>
    
        <body id="body">

             <main class="admin_main font-poppins">
                <div class="blur_bg" id="blur_bg"></div>
                <div class="search_add">
                    <span class="search">
                        <label class="search_customers">Customers</label>
                        <input type="search" name="search_box" placeholder="Search Here">
                        <i class="fa fa-search icon"></i>
                        <input type="submit" class="btn_search" value="Search">
                        
                        
                    </span>
                    <a href="#" class="add-btn" onclick="show_form()">Add Customer</a>
                </div>
                
                 <div class="add-form" id="add-form">
                    <span>
                    <label >Customer Details </label>
                    <i class="fa-solid fa-xmark close" onclick="hide_form()"></i>
                   
                    </span>
                   <form action="passdata.php" method="POST">
                        <div class="info-box">
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
                        <span>
                        <input type="submit" value="Add Customer" class="add-btn">
                        <input type="text" value="customer" name="role" style="display: none;">
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
                    
                    <?php
                        $sql = "SELECT * FROM tbl_user";
                        $res = mysqli_query($conn,$sql);
                        if($res==TRUE){
                            $count = mysqli_num_rows($res);

                            $num = 1;

                            if($count >0){
                                while($rows = mysqli_fetch_assoc($res)){
                                    $id = $rows['id'];
                                    $name = $rows['username'];
                                    $email = $rows['email'];
                    ?>
                                    <tr>
                                        <td><?php echo $num++; ?></td>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $email; ?></td>
                                        <td class="action_buttons">
                                            <span class="btn btn_more">
                                            <img src="../images/more.png" class="more_icon">
                                            <a class="btn_info" href="<?php echo SITEURL; ?>admin/customer_info.php?id=<?php echo $id ?>" >More Info</a>
                                            </span>
                                            <span class="btn btn_update">
                                            <img src="../images/update.png" class="update_icon">
                                            <a href="<?php echo SITEURL; ?>admin/customer_update.php?id=<?php echo $id ?>" >Update</a>
                                            </span>
                                            <span class="btn btn_delete">
                                            <img src="../images/delete.png" class="delete_icon">
                                            <a  href="<?php echo SITEURL; ?>admin/customer_delete.php?id=<?php echo $id ?>" >Delete</a>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                    
                    ?>
                    
                </table>

                
            </main>

</body>
</html>
