
<?php
    include('admin_header.php');
    include('admin_nav.php');
    
    $_SESSION['page_name'] = "Dashboard";
    

   
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
   
</head>
<body>
    <main class="admin_main">
        <div class="users_summary">
        <div class="summary_boxes">
            <div class="summary_box customer_summary">
                <?php
                    $sql = "SELECT * FROM tbl_customers ";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);                    
                ?>
                <label class="customers_num">
                    <?php echo $count; ?>
                    <div class="d_icon">
                    <img src="../images/d_customer.png">
                </div>
                    
                </label>
                <p>Customers</p>
            </div>
            <div class="summary_box customer_summary">
                <?php
                    $sql = "SELECT * FROM tbl_customers ";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);                    
                ?>
                <label class="customers_num">
                    <?php echo $count; ?>
                    <div class="d_icon">
                    <img src="../images/d_event_planner.png" class="d_event_planner">
                    </div>
                    
                </label>
                <p>Event Planners</p>
            </div>
            <div class="summary_box customer_summary">
                <?php
                    $sql = "SELECT * FROM tbl_customers ";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);                    
                ?>
                <label class="customers_num">
                    <?php echo $count; ?>
                    <div class="d_icon">
                    <img src="../images/d_supplier.png">
                    </div>
                    
                </label>
                <p>Suppliers</p>
                
            </div>
            <div class="summary_box customer_summary">
                <?php
                    $sql = "SELECT * FROM tbl_customers ";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);                    
                ?>
                <label class="customers_num">
                    <?php echo $count; ?>
                    <div class="d_icon">
                    <img src="../images/d_supplier.png">
                    </div>
                    
                </label>
                <p>Suppliers</p>
                
            </div>
            
            </div>
        </div>
    </main>

</body>
</html>



