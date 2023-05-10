<?php 
    
    include_once("../constants.php");
    $sql = "SELECT * FROM user WHERE role = 'event_planner'";
    $res = mysqli_query($conn, $sql);
    $output = "";

    
    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
            
            $output .= '<span class="card">
                            <img src="../images/evt_planner.jfif" >
                            <span class="name_rating">
                            <h4>'.$row['name'].'</h4>
                            
                            </span>
                            
                            <span class="flex-row-center">
                                <span class="flex-column">
                                    <a>★★★★</a>
                                    <label>Category</label>
                                </span>
                            
                            <a href="event_planner_info.php?id='.$row['user_id'].'" class="btn_view btn">View </a>
                            </span>
                        </span>';
        }
        
    }
    echo $output;

?>