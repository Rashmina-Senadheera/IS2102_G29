<?php 
    include('../constants.php');
    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_user where id='$id'";
    $res = mysqli_query($conn,$sql);

    if($res == TRUE){
        header('location:'.SITEURL.'admin/manage_customers.php');
    }



?>