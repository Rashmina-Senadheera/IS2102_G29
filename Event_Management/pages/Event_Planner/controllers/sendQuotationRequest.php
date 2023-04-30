<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../404.php");
} else {
    require_once '../../constants.php';
    require_once '../../controllers/commonFunctions.php';

    // get POST value for each field or set to null
    $psId = isset($_POST['psId']) ? checkInput($_POST['psId']) : "";
    $psTitle = isset($_POST['psTitle']) ? checkInput($_POST['psTitle']) : "";
    $psType = isset($_POST['psType']) ? checkInput($_POST['psType']) : "";
    $supplierId = isset($_POST['supplierId']) ? checkInput($_POST['supplierId']) : "";
    $forCusReq = isset($_POST['quotation_for']) ? checkInput($_POST['quotation_for']) : "0";
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
    $hours = isset($_POST['hours']) ? checkInput($_POST['hours']) : 0;
    $theme = isset($_POST['theme']) ? checkInput($_POST['theme']) : "";
    $photographs_in = isset($_POST['photographs_in']) ? checkInput($_POST['photographs_in']) : "";
    $needs = isset($_POST['needs']) ? checkInput($_POST['needs']) : "";
    $perform_in = isset($_POST['perform_in']) ? checkInput($_POST['perform_in']) : "";
    $remarks = isset($_POST['remarks']) ? checkInput($_POST['remarks']) : "";

    $onlyPositiveNumbers = "/^[0-9]*$/";

    if (empty($date)) {
        $_SESSION['error-date'] = "Date is required";
    } else {
        unset($_SESSION['error-date']);
    }


    if (empty($eventType)) {
        $_SESSION['error-eventType'] = "Event type is required";
    } else {
        unset($_SESSION['error-eventType']);
    }

    if (empty($no_of_participants)) {
        $_SESSION['error-nop'] = "Number of participants is required";
    } else if (!preg_match($onlyPositiveNumbers, $no_of_participants)) {
        $_SESSION['error-nop'] = "Number of participants must be a positive number";
    } else {
        unset($_SESSION['error-nop']);
    }

    if (!preg_match($onlyPositiveNumbers, $hours)) {
        $_SESSION['error-hours'] = "Hours must be a positive number";
    } else if (empty($hours)) {
        $hours = 0;
    } else {
        unset($_SESSION['error-hours']);
    }

    if (
        isset($_SESSION['error-date']) ||
        isset($_SESSION['error-eventType']) ||
        isset($_SESSION['error-nop']) ||
        isset($_SESSION['error-hours'])
    ) {
        echo "<script> history.back(); </script>";
    } else {
        $now = date("Y-m-d H:i:s");
        $sql = "INSERT INTO request_supplier_quotation 
        (psId, `date`, event_type, no_of_participants, `location`, catered_for, transport, bev_need_as, food_need_as, need_for, location_from, location_to, `hours`, theme, photographs_in, needs, perform_in, remarks, supplierId, urgency, requested_on, EP_id, `status`, product_type, product_title, for_cus_req) 
        VALUES ('$psId', '$date', '$eventType', '$no_of_participants', '$location', '$catered_for', '$transport', '$bev_need_as', '$food_need_as', '$need_for', '$location_from', '$location_to', '$hours', '$theme', '$photographs_in', '$needs', '$perform_in', '$remarks', '$supplierId', 'Normal', '$now', '$_SESSION[user_id]', 'Pending', '$psType', '$psTitle', '$forCusReq')";

        if ($conn->query($sql) === TRUE) {
            $_SESSION['success'] = "Quotation Request sent successfully";
            unset($_SESSION['error']);
            header("location: ../Request-view.php?reqID=$forCusReq");
        } else {
            $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
            header("location: ../Request-view.php?reqID=$forCusReq");
        }
    }
}
