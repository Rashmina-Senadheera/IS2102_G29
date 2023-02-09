<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../404.php");
} else {
    require_once '../../constants.php';
    require_once '../../controllers/commonFunctions.php';

    echo print_r($_POST);

    // get POST value for each field or set to null
    $psId = isset($_POST['psId']) ? checkInput($_POST['psId']) : "";
    $psTitle = isset($_POST['psTitle']) ? checkInput($_POST['psTitle']) : "";
    $psType = isset($_POST['psType']) ? checkInput($_POST['psType']) : "";
    $date = isset($_POST['date']) ? checkInput($_POST['date']) : "";
    $eventType = isset($_POST['eventType']) ? checkInput($_POST['eventType']) : "";
    $no_of_participants = isset($_POST['no_of_participants']) ? checkInput($_POST['no_of_participants']) : "";
    $location = isset($_POST['location']) ? checkInput($_POST['location']) : "";
    $catered_for = isset($_POST['catered_for']) ? checkInput($_POST['catered_for']) : "";
    $transport = isset($_POST['transport']) ? checkInput($_POST['transport']) : "";
    $bev_need_as = isset($_POST['bev_need_as']) ? checkInput($_POST['bev_need_as']) : "";
    $food_need_as = isset($_POST['food_need_as']) ? checkInput($_POST['food_need_as']) : "";
    $need_for = isset($_POST['need_for']) ? checkInput($_POST['need_for']) : "";
    $location_from = isset($_POST['location_from']) ? checkInput($_POST['location_from']) : "";
    $location_to = isset($_POST['location_to']) ? checkInput($_POST['location_to']) : "";
    $hours = isset($_POST['hours']) ? checkInput($_POST['hours']) : "";
    $theme = isset($_POST['theme']) ? checkInput($_POST['theme']) : "";
    $photographs_in = isset($_POST['photographs_in']) ? checkInput($_POST['photographs_in']) : "";
    $needs = isset($_POST['needs']) ? checkInput($_POST['needs']) : "";
    $perform_in = isset($_POST['perform_in']) ? checkInput($_POST['perform_in']) : "";

    $onlyPositiveNumbers = "/^[1-9][0-9]*$/";

    if (empty($date)) {
        $_SESSION['error-date'] = "Date is required";
    }

    if (empty($eventType)) {
        $_SESSION['error-eventType'] = "Event type is required";
    }

    if (empty($no_of_participants)) {
        $_SESSION['error-no_of_participants'] = "Number of participants is required";
    } else if (!preg_match($onlyPositiveNumbers, $no_of_participants)) {
        $_SESSION['error-no_of_participants'] = "Number of participants must be a positive number";
    }

    if (
        isset($_SESSION['error-date']) ||
        isset($_SESSION['error-eventType']) ||
        isset($_SESSION['error-no_of_participants'])
    ) {
        // echo "<script> history.back(); </script>";
    } else {
        echo "success";
    }
}
