<?php include('partials/menu.php');  ?>
<div class="main-content">
    <div class="wrapper">
    <h1>Manage Materials</h1>
                <br />
                <br />
                <!--Add New Project-->
                <a href="<?php echo SITEURL; ?>admin/add-materials.php" class="btn-add">Add Materials</a>
                <br />
                <br />
                <?php 
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    
                    if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }
                    
                    if(isset($_SESSION['unauthorize'])){
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                    }
                    
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    
                
                ?>


                <table class="table_full">
                   <tr>
                       <th>S.N</th>
                       <th>Title</th>
                       <th>Price</th>
                       <th>Image</th>
                       <th>Featured</th>
                       <th>Active</th>
                       <th>Actions</th>
                   </tr>

                   <?php 
                   $sql = "SELECT * FROM tbl_materials";
                   //execute the query 
                   $res = mysqli_query($conn,$sql);
                   $count = mysqli_num_rows($res);
                   $sn =1;

                   if($count>0){
                       //have data in database
                       while($row=mysqli_fetch_assoc($res)){
                           //get the values
                           $id = $row['id'];
                           $title = $row['title'];
                           $price = $row['price'];
                           $image_name = $row['image_name'];
                           $featured = $row['featured'];
                           $active = $row['active'];
                           ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>
                                <td>$<?php echo $price; ?></td>
                                <td>
                                    <?php 
                                        //check whether we have image or not
                                        if($image_name==""){
                                            //no image
                                            echo "<div class='error'>Image Not Added</div>";
                                        }
                                        else{
                                            //display image
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/material/<?php echo $image_name; ?>" width="100px">
                                            <?php 
                                        }
                                    
                                    ?>
                                </td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-materials.php?id=<?php echo $id;  ?>" class='btn-update'>Update </a> 
                                    <a href="<?php echo SITEURL;?>admin/delete-materials.php?id=<?php echo $id;  ?>&image_name=<?php echo $image_name; ?>" class='btn-delete'>Delete</a> 

                                </td>
                            </tr>

                           <?php 


                       }


                   }
                   else{
                       //no data in database
                       echo "<tr><td colspan='7' class='error'>Material Not Added Yet</td></tr>";
                   }
                   
                   ?>
                   
                   
               </table>

    </div>
</div>

<?php include('partials/footer.php');?>