<?php 
    include('../constants.php');
    $NIC = $pwd1 = $pwd2 ="";

    $NIC = mysqli_real_escape_string($conn,$_POST['NIC']);   
    $pwd1 = mysqli_real_escape_string($conn,$_POST['pwd1']);
    $pwd2 = mysqli_real_escape_string($conn,$_POST['pwd2']);
    $nicPattern1 = "/^[0-9]{9}[vVxX]$/";
    $nicPattern2 = "/^[0-9]{12}$/";
    $passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.{8,})([a-zA-Z0-9!@#$%^&*()_+=-]*)$/";

    if(isset($_POST['submit'])){
        if(isset($NIC)){
            if(!preg_match($nicPattern1,$NIC) && !preg_match($nicPattern2,$NIC)){
                echo "Enter a valid NIC";
            }
            else{
                if(isset($pwd1)){
                    if(!preg_match($passwordPattern,$pwd1)){
                        if($pwd2){

                        }
                    }
                    else{
                        echo "Password must contain at least 8 characters, at least one uppercase letter, one lowercase letter and one number!";
                    }
                }
                else{
                    echo "Password is required";
                }
            }
        }
        else{
            echo "NIC is required";
        }
    }

    !preg_match($nicPattern1, $nic) && !preg_match($nicPattern2, $nic)

?>