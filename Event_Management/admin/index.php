<?php include('partials/menu.php'); ?>
        <!---Main Content--->
        <div class="main-content">
            <div class="wrapper">
               <h1>Dashboard</h1>
               <br /><br />
				<?php 
                    if(isset($_SESSION['login'])){
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);

                    }
                    
                ?>

               <div class="col-4 text-center">
                   <?php 
                    $sql = "SELECT * FROM tbl_category";
                    //execute query
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res);
                   
                   ?>
                   <h1><?php echo $count; ?></h1>
                   <br />
                   Categories
               </div>

               <div class="col-4 text-center">
               <?php 
                    $sql2 = "SELECT * FROM tbl_materials";
                    //execute query
                    $res2 = mysqli_query($conn,$sql2);
                    $count2 = mysqli_num_rows($res2);
                   
                   ?>
                   <h1><?php echo $count2; ?></h1>
                   <br />
                   Materials
               </div>

               <div class="col-4 text-center">
               <?php 
                    $sql3 = "SELECT * FROM tbl_order";
                    //execute query
                    $res3 = mysqli_query($conn,$sql3);
                    $count3 = mysqli_num_rows($res3);
                   
                   ?>
                   <h1><?php echo $count3; ?></h1>
                   <br />
                   Total Orders
               </div>

               <div class="col-4 text-center">
               <?php 
                    $sql4 = "SELECT SUM(total) as Total FROM tbl_order WHERE status='Delivered'";
                    //execute query
                    $res4 = mysqli_query($conn,$sql4);
                    //get the value
                    $row4 = mysqli_fetch_assoc($res4);
                    $total_revenue = $row4['Total'];
                   
                   ?>
                   <h1>$<?php echo $total_revenue; ?></h1>
                   
                   <br />
                   Revenue 
               </div>
               <div class="clearfix">

               </div>
               

            </div>
            
        </div>
<?php include('partials/footer.php'); ?>