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
    $description = checkInput($_POST['description']);
    $cost = checkInput($_POST['cost']);
    $status = "pending";
    $supplier_id = $_SESSION['user_id'];
    $ep_id = checkInput($_POST['ep_id']);
    $req_id = checkInput($_POST['req_id']);

    $sql = "INSERT INTO  supplier_quotation(date, title, description, cost, status, supplier_id, ep_id, req_id) VALUES(?,?,?,?,?,?,?,?)";

    if ($stmt = $conn->prepare($sql)) {

        // Bind variables to the prepared statement as parameters
        $stmt->bind_param('sssdsiii', $param_date, $param_title, $param_description, $param_cost, $param_status, $param_supplier_id, $param_ep_id, $param_req_id);
        // Set parameters
        $param_date = $date;
        $param_title = $title;
        $param_description = $description;
        $param_cost = $cost;
        $param_status = $status;
        $param_supplier_id = $supplier_id;
        $param_ep_id = $ep_id;
        $param_req_id = $req_id;

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            $_SESSION['success'] = "Quotation sent successfully";

            // Update the status of the request
            $sql = "UPDATE request_supplier_quotation SET status = 'Completed' WHERE request_id = $req_id";
            $conn->query($sql);

            header("location: ../quote-view.php?id=$req_id");
        } else {
            $_SESSION['error'] = "Something went wrong. Please try again later.";
            echo "<script>history.go(-1);</script>";
            if ($stmt->execute()) {
            // Redirect package services page
                $_SESSION['success'] = "Package added successfully".$package_id;
                header("location: ../sendEventPlannerQuote.php?");
            } else {
                $_SESSION['error'] =  "Something went wrong. Please try again later.";
            }
            $stmt->close();

        }
        $conn->close();
    }
}
?>
