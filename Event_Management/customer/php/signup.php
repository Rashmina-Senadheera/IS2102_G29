<?php 


if(isset($_POST['fname']) && 
   isset($_POST['uname']) && 
   isset($_POST['pass'])  &&
   isset($_POST['tel']) 
   ){

    include "../db_conn.php";

    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $tel=$_POST['tel'];

    $data = "fname=".$fname."&uname=".$uname."&tel=".$tel;
    
    if (empty($fname)) {
    	$em = "Full name is required";
    	header("Location: ../register.php?error=$em&$data");
	    exit;
    }else if(empty($uname)){
    	$em = "User name is required";
    	header("Location: ../register.php?error=$em&$data");
	    exit;

    }else if(empty($pass)){
    	$em = "Password is required";
    	header("Location: ../register.php?error=$em&$data");
	    exit;

      }else if(empty($tel)){
         $em = "Telephone Number is required";
         header("Location: ../register.php?error=$em&$data");
         exit;
    }else {
      // hashing the password
      $pass = password_hash($pass, PASSWORD_DEFAULT);

      if (isset($_FILES['pp']['name']) AND !empty($_FILES['pp']['name'])) {
         
         
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
               $sql = "INSERT INTO users(fname, username,password, pp,tel) 
                 VALUES(?,?,?,?,?)";
               $stmt = $conn->prepare($sql);
               $stmt->execute([$fname, $uname, $pass,$new_img_name,$tel]);

               header("Location: ../login.php?success=Your account has been created successfully");
                exit;
            }else {
               $em = "You can't upload files of this type";
               header("Location: ../register.php?error=$em&$data");
               exit;
            }
         }else {
            $em = "unknown error occurred!";
            header("Location: ../register.php?error=$em&$data");
            exit;
         }

        
      }else {
       	$sql = "INSERT INTO users(fname, username, password,pp,tel) 
       	        VALUES(?,?,?,?)";
       	$stmt = $conn->prepare($sql);
       	$stmt->execute([$fname, $uname, $pass,$tel,]);

       	header("Location: ../register.phpsuccess=Your account has been created successfully");
   	    exit;
      }
    }


}else {
	header("Location: ../index.php?error=error");
	exit;
}
