<?php 
    include('../constants.php');
    /*include('../login_access.php');*/
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $pwd = mysqli_real_escape_string($conn,md5($_POST['pwd']));
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone_num = mysqli_real_escape_string($conn,$_POST['phone_num']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    $role = mysqli_real_escape_string($conn,$_POST['role']);

    $sql2 = "SELECT * from tbl_user WHERE email='$email'";
    $res2 = mysqli_query($conn,$sql2);
    $count2 = mysqli_num_rows($res2);

    if($count2>0){
        echo "Wrong";
    }

    else{
    $sql = "INSERT INTO tbl_user SET
            email = '$email',
            username = '$name',
            password = '$pwd',
            role = '$role'
            ";

    $res = mysqli_query($conn, $sql);
        
        if($res == TRUE){
            $_SESSION['added'] = "Successfully Added";
            if($role == 'customer'){
                header('location:'.SITEURL.'admin/manage_customers.php');
            }
            else if($role == 'event_planner'){
                header('location:'.SITEURL.'admin/manage_event_planners.php');
            }
            else{
                header('location:'.SITEURL.'admin/manage_suppliers.php');
            }
        }
        
    }
    /*else{
        ?>
        <script>
            alert("Wrong");
        </script>
        <?php
        $_SESSION['email_used'] = "Email is Already used";
        if($role == 'customer'){
            header('location:'.SITEURL.'admin/manage_customers.php');
        }
        else if($role == 'event planner'){
            header('location:'.SITEURL.'admin/manage_event_planners.php');
        }
        else{
            header('location:'.SITEURL.'admin/manage_suppliers.php');
        }
        
    
    }*/


?>