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
    $product_id = checkInput($_POST['product_id']);
    $for_cus_req = checkInput($_POST['for_cus_req']);

    // get product type
    $sql = "SELECT type FROM sup_product_general WHERE product_id = $product_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $type = $row['type'];

    $sql = "INSERT INTO  supplier_quotation(date, title, description, cost, type, status, supplier_id, ep_id, req_id, for_cus_req) VALUES(?,?,?,?,?,?,?,?,?,?)";

    if ($stmt = $conn->prepare($sql)) {

        // Bind variables to the prepared statement as parameters
        $stmt->bind_param('sssdssiiii', $param_date, $param_title, $param_description, $param_cost, $param_type, $param_status, $param_supplier_id, $param_ep_id, $param_req_id, $param_for_cus_req);
        // Set parameters
        $param_date = $date;
        $param_title = $title;
        $param_description = $description;
        $param_cost = $cost;
        $param_type = $type;
        $param_status = $status;
        $param_supplier_id = $supplier_id;
        $param_ep_id = $ep_id;
        $param_req_id = $req_id;
        $param_for_cus_req = $for_cus_req;

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
        }
    }
}
