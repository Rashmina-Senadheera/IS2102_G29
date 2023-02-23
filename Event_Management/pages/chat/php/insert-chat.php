<?php 
    
    include_once("../../constants.php");

    if(isset($_SESSION['user_id'])){
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){
            // $sql = mysqli_query($conn,"INSERT INTO messages (receiver_id, sender_id, msg) VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
            $sql = "INSERT INTO `messages`(`sender_id`, `receiver_id`, `message`) VALUES ('$outgoing_id','$incoming_id','$message')";
            $res = mysqli_query($conn,$sql);

            if($res){
                echo "damma";
            } 
            else{
                echo "damme na";
            }
             // $sql = "INSERT INTO messages (incoming_id, outgoing_id, msg VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')";
            // $res = mysqli_query($conn,$sql);
            // if($res){
            //     echo "damma";
            // }
            // else{
            //     echo "damme na";
            // }


            
        }
        else{
            echo "Something went wrong";
        }

    }else{
        echo "error";
    }
    

?>