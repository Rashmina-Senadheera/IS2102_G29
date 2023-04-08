<?php
if (isset($_GET['reqID'])) {
    // Start output buffering
    ob_start();

    include('eventplanner_sidenav.php');
    include('eventplanner_header.php');

    $reqID = $_GET['reqID'];
    $sql = "SELECT * FROM request_ep_quotation WHERE request_id = $reqID";

    // execute query and check if successful
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // check if the user is the owner of the package
            if ($row['EP_id'] == $_SESSION['user_id']) {
                $date = !empty($row['date']) ? $row['date'] : "Not Set";
                $description = !empty($row['description']) ? $row['description'] : "Not Set";
                $theme = !empty($row['theme']) ? $row['theme'] : "Not Set";
                $catering_type = !empty($row['catering_type']) ? $row['catering_type'] : "Not Set";
                $event_type = !empty($row['event_type']) ? $row['event_type'] : "Not Set";
                $vanue_type = !empty($row['vanue_type']) ? $row['vanue_type'] : "Not Set";
                $no_of_guests = !empty($row['no_of_guests']) ? $row['no_of_guests'] : "Not Set";
                $status = !empty($row['status']) ? $row['status'] : "Not Set";
                $time_from = !empty($row['time_from']) ? $row['time_from'] : "Not Set";
                $time_to = !empty($row['time_to']) ? $row['time_to'] : "Not Set";
                $budget1 = !empty($row['budget_min']) ? $row['budget_min'] : "0";
                $budget2 = !empty($row['budget_max']) ? "- " . $row['budget_max'] : " ";
                $requested_on = $row['requested_on'];

                $customerID = $row['customer_id'];
                $getUser_sql = "SELECT `name`, `email` FROM user WHERE user_id = " . $customerID;
                $getPhone_sql = "SELECT phone_number FROM user_phone WHERE user_id = " . $row['customer_id'];

                $getUser_result = $conn->query($getUser_sql);
                $getPhone_result = $conn->query($getPhone_sql);

                if ($getUser_result->num_rows > 0) {
                    $user_row = $getUser_result->fetch_assoc();
                    $name = $user_row['name'];
                    $email = $user_row['email'];
                } else {
                    $name = "Undefined";
                    $email = "Undefined";
                }

                if ($getPhone_result->num_rows > 0) {
                    $phone_row = $getPhone_result->fetch_assoc();
                    $phone = $phone_row['phone_number'];
                } else {
                    $phone = "Undefined";
                }


                // get more details of the request
                $sql_food = "SELECT * FROM cust_req_food WHERE request_id = $reqID";
                $sql_venue = "SELECT * FROM cust_req_venue WHERE request_id = $reqID";
                $sql_pv = "SELECT * FROM cust_req_pv WHERE request_id = $reqID";
                $sql_sl = "SELECT * FROM cust_req_sl WHERE request_id = $reqID";

                $result_food = $conn->query($sql_food);
                $result_venue = $conn->query($sql_venue);
                $result_pv = $conn->query($sql_pv);
                $result_sl = $conn->query($sql_sl);
            } else {
                header("Location: ./403.php");
                exit();
            }
        } else {
            header("Location: ./404.php");
            exit();
        }
    }

    // Send the output buffer to the browser and turn off output buffering
    ob_end_flush();
} else {
    header("Location: Requests.php");
    exit();
}
?>