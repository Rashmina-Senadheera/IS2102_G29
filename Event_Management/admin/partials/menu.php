<?php 
    include('../config/constants.php');
    include('login-access.php');
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contract Order - Home Page</title>
        <link rel="stylesheet" href="../css/admin.css" type="text/css" />
    </head>
    <body>
                        
        <!---Menu Section--->
        <div class="menu text-center" >
            <div class="admin-name">
            <?php 
                    if(isset($_SESSION['user'])){
                        echo $_SESSION['user'];
                        
                    }
            ?>
            </div>
            <div class="wrapper">
                <ul>
                    <li><a href="<?php echo SITEURL; ?>">Home</a></li>
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-materials.php">Materials</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="logout.php" style="float: right;">Logout</a></li>
                </ul>
            </div>
            
        </div>