<?php 
    include('../../constants.php');
    require_once('../../controllers/commonFunctions.php');
    date_default_timezone_set('Asia/Colombo');
    $req_date = date('d-m-Y');
    $date = strtotime($req_date);
    $event_type_fill = $no_pax_fill= $theme_fill = $date_fill= $budget_fill= $time_fill=  FALSE;
    global $error;
    
    // $event_type = $no_pax = $theme = $from_date = $to_date = $min_budget = $max_budget = $from_time=$to_time = $venue = $venue_type = $indoor = $outdoor = $indoor_remarks = $outdoor_remarks = $food = $food_availability=$food_pref = $food_remarks =$sound = $sound_type = $light = $light_type = $sound_light_remarks = $photo = $photo_pref = $video = $video_pref = $photo_video_remarks = "";

    $event_type = mysqli_real_escape_string($conn,checkInput($_POST['event-type']));
    $no_pax = mysqli_real_escape_string($conn,checkInput($_POST['no-pax']));
    $theme = mysqli_real_escape_string($conn,checkInput($_POST['theme']));
    $from_date = mysqli_real_escape_string($conn,checkInput($_POST['from-date']));
    // $from_date = date('Y-m-d',strtotime($from_date)) ;
    $to_date = mysqli_real_escape_string($conn,checkInput($_POST['to-date']));
    $min_budget = mysqli_real_escape_string($conn,checkInput($_POST['min-budget']));
    $max_budget = mysqli_real_escape_string($conn,checkInput($_POST['max-budget']));
    $from_time = mysqli_real_escape_string($conn,checkInput($_POST['from-time']));
    $to_time = mysqli_real_escape_string($conn,checkInput($_POST['to-time']));
    $additional_remarks = mysqli_real_escape_string($conn,checkInput($_POST['additional_remarks']));


    //event type
    if(!empty($event_type)){
        $event_type_fill = TRUE;
    }
    else{
       echo " event_type_error";
       $error = TRUE;
    }


    //no. of participants
    if(!empty($no_pax)){
        $no_pax_fill = TRUE;
    }
    else{
        echo " no_pax_error";
        $error = TRUE;
    }

    //theme
    if(!empty($theme)){
        $theme_fill = TRUE;          
                                
    }
    else{
        echo " theme_error";
        $error = TRUE;
    }




    //date
    if(!empty($from_date) && !empty($to_date)){
        if(strtotime($from_date) > $date){
            if(strtotime($to_date) > $date  && strtotime($to_date) > strtotime($from_date)){
                $date_fill = TRUE;
            
            }
            else{
                echo "to_date_error";
                $error = TRUE;

            }
            
        }
        else{
            echo " from_date_error";
            $error = TRUE;

        }
        
       
    }
    else{
        echo " date_error";
        $error = TRUE;
    }


    //budget
    if(!empty($min_budget) && !empty($max_budget)){
        if($min_budget > $max_budget){
            echo " min_budget_error";
            $error = TRUE;
        }else{
            $budget_fill = TRUE;
        }        
                                        
    }
    else{
        echo " budget_error";
        $error = TRUE;
    }

    //time
    if(!empty($from_time) && !empty($to_time)){
        $time_fill = TRUE;                           
    }
    else{
        echo " time_error";
        $error = TRUE;
    }
    // if($error == TRUE){
    //     echo " error";
    // }
    
    

    

    

    
   //venue
   if(isset($_POST['venue'])){
        $venue = mysqli_real_escape_string($conn,checkInput($_POST['venue']));
        $indoor_remarks = mysqli_real_escape_string($conn,checkInput($_POST['indoor_remarks']));
        $outdoor_remarks = mysqli_real_escape_string($conn,checkInput($_POST['outdoor_remarks']));
        
        if($venue == "Venue_Needed"){
            
            //venue_type
            if(isset($_POST['venue_type'])){
                $venue_type = mysqli_real_escape_string($conn,checkInput($_POST['venue_type']));
                


                //indoor
                if($venue_type == "indoor"){
                    if(isset($_POST['indoor'])){
                        $indoor = mysqli_real_escape_string($conn,checkInput($_POST['indoor']));
                        $venue_indoor_fill = TRUE;
                        $venue_outdoor_fill = FALSE; 

                        
                    }
                    else{
                        if(empty($indoor_remarks)){
                            echo " indoor_remarks_error"; 
                        }
                        
                        
                    }
                }

                //outdoor
                else if($venue_type == "outdoor"){

                    if(isset($_POST['outdoor'])){
                        $outdoor = mysqli_real_escape_string($conn,checkInput($_POST['outdoor']));
                        $venue_outdoor_fill = TRUE;
                        $venue_indoor_fill = FALSE;


                        
                    }else{
                        if(empty($outdoor_remarks) ){
                            echo " outdoor_remarks_error";
                           
                        }
                        
                    }
                }

            }else{
                //venue type not selected
                if(empty($indoor_remarks) && empty($outdoor_remarks)){
                    echo " venue_type_error";
                    
                   
                }
                else{
                    if(!empty($indoor_remarks)){
                        $venue_indoor_fill = TRUE;
                        $venue_outdoor_fill = FALSE; 
                    }
                    else if(!empty($outdoor_remarks)){
                        $venue_outdoor_fill = TRUE;
                        $venue_indoor_fill = FALSE;

                        
                    }
                    
                }
            }
            
        }
        else{
            //venue_not_needed
        }

        
    }else{
        //venue not selected
        echo " venue_error";
    }

    //food
    if(isset($_POST['food'])){
        $food = mysqli_real_escape_string($conn,checkInput($_POST['food']));
        $food_remarks = mysqli_real_escape_string($conn,checkInput($_POST['food_remarks']));
        $food_availability = mysqli_real_escape_string($conn,checkInput($_POST['food-availability']));
        $food_type = mysqli_real_escape_string($conn,checkInput($_POST['food-type']));
        $food_pref = mysqli_real_escape_string($conn,checkInput($_POST['food-pref']));


        if($food == "food_bev_needed"){

            
            if(empty($food_availability) && empty($food_type) && empty($food_pref)){
                if(empty($food_remarks)){
                    echo " food_remarks_error";
                }else{
                    $food_filled = TRUE;

                }
            }else{
                

            }

        }
        else{
            //food and bev not needed
        }
        
    }
    else{
        //food and bev not selected
        echo " food_error";
    }


    //sound and light
    if(isset($_POST['s_l'])){
        $sound_light = mysqli_real_escape_string($conn,checkInput($_POST['s_l']));
        $sound_light_remarks = mysqli_real_escape_string($conn, checkInput($_POST['s_l_remarks']));
        

        if($sound_light == 's_l_needed'){

            if(isset($_POST['sound'])){
                $sound = mysqli_real_escape_string($conn,checkInput($_POST['sound']));
                if($sound == 's_needed'){
                    $sound_type = mysqli_real_escape_string($conn,checkInput($_POST['sound-type']));
                    $sound_type_fill = TRUE;

                }else{
                    //sound not needed
                }
            }
            else{
                //sound not selected
            }
            if(isset($_POST['light'])){
                $light = mysqli_real_escape_string($conn,checkInput($_POST['light']));
                if($light == 'l_needed'){
                    $light_type[] = mysqli_real_escape_string($conn,checkInput($_POST['light_type']));
                    $light_type = implode(" ", $light_type);
                    $light_type_fill = TRUE;


                }
                else{
                    //light not needed
                }
                

            }else{
                //light not selected
            }
            


            if(isset($_POST['sound']) && isset($_POST['light'])){
                
            }
            else{
                if(empty($sound_light_remarks)){
                    echo " s_l_remarks_error";
                }
                else{
                }

            }
        }else{
            //sound and light not needed
        }

    }
    else{
        //sound_light not selected
        echo " s_l_error";
    }



    //photography and videography 

    if(isset($_POST['pv'])){
        $pv = mysqli_real_escape_string($conn,checkInput($_POST['pv']));
        $photo_video_remarks = mysqli_real_escape_string($conn,checkInput($_POST['p_v_remarks']));

        if($pv == "p_v_needed"){
            //photo
            if(isset($_POST['photo'])){
                $photo = mysqli_real_escape_string($conn,checkInput($_POST['photo']));
                if($photo == "photo_needed"){
                    $photo_pref = mysqli_real_escape_string($conn,checkInput($_POST['photo_pref']));
                    if(empty($photo_pref)){
        
                        if(empty($photo_video_remarks)){
                            echo " photo_pref_error";

                        }
                        else{
                            $photo_fill = TRUE;
                            
                        }


                    }else{
                        $photo_fill = TRUE;
                    }

                }else{
                    //photo not needed
                }
        
            }else{
                //photo not selected
            }

            //video 
            if(isset($_POST['video'])){
                $video = mysqli_real_escape_string($conn,checkInput($_POST['video']));
                if($video == "video_needed"){
                    $video_pref = mysqli_real_escape_string($conn,checkInput($_POST['video_pref']));
                    if(empty($video_pref)){
                        
                        // $photo_video_remarks = mysqli_real_escape_string($conn,checkInput($_POST['p_v_remarks']));
                        if(empty($photo_video_remarks)){
                            echo " video_pref_error";
                        }
                        else{
                            $video_fill = TRUE;
                        }

                    }else{
                        $video_fill = TRUE;
                        
                    }

                }else{
                    //video not needed
                }

            }else{
                //video not selected
            }
            if(isset($_POST['photo']) && isset($_POST['video'])){
                // $photo_video_remarks = mysqli_real_escape_string($conn,checkInput($_POST['p_v_remarks']));
                
                

            }else{
                if(empty($photo_video_remarks)){
                    echo " p_v_remarks_error";
                }
                else{
                    
                }
            }



            
        }else{
            //photo and video not needed
        }
    }else{
        //photo and video not selected
        echo " p_v_error";
    }

    $additional_remarks = mysqli_real_escape_string($conn, checkInput($_POST['additional_remarks']));
    
    if(empty($additional_remarks)){

    }
    else{

    }

    //no errors 
    if($error == FALSE){
        echo "success";
    }
    else{

    }

    if($event_type_fill && $no_pax_fill && $theme_fill && $date_fill && $time_fill && $budget_fill && ($venue_indoor_fill || $venue_outdoor_fill) ){
        echo " filled";
   


        $sql1 = "INSERT INTO `cust_req_general`(`event_type`, `no_of_pax`, `theme`, `from_date`, `to_date`, `min_budget`, `max_budget`, `from_time`, `to_time`, `remarks`) VALUES (?,?,?,?,?,?,?,?,?,?) ";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("sissssssss",$event_type,$no_pax,$theme,$from_date,$to_date,$min_budget,$max_budget,$from_time,$to_time,$additional_remarks);
        $res1 = $stmt1->execute();
        if($res1){
            echo " details_added";
        }
        else{
            echo " error_in_details_add";
        }  
        
        // $sql = "SELECT max(request_id) FROM `cust_req_general` ";
        // $res = mysqli_query($conn, $sql3);
        // if($res){
        //     $id = mysqli_fetch_assoc($res);
        // }
        
        $sql2 =  "INSERT INTO `cust_req_venue`(`venue`, `remarks`) VALUES (?,?)";
        $stmt2 = $conn->prepare($sql2);
        if($venue_outdoor_fill){
            $stmt2->bind_param("ss",$outdoor,$outdoor_remarks);
        }
        if($venue_indoor_fill){
            $stmt2->bind_param("ss", $indoor,$indoor_remarks);
        }
        
        $res2 = $stmt2->execute();
        if($res2){
            echo " venue_added";
        }
        else{
            echo " venue_adding_failed";
        }
    }
    else{
        echo " error";
    }
    












    
  





?>