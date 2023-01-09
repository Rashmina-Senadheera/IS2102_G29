<?php

if (
    isset($_POST['name']) &&
    isset($_POST['email']) &&
    isset($_POST['account'])  &&
    isset($_POST['date'])  &&
    isset($_POST['ammount'])
) {

    include "../db_conn.php";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $account = $_POST['account'];
    $date = $_POST['date'];
    $ammount = $_POST['ammount'];

    $data = "name=" . $name . "&email=" . $email . "&account=" . $account . "&ammount=" . $ammount;


    // Insert into Database
    $sql = "INSERT INTO payments(name, email,account,date,ammount) VALUES(?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email, $account, $date, $ammount]);

    header("Location: ../payments.php");
}
