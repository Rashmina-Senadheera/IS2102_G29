<?php 
    
    include_once("../constants.php");
    $sql = "SELECT * FROM user WHERE role = 'event_planner' LIMIT 4";
    $res = mysqli_query($conn, $sql);
    $output = "";

    
    if(mysqli_num_rows($res)>0){
        while($row = mysqli_fetch_assoc($res)){
            
            $output .= '<div class="card">
                            <img src="images/evt_planner.jfif" >
                            <span class="name_rating">
                                <h4>'.$row['name'].'</h4>
                            </span>
                            <span class="rating">
                                <a>★★★★</a>
                                <a href="#" class="btn_contact btn">Contact </a>
                            </span>
                        </div>';
        }
        
    }
    echo $output;

?>