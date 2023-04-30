<?php
session_start();
if(isset($_GET['method'])){
    
    $method =$_GET['method'];
    if($method =="loadData"){
        $USERNAME=$_SESSION['user_name_loggedin'];
        LoadData($USERNAME);
    }
    //update
    if($method =="update"){
        $USERNAME=$_SESSION['user_name_loggedin'];
        $NAME = $_POST['NAME'];
        $EMAIL = $_POST['EMAIL'];
        $NIC = $_POST['NIC'];
        $PHONE_NUMBER = $_POST['PHONE_NUMBER'];
        $ADDRESS = $_POST['ADDRESS'];
        $BIO = $_POST['BIO'];
        UpdateCustomer($NAME,$EMAIL,$NIC,$PHONE_NUMBER,$ADDRESS,$BIO,$USERNAME);
    }

    if($method =="updatePW"){
        $USERNAME=$_SESSION['user_name_loggedin'];
        $NEW_PASSWORD = $_POST['NEW_PASSWORD'];
        $OLD_PASSWORD = $_POST['OLD_PASSWORD'];    
        ChangePassword($NEW_PASSWORD,$OLD_PASSWORD,$USERNAME);
    }
}

function LoadData($USERNAME) {
    $conn = mysqli_connect("localhost", "root", "", "eventra");
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$USERNAME'");


    //create an array to hold the data
    $data = array();

    //loop through the results and add them to the array
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

   echo json_encode($data);
}

function UpdateCustomer($NAME,$EMAIL,$NIC,$PHONE_NUMBER,$ADDRESS,$BIO,$USERNAME){
               $conn = mysqli_connect("localhost", "root", "", "eventra");
               // Insert into Database

               $sql = "UPDATE users SET fname='$NAME',nic='$NIC',address='$ADDRESS',bioo='$BIO',tel='$PHONE_NUMBER' WHERE username='$USERNAME'";
               echo $sql;
               if(mysqli_query($conn, $sql)){
                   echo "Record was updated successfully.";
               } else {
                   echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
               } 
               mysqli_close($conn);
            }

function ChangePassword($NEW_PASSWORD,$OLD_PASSWORD,$USERNAME){
    $conn = mysqli_connect("localhost", "root", "", "eventra");
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$USERNAME'");

    $data = array();

    //loop through the results and add them to the array
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }


      $username =  $data[0]['username'];
      $password =  $data[0]['password'];
     

      if($username === $USERNAME){
    
        if(password_verify($OLD_PASSWORD, $password)){
            $pass = password_hash($NEW_PASSWORD, PASSWORD_DEFAULT);
            echo $pass;
            $sqlUp = "UPDATE users SET password='$pass' WHERE username='$USERNAME'";
            if(mysqli_query($conn, $sqlUp)){
                echo "Password was updated successfully.";
            } else {
                echo "ERROR: Could not able to execute $sqlUp. " . mysqli_error($conn);
            } 
            mysqli_close($conn);
        }else{
            echo "Incorrect Password";
        }


      }else {
        echo "Incorrect Password";  
     }
}

if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {

    $USERNAME=$_SESSION['user_name_loggedin'];
    $img_name = $_FILES['pp']['name'];
    $tmp_name = $_FILES['pp']['tmp_name'];
    $error = $_FILES['pp']['error'];
    
    if($error === 0){
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_to_lc = strtolower($img_ex);

        $allowed_exs = array('jpg', 'jpeg', 'png');
        if(in_array($img_ex_to_lc, $allowed_exs)){
            $new_img_name = uniqid($uname, true).'.'.$img_ex_to_lc;
            $img_upload_path = '../upload/'.$new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            // Insert into Database
            $conn = mysqli_connect("localhost", "root", "", "eventra");
            // Insert into Database

            $sql = "UPDATE users SET pp='$new_img_name' WHERE username='$USERNAME'";
            echo $sql;
            if(mysqli_query($conn, $sql)){
                echo "Record was updated successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            } 
            mysqli_close($conn);

            header("Location: ../Profile.php?success=Your account has been created successfully");
            exit;
        }else {
            $em = "You can't upload files of this type";
            header("Location: ../sign_up.php?error=$em&$data");
            exit;
        }
    }else {
        $em = "unknown error occurred!";
        header("Location: ../sign_up.php?error=$em&$data");
        exit;
    }

    
    }
?>
