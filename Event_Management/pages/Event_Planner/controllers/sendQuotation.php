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

    if (!preg_match($onlyPositiveNumbers, $epCost)) {
        $_SESSION['error-epCost'] = "Cost must be a positive number";
    } else {
        unset($_SESSION['error-epCost']);
    }

    unset($_SESSION['warning-venue']);

    if ($runFood) {
        $foodBevId = checkInput($_POST['foodBevId']);
        $foodBevName = checkInput($_POST['foodBevName']);
        $foodBevCost = checkInput($_POST['foodBevCost']);

        if (!preg_match($onlyPositiveNumbers, $foodBevCost)) {
            $_SESSION['error-foodBevCost'] = "Cost must be a positive number";
        } else {
            unset($_SESSION['error-foodBevCost']);
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
        }
    }

    if (isset($_SESSION['error-foodBevCostCost']) || isset($_SESSION['error-venueCost']) || isset($_SESSION['error-pvCost']) || isset($_SESSION['error-sl'])) {
        echo "<script> window.history.go(-1); </script>";
        exit();
    } else {
        // insert into ep_quotation
        $sql = "INSERT INTO `ep_quotation`(`reqId`, `cusId`, `epId`, `remarks`, `date`, `status`, `epCost`) VALUES ('$reqID','$cusId','$epId','$remarks','$date','$status','$epCost')";
        if ($conn->query($sql) === TRUE) {
            $last_id = $conn->insert_id;
            $updateStatus = "UPDATE `request_ep_quotation` SET `status`='quotation sent' WHERE `request_id`='$reqID'";
            $conn->query($updateStatus);
        } else {
            $_SESSION['error'] = "Error: " . $conn->error;
            echo "<script> window.history.go(-1); </script>";
            exit();
        }


        // check if ep_quotation is inserted
        if (!empty($last_id)) {
            $sql = "INSERT INTO `ep_quotation_items`(`qId`, `type`, `name`, `cost`) VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issd", $param_id, $param_type, $param_name, $param_cost);
            $param_id = $last_id;

            if ($runFood) {
                $param_type = 'foodbev';
                if (empty($foodBevName)) {
                    $param_name = "Not Set";
                } else {
                    $param_name = $foodBevName;
                }
                $param_cost = $foodBevCost;
                $stmt->execute();
            }
            if ($runVenue) {
                $param_type = 'venue';
                if (empty($venueName)) {
                    $param_name = "Not Set";
                } else {
                    $param_name = $venueName;
                }
                $param_cost = $venueCost;
                $stmt->execute();
            }
            if ($runPV) {
                $param_type = 'photo';
                if (empty($pvName)) {
                    $param_name = "Not Set";
                } else {
                    $param_name = $pvName;
                }
                $param_cost = $pvCost;
                $stmt->execute();
            }
            if ($runSL) {
                $param_type = 'ent';
                if (empty($slName)) {
                    $param_name = "Not Set";
                } else {
                    $param_name = $slName;
                }
                $param_cost = $slCost;
                $stmt->execute();
            }
        }

        $_SESSION['success'] = "Quotation sent successfully";
        header("location: ../Requests.php");
    }
}
