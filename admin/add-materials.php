<?php include('partials/menu.php');
ob_start(); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Material</h1>
        <br />
        <br />
        <?php 
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <br />
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table-50">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Material">
                    </td>
                </tr>
                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the Material"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" >
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category" >

                            <?php 
                                //php code to display categories from database
                                //SQL to get the active categories from database
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);
                                
                                if($count>0){
                                    //have categories
                                    while($row=mysqli_fetch_assoc($res)){
                                        //get the details of category
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        ?>
                                        <!--display the dropdown-->
                                        <option value="<?php echo $id;?>"><?php echo $title; ?> </option>
                                        <?php
                                    }
                                }
                                else{
                                    //no categories
                                    ?>
                                    <option value="0">No Categories Found</option>
                                    <?php
                                }

                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Material" class="btn-add">
                    </td>
                </tr>

            </table>
        </form>

        <?php 
            //check whether the button is clicked or not
            if(isset($_POST['submit'])){
                //add the material
                //get the data from form
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                if(isset($_POST['featured'])){
                    $featured = $_POST['featured'];
                }
                else{
                    $featured = "No"; //default value
                }
                if(isset($_POST['active'])){
                    $active = $_POST['active'];
                }
                else{
                    $active = "No"; //default value
                }


                //upload the image if selected
                //select image is clicked or not checking
                if(isset($_FILES['image']['name'])){
                    //get the details of the selected image
                    $image_name = $_FILES['image']['name'];

                    //image is selected or not checking
                    if($image_name != "" ){
                        //image is selected
                        //rename the image
                        $ext1 = explode('.',$image_name);
                        $ext = end($ext1);

                        $image_name = "Material-".rand(0000,9999).".".$ext; //new image name

                        //upload the image
                        //src path and the destination path
                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../images/material/".$image_name;

                        $upload = move_uploaded_file($src, $dst);

                        //check whether the image uploaded or  not
                        if($upload==FALSE){
                            //Failed to  upload
                            //redirect to manage-material
                            $_SESSION['upload'] = "<div class='error'>Failed To Upload Image</div>";
                            header('location: '.SITEURL.'admin/add-materials.php');

                            die();//stop the process
                        } 
                      
                        
                    }

                }
                else{
                    $image_name = ""; //default value
                }
                //insert into database 
                $sql2 = "INSERT INTO tbl_materials SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'
                ";

                //execute the query
                $res2 = mysqli_query($conn, $sql2);

                //check whether the data is inserted or not
                if($res2== TRUE){
                    //data inserted successfully
                    $_SESSION['add'] ="<div class='success'>Material Added Successfully</div>";
                    header('location:'.SITEURL.'admin/manage-materials.php');

                }
                else{
                    //failed to insert data
                    $_SESSION['add'] ="<div class='error'>Failed To Add Material</div>";
                    header('location:'.SITEURL.'admin/manage-materials.php');
                }

                
            }

        ?>
    </div>
</div>
<?php include('partials/footer.php'); ?>