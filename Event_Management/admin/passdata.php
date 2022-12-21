<?php 
    

    include('../constants.php');
    include('email.php');
    /*include('../login_access.php');*/
    $name = mysqli_real_escape_string($conn,check($_POST['name']));
    $pwd = mysqli_real_escape_string($conn,check($_POST['pwd']));
    $email = mysqli_real_escape_string($conn,check($_POST['email']));
    $phone_num = mysqli_real_escape_string($conn,check($_POST['phone_num']));
    $address = mysqli_real_escape_string($conn,check($_POST['address']));
    $role = mysqli_real_escape_string($conn,check($_POST['role']));

    
    if(!empty($name) || !empty($pwd) || !empty($email)){
        if(!empty($name)){
            if(!empty($pwd)){
                if(!empty($email)){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                        /* checking whether email is already in use */
                        $sql2 = "SELECT * from user WHERE email='$email'";
                        $res2 = mysqli_query($conn,$sql2);
                        $count2 = mysqli_num_rows($res2);
                    
                        if($count2>0){
                            echo "Email is already in use";
                        }

                        else{
                        /* inserting data into user table*/
                        $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO user SET
                                email = '$email',
                                name = '$name',
                                password = '$hash_pwd',
                                role = '$role'
                                ";

                        $res = mysqli_query($conn, $sql);   
                        
                        $sql4 = "SELECT * from user WHERE email='$email'";
                        $res4 = mysqli_query($conn,$sql4);
                        if($res4){
                            $row = mysqli_fetch_assoc($res4);
                            $userId = $row['user_id'];
                        
                        
                        /* insert data into relevant table  */ 
                            $sql3 = "INSERT INTO $role (`user_id`) VALUES ('$userId')";
                        
                       
                                smtpmailer($email,$name,$pwd);
                            
                                // $res = mysqli_query($conn, $sql);
                                $res3 = mysqli_query($conn, $sql3);
                                if($res == TRUE && $res3 == TRUE ){
                                echo "Success";
                                $_SESSION['added'] = "Successfully Added";
                                }
                                else{
                                    echo "Something Went Wrong";
                                }
                        }
                        else{
                            echo "Error";
                        }
                        

                            
                        }
                    }
                    else{
                        echo "$email - is an invaild email" ;
                    }
                }
                else{
                    echo "Email is required";
                }
            }
            else{
                echo "Password is required";
            }
        }
        else{
            echo "Username is required";
        }
    }
    else {
        echo "Please fill required fields";
    }
    
    function check($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        //$data = htmlspecialchars($data);
        return $data;
    }

?>