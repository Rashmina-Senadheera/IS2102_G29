<?php
    include("../../constants.php");
    
   
    
    $sql = "SELECT * FROM user WHERE role='event_planner'";
    $res = mysqli_query($conn,$sql);
    if($res==TRUE){
        $count = mysqli_num_rows($res);
        $num = 1;
        $output = "";
        if($count >0){
            while($rows = mysqli_fetch_assoc($res)){
                $id = $rows['user_id'];
                $name = $rows['name'];
                $email = $rows['email'];
                

                $output .=  '<tr>
                            <td>'.$num++.'</td>
                            <td>'.$name.'</td>
                            <td>'.$email .'</td>
                            <td class="action_buttons">
                            <span class="btn btn_more">
                                <img src="../images/more.png" class="more_icon">
                                    <a class="btn_info" href="'.SITEURL.'admin/customer_info.php" >More Info</a>
                            </span>
                            <span class="btn btn_update">
                            <img src="../images/update.png" class="update_icon">
                            <a href="'.SITEURL.'admin/php/customer_update.php?id='.$id.'" >Update</a>
                            </span>                                                                             
                            <span class="btn btn_delete">
                            <img src="../images/delete.png" class="delete_icon">
                            <a  href="'.SITEURL.'admin/php/customer_delete.php?id='.$id.'" >Delete</a>                                        
                            </span>                                                                                                                                 
                            </td>
                            </tr>        ';
            }
        }
        echo $output;
    }
    
    
?>
                                  


                                            
                                            
                                                                                                                          