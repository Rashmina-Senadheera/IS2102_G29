<?php 
//include constants page
include('../config/constants.php');

if(isset($_GET['id']) && isset($_GET['image_name'])){
    //process to delete

    //get id and image name
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //check whether the image is available or not and remove the image if available
    if($image_name != ""){

        //get the path of the image
        $path = "../images/material/".$image_name;

        //remove image file from the folder
        $remove = unlink($path);

        //check whether the image is removed or not
        if($remove==false){
            //failed to remove 
            $_SESSION['upload'] = "<div class='error'>Failed to Remove image file.</div>";

            //redirect to manage materials
            header('location:'.SITEURL.'admin/manage-materials.php');

            //stop the process of deleting material
            die();

        }

    }

    //dlete material from database

    $sql = "DELETE FROM tbl_materials WHERE id='$id'";

    //execute the query
    $res = mysqli_query($conn,$sql);

    //check whether the query executed or not and set the session message respectively
    //redirect to manage material page with session message
    if ($res==true){
          //material deleted 
          $_SESSION['delete'] = "<div class='success'>Material Deleted Successfully.</div>";
          header('location:'.SITEURL.'admin/manage-materials.php');

    }else{
        //failed to delete 
        $_SESSION['delete'] = "<div class='error'>Failed To Delete Material.</div>";
        header('location:'.SITEURL.'admin/manage-materials.php');
    }     
    

}else{
    //redirect to manage food page
    $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
    header('location:'.SITEURL.'admin/manage-materials.php');

}

?>
