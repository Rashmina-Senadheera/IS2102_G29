<?php



if(isset($_POST['send_feedback'])){
    include('../../constants.php');
    if(isset($_POST['name']) && isset($_POST['text']) && isset($_POST['rate']) && isset($_POST['req_id'])){
        $name = $_POST['name'];
        $text = $_POST['text'];
        $rate = $_POST['rate'];
        $req_id = $_POST['req_id'];

        $sql = "INSERT INTO feedback (name, text, rate, req_id) VALUES('$name','$text','$rate', '$req_id')";
        $res = mysqli_query($conn,$sql);

        if($res){
            echo "<script> location.replace('../CompletedEvents.php')</script>";
;        }


    }

}
?>