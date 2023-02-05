<?php 
    include('../../constants.php');
    require_once('../../controllers/commonFunctions.php');
    date_default_timezone_set('Asia/Colombo');
    $date = strtotime(date('m-d-Y'));

    
    // $event_type = $no_pax = $theme = $from_date = $to_date = $min_budget = $max_budget = $from_time=$to_time = $venue = $venue_type = $indoor = $outdoor = $indoor_remarks = $outdoor_remarks = $food = $food_availability=$food_pref = $food_remarks =$sound = $sound_type = $light = $light_type = $sound_light_remarks = $photo = $photo_pref = $video = $video_pref = $photo_video_remarks = "";

    $event_type = mysqli_real_escape_string($conn,checkInput($_POST['event-type']));
    $no_pax = mysqli_real_escape_string($conn,checkInput($_POST['no-pax']));
    $theme = mysqli_real_escape_string($conn,checkInput($_POST['theme']));
    $from_date = mysqli_real_escape_string($conn,checkInput($_POST['from-date']));
    $to_date = mysqli_real_escape_string($conn,checkInput($_POST['to-date']));
    $min_budget = mysqli_real_escape_string($conn,checkInput($_POST['min-budget']));
    $max_budget = mysqli_real_escape_string($conn,checkInput($_POST['max-budget']));
    $from_time = mysqli_real_escape_string($conn,checkInput($_POST['from-time']));
    $to_time = mysqli_real_escape_string($conn,checkInput($_POST['to-time']));

    //venue
    if(isset($_POST['venue'])){
        $venue = mysqli_real_escape_string($conn,checkInput($_POST['venue']));

        //venue_type
        if(isset($_POST['venue_type'])){
            $venue_type = mysqli_real_escape_string($conn,checkInput($_POST['venue_type']));

            //indoor
            if($venue_type == "indoor"){
                if(isset($_POST['indoor'])){
                    $indoor = mysqli_real_escape_string($conn,checkInput($_POST['indoor']));
                    $indoor_remarks = mysqli_real_escape_string($conn,checkInput($_POST['indoor_remarks']));
                }
            }

            //outdoor
            else if($venue_type == "outdoor"){
                if(isset($_POST['outdoor'])){
                    $outdoor = mysqli_real_escape_string($conn,checkInput($_POST['outdoor']));
                    $outdoor_remarks = mysqli_real_escape_string($conn,checkInput($_POST['outdoor_remarks']));
                }
            }
        }
    }
    
    // $venue_type = mysqli_real_escape_string($conn,checkInput($_POST['venue_type']));
    // $indoor = mysqli_real_escape_string($conn,checkInput($_POST['indoor']));
    // $outdoor = mysqli_real_escape_string($conn,checkInput($_POST['outdoor']));
    // $indoor_remarks = mysqli_real_escape_string($conn,checkInput($_POST['indoor_remarks']));
    // $outdoor_remarks = mysqli_real_escape_string($conn,checkInput($_POST['outdoor_remarks']));


    //food
    if(isset($_POST['food'])){
        $food = mysqli_real_escape_string($conn,checkInput($_POST['food']));
        $food_availability = mysqli_real_escape_string($conn,checkInput($_POST['food-availability']));
        $food_type = mysqli_real_escape_string($conn,checkInput($_POST['food-type']));
        $food_pref = mysqli_real_escape_string($conn,checkInput($_POST['food-pref']));
        $food_remarks = mysqli_real_escape_string($conn,checkInput($_POST['food_remarks']));
    }


    // $food = mysqli_real_escape_string($conn,checkInput($_POST['food']));
    // $food_availability = mysqli_real_escape_string($conn,checkInput($_POST['food-availability']));
    // $food_type = mysqli_real_escape_string($conn,checkInput($_POST['food-type']));
    // $food_pref = mysqli_real_escape_string($conn,checkInput($_POST['food-pref']));
    // $food_remarks = mysqli_real_escape_string($conn,checkInput($_POST['food_remarks']));

    //sound

    // $sound = mysqli_real_escape_string($conn,checkInput($_POST['sound']));
    // $sound_type = mysqli_real_escape_string($conn,checkInput($_POST['sound-type']));
    // $light = mysqli_real_escape_string($conn,checkInput($_POST['light']));
    // $light_type = mysqli_real_escape_string($conn,checkInput($_POST['light_type']));
    // $sound_light_remarks = mysqli_real_escape_string($conn,checkInput($_POST['sound_light_reamrks']));
    // $photo = mysqli_real_escape_string($conn,checkInput($_POST['photo']));
    // $photo_pref = mysqli_real_escape_string($conn,checkInput($_POST['photo_pref']));
    // $video = mysqli_real_escape_string($conn,checkInput($_POST['video']));
    // $video_pref = mysqli_real_escape_string($conn,checkInput($_POST['video_pref']));
    // $photo_video_remarks = mysqli_real_escape_string($conn,checkInput($_POST['photo_video_remarks']));

    if(!empty($event_type) || !empty($no_pax) || !empty($theme) || !empty($from_date) || !empty($to_date) || !empty($min_budget) || !empty($max_budget) || !empty($from_time) || !empty($to_time) ){
        if(!empty($event_type)){
            if(!empty($no_pax)){
                if(!empty($theme)){
                    if(!empty($from_date) && !empty($to_date)){
                        if(strtotime($from_date) > $date){
                            if(strtotime($to_date) > $date  && strtotime($to_date) > strtotime($from_date)){
                                if(!empty($min_budget) && !empty($max_budget)){
                                    if(!empty($from_time) && !empty($to_time)){
                                        
                                    }
                                    else{
                                        echo "time_error";
                                    }
                                        
                                }
                                else{
                                    echo "budget_error";
                                }
                            
                            }
                            else{
                                echo "to_date_error";
    
                            }
                            
                        }
                        else{
                            echo "from_date_error";

                        }
                        
                       
                    }
                    else{
                        echo "date_error";
                    }
                                
                }
                else{
                    echo "theme_error";
                }
            }
            else{
                echo "no_pax_error";
            }
        }
        else{
           echo "event_type_error"; 
        }
        
    }
    else{
        echo "fields_error";
    }
    

    
    
    
    //Theme
    // if(!empty($theme)){
                    
    // }
    // echo "Theme is required";

    // //from date
    // if(!empty($from_date)){
                       
    // }
    // else{
    //     echo "From date is required";
    // }
    
    // //To date
    // if(!empty($to_date)){
                            
    // }
    // else{
    //     echo "To date is required";
    // }

    // //minimum budget
    // if(!empty($min_budget)){
                                
    // }
    // else{
    //     echo "Minimum Budget is required";
    // }
    // //minimum budget
    // // if(!empty($venue)){
    // //        echo $venue;                     
    // // }
    // // else{
    // //     echo "Venue is required";
    // // }
    
    //     if(!empty($venue_type)){
    //         echo $venue_type;                     
    //     }
    //     else{
    //         echo "No venue";
    //     }
    



















    
  





?>