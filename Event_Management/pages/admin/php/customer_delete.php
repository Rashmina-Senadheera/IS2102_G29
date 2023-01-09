<?php 
    include('../../constants.php');
    $id = mysqli_real_escape_string($conn,$_GET['id']); 

    $sql = "DELETE FROM user where user_id='$id'";
    $res = mysqli_query($conn,$sql);

    if($res == TRUE){
        header('location:'.SITEURL.'admin/manage_customers.php');
    }
    



?>