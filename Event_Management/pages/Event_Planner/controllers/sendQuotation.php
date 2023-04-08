<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../404.php");
} else {
    require_once '../../constants.php';
    require_once '../../controllers/commonFunctions.php';

    // get POST value for each field or set to null
    $reqID = isset($_POST['reqID']) ? checkInput($_POST['reqID']) : "";
    $remarks = isset($_POST['remarks']) ? checkInput($_POST['remarks']) : "";
    $epCost = isset($_POST['epCost']) ? checkInput($_POST['epCost']) : "";
    $cusId = isset($_POST['cusId']) ? checkInput($_POST['cusId']) : "";
    $epId = $_SESSION['user_id'];
    $date = date("Y-m-d H:i:s");
    $status = "pending";

    $onlyPositiveNumbers = "/^[0-9]*$/";

    if (empty($epCost)) {
        $_SESSION['error-epCost'] = "Cost is required";
    } else if (!preg_match($onlyPositiveNumbers, $epCost)) {
        $_SESSION['error-epCost'] = "Cost must be a positive number";
    } else {
        unset($_SESSION['error-epCost']);
    }

    if(isset($_POST['foodBevName'])) {
        $status = "accepted";
    } else if(isset($_POST['reject'])) {
        $status = "rejected";
    }

    if (empty($_SESSION['error-epCost']) && empty($_SESSION['error-remarks'])) {
        $sql = "INSERT INTO quotation (req_id, ep_id, cus_id, ep_cost, remarks, date, status) VALUES ('$reqID', '$epId', '$cusId', '$epCost', '$remarks', '$date', '$status')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $_SESSION['success'] = "Quotation sent successfully";
            header("location: ../Event_Planner/quotation.php");
        } else {
            $_SESSION['error'] = "Something went wrong. Please try again";
            header("location: ../Event_Planner/quotation.php");
        }
    } else {
        header("location: ../Event_Planner/quotation.php");
    }
}
