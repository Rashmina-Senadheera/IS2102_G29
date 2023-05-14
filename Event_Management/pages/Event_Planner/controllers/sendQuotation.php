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
    $runS = isset($_POST['sId']) ? true : false;
    $runL = isset($_POST['lId']) ? true : false;

    $onlyPositiveNumbers = "/^[0-9]*$/";

    if (!preg_match($onlyPositiveNumbers, $epCost)) {
        $_SESSION['error-epCost'] = "Cost must be a positive number";
    } else {
        unset($_SESSION['error-epCost']);
    }

    unset($_SESSION['warning-venue']);

    if ($runFood) {
        $foodBevqId = checkInput($_POST['foodBevqId']);
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
        $venueqId = checkInput($_POST['venueqId']);
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
        $pvqId = checkInput($_POST['pvqId']);
        $pvId = checkInput($_POST['pvId']);
        $pvName = checkInput($_POST['pvName']);
        $pvCost = checkInput($_POST['pvCost']);

        if (!preg_match($onlyPositiveNumbers, $pvCost)) {
            $_SESSION['error-pvCost'] = "Cost must be a positive number";
        } else {
            unset($_SESSION['error-pvCost']);
        }
    }

    if ($runS) {
        $sqId = checkInput($_POST['sqId']);
        $sId = checkInput($_POST['sId']);
        $sName = checkInput($_POST['sName']);
        $sCost = checkInput($_POST['sCost']);

        if (!preg_match($onlyPositiveNumbers, $sCost)) {
            $_SESSION['error-sCost'] = "Cost must be a positive number";
        } else {
            unset($_SESSION['error-sCost']);
        }
    }

    if ($runL) {
        $lqId = checkInput($_POST['lqId']);
        $lId = checkInput($_POST['lId']);
        $lName = checkInput($_POST['lName']);
        $lCost = checkInput($_POST['lCost']);

        if (!preg_match($onlyPositiveNumbers, $lCost)) {
            $_SESSION['error-lCost'] = "Cost must be a positive number";
        } else {
            unset($_SESSION['error-lCost']);
        }
    }

    if (isset($_SESSION['error-foodBevCostCost']) || isset($_SESSION['error-venueCost']) || isset($_SESSION['error-pvCost']) || isset($_SESSION['error-sCost']) || isset($_SESSION['error-lCost'])) {
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
            $sql = "INSERT INTO `ep_quotation_items`(`qId`, `type`, `name`, `cost`, `productId`, `supQuotId`) VALUES (?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issdii", $param_id, $param_type, $param_name, $param_cost, $param_productId, $param_supQuotId);
            $param_id = $last_id;

            if ($runFood) {
                $param_type = 'foodbev';
                if (empty($foodBevName)) {
                    $param_name = "Not Set";
                } else {
                    $param_name = $foodBevName;
                }
                $param_cost = $foodBevCost;
                $param_productId = $foodBevId;
                $param_supQuotId = $foodBevqId;
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
                $param_productId = $venueId;
                $param_supQuotId = $venueqId;
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
                $param_productId = $pvId;
                $param_supQuotId = $pvqId;
                $stmt->execute();
            }
            if ($runS) {
                $param_type = 'sound';
                if (empty($sName)) {
                    $param_name = "Not Set";
                } else {
                    $param_name = $sName;
                }
                $param_cost = $sCost;
                $param_productId = $sId;
                $param_supQuotId = $sqId;
                $stmt->execute();
            }
            if ($runL) {
                $param_type = 'light';
                if (empty($lName)) {
                    $param_name = "Not Set";
                } else {
                    $param_name = $lName;
                }
                $param_cost = $lCost;
                $param_productId = $lId;
                $param_supQuotId = $lqId;
                $stmt->execute();
            }
        }

        $_SESSION['success'] = "Quotation sent successfully";
        header("location: ../Requests.php");
    }
}
