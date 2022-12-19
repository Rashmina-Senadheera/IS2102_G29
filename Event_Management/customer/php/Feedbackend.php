<?php

if (
    isset($_POST['date']) &&
    isset($_POST['name']) &&
    isset($_POST['text'])  &&
    isset($_POST['rate'])
) {

    include "../db_conn.php";

    $date = $_POST['date'];
    $name = $_POST['name'];
    $text = $_POST['text']; 
    $rate = $_POST['rate'];

    $data = "name=" . $name . "&text=" . $text . "&rate=" . $rate;


    // Insert into Database
    $sql = "INSERT INTO Feedback(date, name, text, rate) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$date, $name, $text, $rate]);

    header("Location: ../Feedback.php");
}
?>