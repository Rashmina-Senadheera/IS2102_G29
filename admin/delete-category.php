<?php 
    //constants file
    include('../config/constants.php');
    //check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name'])){
        //get the value and delete
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the image file if available
        if($image_name != ""){
            //image is available
            $path = "../images/category/".$image_name;
            //remove the image
            $remove = unlink($path);

            //if failed to remove the image
            if($remove == false){
                //set the session message and redirect to manage category
                $_SESSION['remove'] = "dav class='error'>Failed to Remove Category</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop the process
                die();
            }
        }
        //delete data from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";
        $res = mysqli_query($conn,$sql);
        //Check whether the data is deleted from databse or not
        if($res == TRUE){
            //Set success message and redirect
            $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully</div>";
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        } 
        else{
            //Set fail message and redirect
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Category </div>";
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');

        }

        
        //redirect to manage-category page
    }
    else{
        //redirect to manage-category page
        header('location:'.SITEURL.'admin/manage-category.php');
        
    }
?>