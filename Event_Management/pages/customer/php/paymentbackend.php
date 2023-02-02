<?php

if (
    isset($_POST['name']) &&
    isset($_POST['email']) &&
    isset($_POST['account'])  &&
    isset($_POST['date'])  &&
    isset($_POST['amount'])
) {

    include "../db_conn.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $account = $_POST['account'];
    $date = $_POST['date'];
    $amount = $_POST['amount'];

    $data = "name=" . $name . "&email=" . $email . "&account=" . $account . "&amount=" . $amount;


    // Insert into Database
    $sql = "INSERT INTO payments(name, email,account,date,amount) VALUES(?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email, $account, $date, $amount]);

    header("Location: ../payments.php");
}
