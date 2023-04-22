<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../404.php");
} else {
    require_once '../../constants.php';
    require_once '../../controllers/commonFunctions.php';

    // get POST value for each field or set to null
    $reqID = isset($_POST['reqID']) ? checkInput($_POST['reqID']) : "Not Set";
    $cusId = isset($_POST['cusId']) ? checkInput($_POST['cusId']) : "Not Set";
    $epId = $_SESSION['user_id'];
    $remarks = isset($_POST['remarks']) ? (!empty(checkInput($_POST['remarks'])) ? checkInput($_POST['remarks']) : "No remarks") : "Not Set";
    $date = date("Y-m-d H:i:s");
    $status = "pending";

    $epCost = isset($_POST['epCost']) ? checkInput($_POST['epCost']) : "";

    $runFood = isset($_POST['foodBevId']) ? true : false;
    $runVenue = isset($_POST['venueId']) ? true : false;
    $runPV = isset($_POST['pvId']) ? true : false;
    $runSL = isset($_POST['slId']) ? true : false;

    $onlyPositiveNumbers = "/^[0-9]*$/";

    if (empty($epCost)) {
        $_SESSION['error-epCost'] = "Cost is required";
    } else if (!preg_match($onlyPositiveNumbers, $epCost)) {
        $_SESSION['error-epCost'] = "Cost must be a positive number";
    } else {
        unset($_SESSION['error-epCost']);
    }

    // if confirm proceed with warnings

    if ($runFood) {
        $foodBevId = checkInput($_POST['foodBevId']);
        $foodBevName = checkInput($_POST['foodBevName']);
        $foodBevCost = checkInput($_POST['foodBevCost']);

        if (!preg_match($onlyPositiveNumbers, $foodBevCost)) {
            $_SESSION['error-foodBevCost'] = "Cost must be a positive number";
        } else {
            unset($_SESSION['error-foodBevCost']);
            if (empty($foodBevName) || empty($foodBevCost)) {
                $_SESSION['warning-food'] = "Food & Beverage not set";
            } else {
                unset($_SESSION['warning-food']);
            }
        }
    }

    if ($runVenue) {
        $venueId = checkInput($_POST['venueId']);
        $venueName = checkInput($_POST['venueName']);
        $venueCost = checkInput($_POST['venueCost']);

        if (!preg_match($onlyPositiveNumbers, $venueCost)) {
            $_SESSION['error-venueCost'] = "Cost must be a positive number";
        } else {
            unset($_SESSION['error-venueCost']);
            if (empty($venueName) || empty($venueCost)) {
                $_SESSION['warning-venue'] = "Venue not set";
            } else {
                unset($_SESSION['warning-food']);
            }
        }
    }

    if ($runPV) {
        $pvId = checkInput($_POST['pvId']);
        $pvName = checkInput($_POST['pvName']);
        $pvCost = checkInput($_POST['pvCost']);

        if (!preg_match($onlyPositiveNumbers, $pvCost)) {
            $_SESSION['error-pvCost'] = "Cost must be a positive number";
        } else {
            unset($_SESSION['error-pvCost']);
            if (empty($pvName) || empty($pvCost)) {
                $_SESSION['warning-pv'] = "Photographer/Videographer not set";
            } else {
                unset($_SESSION['warning-pv']);
            }
        }
    }

    if ($runSL) {
        $slId = checkInput($_POST['slId']);
        $slName = checkInput($_POST['slName']);
        $slCost = checkInput($_POST['slCost']);

        if (!preg_match($onlyPositiveNumbers, $slCost)) {
            $_SESSION['error-slCost'] = "Cost must be a positive number";
        } else {
            unset($_SESSION['error-slCost']);
            if (empty($slName) || empty($slCost)) {
                $_SESSION['warning-sl'] = "Sound/Lighting not set";
            } else {
                unset($_SESSION['warning-sl']);
            }
        }
    }

    if (isset($_SESSION['warning-food']) || isset($_SESSION['warning-venue']) || isset($_SESSION['warning-pv']) || isset($_SESSION['warning-sl'])) {
        echo "<script> window.history.go(-1); </script>";
        exit();
    } else {
        // insert into ep_quotation
        $sql = "INSERT INTO `ep_quotation`(`reqId`, `cusId`, `epId`, `remarks`, `date`, `status`, `epCost`) VALUES ('$reqID','$cusId','$epId','$remarks','$date','$status','$epCost')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
        } else {
            $_SESSION['error'] = "Error: " . $conn->error;
            echo "<script> window.history.go(-1); </script>";
            exit();
        }

        // check if ep_quotation is inserted
        if (!empty($last_id)) {
            // insert into ep_quotation_items
            if ($runFood) {
                $type = 'foodbev';
                $stmt->bind_param("issd", $last_id, $type, $foodBevName, $foodBevCost);
                $stmt->execute();
            }
            if ($runVenue) {
                $type = 'venue';
                $stmt->bind_param("issd", $last_id, $type, $venueName, $venueCost);
                $stmt->execute();
            }
            if ($runPV) {
                $type = 'photo';
                $stmt->bind_param("issd", $last_id, $type, $pvName, $pvCost);
                $stmt->execute();
            }
            if ($runSL) {
                $type = 'ent';
                $stmt->bind_param("issd", $last_id, $type, $slName, $slCost);
                $stmt->execute();
            }
        }
    }
}
