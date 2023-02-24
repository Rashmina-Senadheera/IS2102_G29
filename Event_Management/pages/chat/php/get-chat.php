<?php 
     include_once("../../constants.php");
    if(isset($_SESSION['user_id'])){
        $outgoing_id = mysqli_real_escape_string($conn, trim($_POST['outgoing_id']));
        $incoming_id = mysqli_real_escape_string($conn, trim($_POST['incoming_id']));
        $output = "";
       
        if(!empty($incoming_id)){
            $sql = "SELECT * FROM messages 
                    INNER JOIN user on user.user_id = messages.sender_id
                    WHERE (receiver_id = {$outgoing_id} AND sender_id = {$incoming_id})
                    OR  (receiver_id = {$incoming_id} AND sender_id = {$outgoing_id}) ORDER BY message_id ASC";
                $query = mysqli_query($conn,$sql);
                // echo json_encode($query);
            
                if(mysqli_num_rows($query)>0){
                    
                        while($row = mysqli_fetch_assoc($query)){
                            if($row['sender_id'] === $outgoing_id){
                                $output .='  <div class="chat outgoing">
                                                <div class="details">
                                                    <p>'.$row['message'].'</p>
                                                </div>
                                            </div>';
                            }else{
                                $output .= '<div class="chat incoming">
                                                <div class="details">
                                                    <p>'.$row['message'].'</p>
                                                </div>
                                            </div>';

                            }
                            
                            
                        }
                    }else{
                        
                        $output .= '<div class="no_message">
                                        <img class="select_user" src="../../images/chat/no_message.png">
                                        <label>No messages</label>
                                    </div>';
                        
                    }
                        
                    
                }else{
                    $output .= '<div class="no_message">
                                    <img class="select_user" src="../../images/chat/select_user.png">
                                    <label>Please select a user</label>
                                </div>';
                }
                
            echo $output;
        }else{
            echo "No Messages";
        }
   

?>