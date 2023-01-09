<?php
    include("../constants.php");
    $emailerr =$pwderr="";
    $email = $password=$error="";
    

    /*if(empty($_POST['email']))
    {
        echo "Email is required";
        $emailerr ="True";
    }
    else{
        $email = mysqli_real_escape_string($conn,$_POST['email']);
    }
    if(empty($_POST['pwd'])){
        echo "Password is required";
        $pwderr = "True";
    }
    else{
        $password = mysqli_real_escape_string($conn,$_POST['pwd']);
    }*/
    $email = mysqli_real_escape_string($conn,$_POST['email']);   
    $password = mysqli_real_escape_string($conn,$_POST['pwd']);

    if(!empty($email)){
        if(!empty($password)){
                $sql = "SELECT * FROM user WHERE email='$email'";
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);
                if($count == 1){
                    
                    $rows = mysqli_fetch_assoc($res);
                    if(password_verify($password, $rows['password'])){
                        if($rows['NIC'] != NULL){
                            $_SESSION['user'] = $rows['name'];
                            $_SESSION['role'] = $rows['role'];
                            $role = $_SESSION['role'];
                            echo "Success";
                            
                        }
                        else{
                            echo "Null"; 
                        }
                        
                    }
                    else{
                        echo "Password is Incorect";
                    }
                    
                    
                    
                }
                else {
                    echo "Email is incorrect";
                }
        }
        else{
            echo "Password is required";
        }
    }
    else{
        echo "Email is Required";
    }

    



?>