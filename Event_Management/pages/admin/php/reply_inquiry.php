<?php 
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: Event_Planner/404.php");
}
else{
    include("../../constants.php");
    include("../email.php");
    

    $reply = trim($_POST['reply']);
    $id = trim($_POST['id']);
    $email = trim($_POST['email']);
    $name = trim($_POST['name']);

    if(empty($reply)){
        $_SESSION['error-reply'] = "Reply in required";
    }

    if($_SESSION['error-reply']){
        // echo "<script> history.back() </script>";
        echo "hello";
    }else{
        $sql = "UPDATE `complaints` SET  `replied`=1 ,`reply`='$reply' WHERE `id`= '$id' ";

        $res = mysqli_query($conn,$sql);

        if($res){
            $_SESSION['data-inserted'] = "Submitted Successfully";
            $subject = "Regarding Eventra event planning website";
            smtpmailer($email, $name, $subject, $reply);
            header("location: ../inquiries.php");
        }

       
    }

}


?>