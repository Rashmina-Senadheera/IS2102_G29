<?php

if (
    isset($_POST['date']) &&
    isset($_POST['name']) 
) {

    include "../db_conn.php";

    $date = $_POST['date'];
    $name = $_POST['name'];

    $data = "name=" . $name;


    // Insert into Database
    $sql = "INSERT INTO Feedback(date, name) VALUES(?,?)";
    $stmt = $conn->prepare($sql);
    $res = $stmt->execute([$date, $name]);
    if($res){
        echo "Success";
        
    }
    else{
        
    }

    
}
?>