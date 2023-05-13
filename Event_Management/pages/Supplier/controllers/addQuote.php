<?php

// Check the method of the request
// If request methot is not POST redirect to the register page
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../../sign_up_form.php");
} else {

    // include the database config file
    require_once '../../constants.php';
    require_once 'commonFunctions.php';

    // define variables and set to empty values
    $date = date("Y-m-d");
    $title = checkInput($_POST['title']);
    $p_description = checkInput($_POST['pdescript']);
    $ptype = checkInput($_POST['ptype']);
    $supplier_id = $_SESSION['user_id'];
    $cost = checkInput($_POST['cost']);
    $status = "pending";
    $ep_id = checkInput($_POST['ep_id']);
    $req_id = checkInput($_POST['req_id']);
    $for_cus_req = checkInput($_POST['for_cus_req']);
    $terms= isset($_POST['terms']);
    $remarks_quote= checkInput($_POST['description']);

    $sql = "INSERT INTO  supplier_quotation(date, title, description, cost, type, status, supplier_id, ep_id, req_id, for_cus_req,remarks_quote) VALUES(?,?,?,?,?,?,?,?,?,?,?)";

  
    if (empty($cost)) {
        $_SESSION['error-cost'] = "Enter Cost";
    }
    if (empty($terms)) {
        $_SESSION['error-terms'] = "Must Agree to terms and Conditions";
    }
    if (empty($remarks_quote)) {
        $_SESSION['error-descript'] = "Enter Remarks";
    }
    

    // Validate package name
    // If there are any errors go back
    if (
        isset($_SESSION['error-cost']) || isset($_SESSION['error-terms']) || isset($_SESSION['error-descript'])
    ) {
        echo "<script> history.back(); </script>";
    } else {
        if ($stmt = $conn->prepare($sql)) {

            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('sssdssiiiis', $param_date, $param_title, $param_description, $param_cost, $param_type, $param_status, $param_supplier_id, $param_ep_id, $param_req_id, $param_for_cus_req,$param_remarks);
            // Set parameters
            $param_date = $date;
            $param_title = $title;
            $param_description = $p_description;
            $param_cost = $cost;
            $param_type = $ptype;
            $param_status = $status;
            $param_supplier_id = $supplier_id;
            $param_ep_id = $ep_id;
            $param_req_id = $req_id;
            $param_for_cus_req = $for_cus_req;
             $param_remarks = $remarks_quote;

            

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                $_SESSION['success'] = "Quotation sent successfully".$req_id;

                // Update the status of the request
                $sql = "UPDATE request_supplier_quotation SET status = 'Completed' WHERE request_id = $req_id";
                $conn->query($sql);

                header("location: ../rs-list.php");
            } else {
                $_SESSION['error'] = "Error: " . $conn->error;
                echo "<script> window.history.go(-1); </script>";
                exit();

            }
            $conn->close();
        }
    }
}
?>
