<?php 
    include('../../constants.php');
    $id = mysqli_real_escape_string($conn,$_GET['id']); 
    $sql = "SELECT * 
    FROM `supplier_booking`
    JOIN `ep_booking`
    ON supplier_booking.payment_id = ep_booking.payment_id
    WHERE (supplier_booking.EP_id = $id OR
    supplier_booking.supplier_id = $id OR
    ep_booking.customer_id = $id) AND 
    (supplier_booking.status = 'Pending' OR supplier_booking.status = 'Ongoing')";
    

    
    $res = mysqli_query($conn,$sql);
    
    if($res){
        
        if($row = mysqli_fetch_assoc($res)){
            
            $_SESSION['delete-error'] = "The user has ongoing or pending events";
            echo "<script>history.back();</script>";
            
        }else{
            $delete_sql = "DELETE FROM `user` WHERE user_id=$id";
            $delete_res = mysqli_query($conn,$delete_sql);

            if($delete_res){
                $_SESSION['user-deleted'] = "User deleted successfully";
                echo "<script>history.back();</script>";
            }else{
                echo mysqli_error($conn);
            }
        }
        

    }else{
        echo "No res";
    }
    



?>