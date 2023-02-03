<?php

// Check the method of the request
// If request methot is not POST redirect to the register page
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("location: ../sign_up_form.php");
} else {
    // include the database config file
    require_once '../../constants.php';
    require_once '../../controllers/commonFunctions.php';

    // define variables and set to empty values
    $description = $eventType = $priceFrom = $packageName = "";
    $services = $images = array();

    $packageName = checkInput($_POST['packageName']);
    $eventType = checkInput($_POST['eventType']);
    $priceFrom = checkInput($_POST['priceFrom']);
    $description = checkInput($_POST['description']);
    $images = $_FILES['images'];

    if (isset($_POST['services'])) {
        $services = $_POST['services'];
    }

    // Validation patters
    $onlyPositiveNumbers = "/^[1-9][0-9]*$/";

    // Validate package name
    if (empty($packageName)) {
        $_SESSION['error-packageName'] = "Package name is required";
    }

    // Validate event type
    if (empty($eventType)) {
        $_SESSION['error-eventType'] = "Event type is required";
    }

    // Validate price from
    if (empty($priceFrom)) {
        $_SESSION['error-priceFrom'] = "Starting price is required";
    } else if (!preg_match($onlyPositiveNumbers, $priceFrom)) {
        $_SESSION['error-priceFrom'] = "Starting price must be a positive number";
    }

    // Validate description
    if (empty($description)) {
        $_SESSION['error-description'] = "Description is required";
    }

    // Validate services
    if (empty($services)) {
        $_SESSION['error-services'] = "At least one service must be entered";
    }

    // If there are any errors go back
    if (
        isset($_SESSION['error-packageName']) ||
        isset($_SESSION['error-eventType']) ||
        isset($_SESSION['error-priceFrom']) ||
        isset($_SESSION['error-description']) ||
        isset($_SESSION['error-services'])
    ) {
        echo "<script> history.back(); </script>";
    } else {
        // Prepare an insert statement
        $sql = "INSERT INTO packages (package_name, event_type, price_start, description, ep_id) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssdsi", $param_packageName, $param_eventType, $param_priceFrom, $param_description, $param_epID);

            // Set parameters
            $param_packageName = $packageName;
            $param_eventType = $eventType;
            $param_priceFrom = $priceFrom;
            $param_description = $description;
            $param_epID = $_SESSION['user_id'];

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Get the last inserted id
                $packageId = $conn->insert_id;

                // Prepare an insert statement
                $sql = "INSERT INTO package_services (package_id, service_id, service) VALUES (?, ?, ?)";

                // Loop through the services array with count
                for ($i = 0; $i < count($services); $i++) {
                    if ($stmt = $conn->prepare($sql)) {
                        if ($services[$i] == "") {
                            continue;
                        }
                        // Bind variables to the prepared statement as parameters
                        $stmt->bind_param("iis", $param_packageId, $param_serviceId, $param_service);

                        // Set parameters
                        $param_packageId = $packageId;
                        $param_serviceId = $i;
                        $param_service = $services[$i];

                        // Execute the prepared statement
                        if ($stmt->execute()) {
                            // continue the loop
                        } else {
                            echo "Something went wrong.";
                        }
                    }
                }

                // Loop through the images array with count
                foreach ($images['tmp_name'] as $index => $tmp_name) {
                    $name = mysqli_real_escape_string($conn, $images['name'][$index]);
                    $type = mysqli_real_escape_string($conn, $images['type'][$index]);
                    if (file_exists($tmp_name)) {
                        $image = file_get_contents($tmp_name);
                    } else {
                        $image = null;
                        continue;
                    }
                    $image = mysqli_real_escape_string($conn, $image);

                    $sql = "INSERT INTO package_images (package_id, image_id, image, name, type) VALUES ('$packageId', '$index', '$image', '$name', '$type')";

                    mysqli_query($conn, $sql);
                    echo mysqli_error($conn);
                }

                // Redirect package services page
                $_SESSION['success'] = "Package added successfully";
                header("location: ../PackagesServices.php");
            } else {
                $_SESSION['error'] =  "Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }

        // Close connection
        $conn->close();
    }
}
