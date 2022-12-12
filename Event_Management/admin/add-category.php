<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br /><br />
        <?php 
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload'])){
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>
        <br />

        <!--Add Actegory Form-->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="table-50">
                <tr>
                    <td>Title </td>
                    <td><input type="text" name="title" placeholder="Category Title"></td>
                </tr>
                <tr>
                    <td>Select Image</td>
                    <td>
                        <input type="file" name="image" >
                    </td>
                </tr>
                <tr>
                    <td>Featured </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active  </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-add">
                    </td>
                </tr>
            </table>
        </form>
        <?php 
            
            //check whether the submit is clicked 
            if(isset($_POST['submit'])){

                //get the value from the form
                $title = $_POST['title'];
                //for radio input type have to check whether the button is clicked or not
                if(isset($_POST['featured'])){
                    //get the value
                    $featured = $_POST['featured'];

                }
                else{
                    //set the default value
                    $featured = "No";
                }
                if(isset($_POST['active'])){
                    //get the value
                    $active = $_POST['active'];

                }
                else{
                    //set the default value
                    $active = "No";
                }
                //check whether the image is uploaded or not
                //print_r($_FILES['image']);
                //die(); //break the code
                if(isset($_FILES['image']['name'])){
                    //upload the image
                    //To uplaod the image we need the image name, source path and destination path
                    $image_name = $_FILES['image']['name'];
                    

                    //upload image only if image is selected 
                    if($image_name != ""){
                        //auto rename
                        //get the extension of the image
                        $ext = end(explode('.',$image_name));

                        //rename the image
                        $image_name = "Category_".rand(000,999).'.'.$ext;
                        
                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/category/".$image_name;

                        //uploaad the image
                        $upload = move_uploaded_file($source_path,$destination_path);

                        //check whether the image is uploaded or not
                        if($upload == FALSE){
                            $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
                            //redirect to add category page
                            header('location:'.SITEURL.'admin/add-category.php');
                            //stop the process
                            die();
                        }
                    }
                 }
                else{
                    //don't upload image
                    $image_name = "";
                }
                
                //create sql query to insert category to database
                $sql = "INSERT INTO tbl_category SET
                        title = '$title',
                        image_name = '$image_name',
                        featured = '$featured',
                        active = '$active'

                ";
                //execute the query and save in database
                $res = mysqli_query($conn ,$sql);

                //check the execution of query
                if($res == TRUE){
                    //query executed
                    $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
                    //redirect to manage category page
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else{
                    //failed to add category
                    $_SESSION['add'] = "<div class='error'>Failed to add category</div>";
                    //redirect to manage category page
                    header('location:'.SITEURL.'admin/add-category.php');
                }

            }


        ?>
    </div>
</div>


<?php include('partials/footer.php'); ?>