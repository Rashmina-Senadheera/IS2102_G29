<?php 

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: Event_Planner/404.php");
}
else{
    require_once "../constants.php";
    require_once "../admin/email.php";
    
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $remarks = trim($_POST['remarks']);

    if(empty($name)){
        $_SESSION['name-error'] = "Name is Required";
    }

    if(empty($email)){
        $_SESSION['email-error'] = "Email is Required";
    }
    if(empty($subject)){
        $_SESSION['subject-error'] = "Subject is Required";
    }
    if(empty($remarks)){
        $_SESSION['remarks-error'] = "Remarks is Required";
    }

    if(
        $_SESSION['name-error'] ||  $_SESSION['email-error'] ||
        $_SESSION['subject-error'] || $_SESSION['remarks-error']
    ){
        echo "<script> history.back() </script>";
        // echo $name, $email, $subject, $remarks;
    }else{
        $sql = "INSERT INTO `complaints`(`name`, `email`, `subject`, `remarks`) VALUES (?,?,?,?)";

        if($stmt = $conn->prepare($sql)){
            $stmt->bind_param("ssss", $param_name, $param_email, $param_subject, $param_remarks);

            $param_name = $name;
            $param_email = $email;
            $param_subject = $subject;
            $param_remarks = $remarks;

            if($stmt->execute()){
                $_SESSION['data-inserted'] = "Submitted Successfully";

                // smtpmailer($email, $name, $subject);
                header("location: ../contactUs.php");


            }
        }

        $stmt->close();
        $conn->close();
    }

}
?>