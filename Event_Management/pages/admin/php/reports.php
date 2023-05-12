<?php   $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = mysqli_connect($servername,$username,$password) or die(mysqli_error($conn));
        $db_select = mysqli_select_db($conn, 'eventra') or die(mysqli_error($conn));
        // $sql2 = "SELECT COUNT(user_id) as amount,role FROM user GROUP BY role ORDER BY role asc"; 
        
        // $res2 = mysqli_query($conn,$sql2);
        
        // foreach($res2 as $data){
        //     $amount[] = $data['amount'];
        //     $roles[] = ucfirst($data['role']) ;
    
        // }
        
        

        if(isset($_POST['data'])){
            // $month_year = $_POST['month'];
            $value = $_POST['data'];
            if($value == 'month'){
            $sql3 = "SELECT EP_id,COUNT(EP_id) as quote_num,MONTH(date) as Month FROM `request_ep_quotation` GROUP BY EP_id,Month";

            $res3 = mysqli_query($conn,$sql3);
            $sql4 = "SELECT name FROM `user` INNER JOIN `request_ep_quotation` ON user.user_id = request_ep_quotation.EP_id GROUP BY EP_id";
            $res4 = mysqli_query($conn,$sql4);
            foreach($res3 as $data){
                $ep_id[] = $data['EP_id'];
                $quote_num[] = $data['quote_num'];
                $Month[] = $data['Month'] ;
        
            }
            foreach($res4 as $data){
                $ep[] = $data['name'];
                
        
            }
    
            
            $all_months = array();
            $all_quotes = array();
            
            // print_r($employees_records);
            $vals = array_count_values($ep_id);
            $i=0;
            $x= 0;
            foreach($vals as $data){
              $month = array();
              $num = array();
              $x =$x+$data;
              for($i; $i < $x; $i++){
                array_push($month, $Month[$i]);
                array_push($num, $quote_num[$i]);
                
              }
              $i = $x;
              
              
              
              array_push($all_months, $month);
              array_push($all_quotes, $num);
            }
           
            $final_data = array();
            
    
            for($i=0; $i < count($all_quotes); $i++){
              $sub_data = [0,0,0,0,0,0,0,0,0,0,0,0];
              for($j = 0 ;  $j < count($all_quotes[$i]); $j++ ){
                  $k = $all_months[$i][$j]-1;
                  $sub_data[$k] = $all_quotes[$i][$j];
                    
                  // }else{
                  //   $sub_data[$k] = 0;
                    
                  // }
                  
                
                
                //   echo "<br>";
                
                
              }
             
              array_push($final_data, $sub_data);
              
              
              
            }
            array_push($final_data, $ep);
            array_push($final_data, $Month);



            echo json_encode($final_data);
            // print_r($final_data);
            }
            else if($value == 'ep'){
                $sql3 = "SELECT EP_id,COUNT(EP_id) as quote_num FROM `request_ep_quotation` GROUP BY EP_id";

            $res3 = mysqli_query($conn,$sql3);
            $sql4 = "SELECT name FROM `user` INNER JOIN `request_ep_quotation` ON user.user_id = request_ep_quotation.EP_id GROUP BY EP_id";
            $res4 = mysqli_query($conn,$sql4);
            foreach($res3 as $data){
                $ep_id[] = $data['EP_id'];
                $quote_num[] = $data['quote_num'];
                
        
            }
            foreach($res4 as $data){
                $ep[] = $data['name'];
                
        
            }
    
            
            
            // $all_quotes = array();
            
            // print_r($employees_records);
            // $vals = array_count_values($ep_id);
            // $i=0;
            // $x= 0;
            // foreach($vals as $data){
            //   $month = array();
            //   $num = array();
            //   $x =$x+$data;
            //   for($i; $i < $x; $i++){
            //     array_push($month, $Month[$i]);
            //     array_push($num, $quote_num[$i]);
                
            //   }
            //   $i = $x;
              
              
              
            
           
            $final_data = array();
            array_push($final_data, $quote_num);
            array_push($final_data, $ep);
            



            echo json_encode($final_data);

            }
            else if($value == 'users'){

                $sql2 = "SELECT COUNT(user_id) as amount,role FROM user GROUP BY role ORDER BY role asc"; 
        
                $res2 = mysqli_query($conn,$sql2);
        
                foreach($res2 as $data){
                    $amount[] = $data['amount'];
                    $roles[] = ucfirst($data['role']) ;
            
                }

                $final_data = array();
                array_push($final_data, $amount);
                array_push($final_data, $roles);

                echo json_encode($final_data);


            }
            
            
            
        }else{
            echo json_encode("error");
        }
        
        
?>