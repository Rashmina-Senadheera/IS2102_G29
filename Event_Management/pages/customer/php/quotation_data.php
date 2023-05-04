<?php 
    include('../../constants.php');
    require_once('../../controllers/commonFunctions.php');
    date_default_timezone_set('Asia/Colombo');
    $req_date = date('d-m-Y');
    $date = strtotime($req_date);
    $event_type_fill = $no_pax_fill= $theme_fill = $date_fill= $budget_fill= $time_fill=  FALSE;
    global $error;
    
    // $event_type = $no_pax = $theme = $from_date = $to_date = $min_budget = $max_budget = $from_time=$to_time = $venue = $venue_type = $indoor = $outdoor = $indoor_remarks = $outdoor_remarks = $food = $food_availability=$food_pref = $food_remarks =$sound = $sound_type = $light = $light_type = $sound_light_remarks = $photo = $photo_pref = $video = $video_pref = $photo_video_remarks = "";

    $evt_id = $_SESSION['evt_id'];
    $cust_id = $_SESSION['user_id'];

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
       $event_type_fill = FALSE;
       $error = TRUE;
    }


    //no. of participants
    if(!empty($no_pax)){
        $no_pax_fill = TRUE;
    }
    else{
        echo " no_pax_error";
        $no_pax_fill = FALSE;

        $error = TRUE;
    }

    //theme
    if(!empty($theme)){
        $theme_fill = TRUE;          
                                
    }
    else{
        echo " theme_error";
        $error = TRUE;
        $theme_fill = FALSE;          

    }




    //date
    if(!empty($from_date) && !empty($to_date)){
        if(strtotime($from_date) > $date){
            if(strtotime($to_date) > $date  && strtotime($to_date) > strtotime($from_date)){
                $date_fill = TRUE;
            
            }
            else{
                echo "to_date_error";
                $date_fill = FALSE;

                // $error = TRUE;

            }
            
        }
        else{
            echo " from_date_error";
            // $error = TRUE;
            $date_fill = FALSE;


        }
        
       
    }
    else{
        echo " date_error";
        $date_fill = FALSE;

        // $error = TRUE;
    }


    //budget
    if(!empty($min_budget) && !empty($max_budget)){
        if($min_budget > $max_budget){
            echo " min_budget_error";
            
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
        $time_fill = FALSE;                           

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
                        $error = FALSE;


                        
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
                        $error = FALSE;
                        


                        
                    }else{
                        if(empty($outdoor_remarks) ){
                            echo " outdoor_remarks_error";
                            $error = TRUE;

                           
                        }
                        
                    }
                }

            }else{
                //venue type not selected
                if(empty($indoor_remarks) && empty($outdoor_remarks)){
                    echo " venue_type_error";
                    $venue_outdoor_fill = FALSE;
                    $venue_indoor_fill = FALSE;


                    
                   
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
            $venue_outdoor_fill = FALSE;
            $venue_indoor_fill = FALSE;
            $error = FALSE;

        }

        
    }else{
        //venue not selected
        echo " venue_error";
        $venue_outdoor_fill = FALSE;
        $venue_indoor_fill = FALSE;
        $error = TRUE;

    }

    //food
    if(isset($_POST['food'])){
        $food = mysqli_real_escape_string($conn,checkInput($_POST['food']));
        $food_remarks = mysqli_real_escape_string($conn,checkInput($_POST['food_remarks']));
        $food_availability = mysqli_real_escape_string($conn,checkInput($_POST['food-availability']));
        $food_type = mysqli_real_escape_string($conn,checkInput($_POST['food-type']));
        $food_pref = mysqli_real_escape_string($conn,checkInput($_POST['food-pref']));


        if($food == "food_bev_needed"){

            
            if(empty($food_availability) && empty($food_type) && empty($food_pref) && empty($food_remarks) ){
                    echo " food_remarks_error";
                
            }else{
                $food_fill = TRUE;
                $error = FALSE;
                

            }

        }
        else{
            //food and bev not needed
            $food_fill = FALSE;
            $error = FALSE;


        }
        
    }
    else{
        //food and bev not selected
        echo " food_error";
        $food_fill = FALSE;
        $error = TRUE;

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
                    $sound_type_fill = FALSE;
                    $error = FALSE;


                }
            }
            else{
                $sound_type_fill = FALSE;
                // $error = TRUE;


                //sound not selected
            }
            if(isset($_POST['light'])){
                $light = mysqli_real_escape_string($conn,checkInput($_POST['light']));
                if($light == 'l_needed'){
                    $light_type = $_POST['light_type'];
                    $light_type = implode(" ", $light_type);
                    $light_type_fill = TRUE;


                }
                else{
                    //light not needed
                    $light_type_fill = TRUE;
                    $error = FALSE;


                }
                

            }else{
                $light_type_fill = FALSE;
                // $error = TRUE;

                //light not selected

            }
            


            if(isset($_POST['sound']) && isset($_POST['light'])){
                
            }
            else{
                if(empty($sound_light_remarks)){
                    echo " s_l_remarks_error";
                    $light_type_fill = FALSE;
                    $sound_type_fill = FALSE;



                }
                else{
                    $error = FALSE;
                    
                }

            }
        }else{
            //sound and light not needed
            $light_type_fill = FALSE;
            $sound_type_fill = FALSE;
            $error = FALSE;

        }

    }
    else{
        //sound_light not selected
        echo " s_l_error";
        $light_type_fill = FALSE;
        $sound_type_fill = FALSE;
        $error = TRUE;
        
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
                            $error = FALSE;
                            
                        }


                    }else{
                        $photo_fill = TRUE;
                    }

                }else{
                    //photo not needed
                    $photo_fill = FALSE;
                    $error = FALSE;
                    
                }
        
            }else{
                //photo not selected
                $photo_fill = FALSE;

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
                    $video_fill = FALSE;
                    $error = FALSE;


                }

            }else{
                //video not selected
                $video_fill = FALSE;

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
            $photo_fill = FALSE;
            $video_fill = FALSE;
            $error = FALSE;


        }
    }else{
        //photo and video not selected
        echo " p_v_error";
        $photo_fill = FALSE;
        $video_fill = FALSE;
        $error = TRUE;

    }

    $additional_remarks = mysqli_real_escape_string($conn, checkInput($_POST['additional_remarks']));
    
    if(empty($additional_remarks)){

    }
    else{

    }

    
    

    if($event_type_fill && $no_pax_fill && $theme_fill && $date_fill && $time_fill && $budget_fill ){
        if($error == FALSE){
        $sql1 = "INSERT INTO `cust_req_general`(`event_type`, `no_of_pax`, `theme`, `from_date`, `to_date`, `min_budget`, `max_budget`, `from_time`, `to_time`, `remarks`) VALUES (?,?,?,?,?,?,?,?,?,?) ";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("sissssssss",$event_type,$no_pax,$theme,$from_date,$to_date,$min_budget,$max_budget,$from_time,$to_time,$additional_remarks);
        $res1 = $stmt1->execute();
        $id = mysqli_insert_id($conn);
        if($res1){
            echo " good";
        }
        else{
            echo " error_in_details_add";
        }  
        
        if($venue_indoor_fill || $venue_outdoor_fill){
        
            $sql2 =  "INSERT INTO `cust_req_venue`(`request_id`, `venue`, `remarks`) VALUES (?,?,?)";
            $stmt2 = $conn->prepare($sql2);
            if($venue_outdoor_fill){
                $stmt2->bind_param("iss",$id, $outdoor,$outdoor_remarks);
            }
            if($venue_indoor_fill){
                $stmt2->bind_param("iss",$id, $indoor,$indoor_remarks);
            }
            
            $res2 = $stmt2->execute();
            if($res2){
                echo " venue_added";
            }
            else{
                echo " venue_adding_failed";
            }
        }

        if($food_fill){
            $sql3 = "INSERT INTO `cust_req_food`(`request_id`, `available_in`, `available_at`, `preferences`, `remarks`) VALUES (?,?,
            ?,?,?)";
            $stmt3 = $conn->prepare($sql3);
            $stmt3->bind_param("issss",$id,$food_availability,$food_type ,$food_pref, $food_remarks);
            $res3 = $stmt3->execute();
            if($res3){
                echo " food_added";
            }
            else{
                echo " food_added_error";
            }
        }

        if($sound_type_fill || $light_type_fill){
            $sql4 = "INSERT INTO `cust_req_sl`(`request_id`, `sound_type`, `light_type`, `remarks`) VALUES (?,?,?,?)";
            $stmt4 = $conn->prepare($sql4);
            $stmt4->bind_param("isss", $id,$sound_type, $light_type, $sound_light_remarks);
            $res4 = $stmt4->execute();
            if($res4){
                echo " sound_light_added";
            }
            else{
                echo " sound_light_add_error";
            }


        }

        if($photo_fill || $video_fill){
            $sql5 = "INSERT INTO `cust_req_pv`(`request_id`, `photo_pref`, `video_pref`, `remarks`) VALUES (?,?,?,?)";
            $stmt5 = $conn->prepare($sql5);
            $stmt5->bind_param("isss",$id,$photo_pref,$video_pref,$photo_video_remarks);
            $res5 = $stmt5->execute();
            if($res5){
                echo " photo_video_added";
            }else{
                echo " photo_video_not_added";
            }
            
        }

        $sql6 = "INSERT INTO `request_ep_quotation`(`request_id`,`customer_id`, `EP_id`) VALUES (?,?,?)";
        $stmt6 = $conn->prepare($sql6);
        $stmt6->bind_param("iii",$id,$cust_id,$evt_id);
        $res6 = $stmt6->execute();
        if($res6){
            echo " good";
        }else{
            echo " final_error";
        }



        if($error == FALSE){
            echo " success";
        }
        else if($error == TRUE){
            echo " error";
        }


        }
    }
    else{
        echo " error";
    }
    
    












    
  





?>