<?php include('partials/menu.php'); ?>
        <!---Main Content--->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>

                <br />
                <?php 
                if(isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']); //Remove session message              
                }  
                if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if(isset($_SESSION['user-not-found'])){
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }
                if(isset($_SESSION['pwd-not-match'])){
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }
                if(isset($_SESSION['change-pwd'])){
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }
                
                ?>
                <br/>
                <br />
                <br />

                <!--Add New Admin-->
                <a href="add-admin.php" class="btn-add">Add Admin</a>
                <br />
                <br />

                <table class="table_full">
                   <tr>
                       <th>S.N</th>
                       <th>Full Name</th>
                       <th>Username</th>
                       <th>Actions</th>
                   </tr>

                   <?php 
                        $sql = "SELECT * FROM tbl_admin";
                        $res = mysqli_query($conn, $sql);//execute the query
                        if($res == TRUE){
                            $count = mysqli_num_rows($res); //number of rows in database

                            $sn = 1;

                            if($count > 0 ){

                                while($rows = mysqli_fetch_assoc($res)){
                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $username = $rows['username'];
                                    
                                    //display valus in the table
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++;?> </td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL;  ?>/admin/update-password.php?id=<?php echo $id;?>" class="btn-add" >Change Password</a>
                                            <a href="<?php echo SITEURL;  ?>/admin/update-admin.php?id=<?php echo $id;?>" class="btn-update">Update</a>
                                            <a href="<?php echo SITEURL;  ?>/admin/delete-admin.php?id=<?php echo $id;?>" class="btn-delete">Delete</a>
                                        
                                        </td>
                                    </tr>

                                    <?php 
                                }
                            }
                            else{

                            }
                        }

                   ?>



               </table>

            </div>
            
        </div>
        
<?php include('partials/footer.php');  ?>