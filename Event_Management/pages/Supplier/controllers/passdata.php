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
     function validate($data){
        $data =trim($data);
        $data =stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $title = validate($_POST['title']);
    $descript = validate($_POST['descript']);
    $venueIn = validate($_POST['venueIn']);
    $location = validate($_POST['location']);
    $type = validate($_POST['type']);
    $maxCap = validate($_POST['maxCap']);
    $minCap = validate($_POST['minCap']);
    $other = validate($_POST['other']);
    $sup_ID = $_SESSION['user_id'];
    $images = $_FILES['images'];


    // Validation patters
    $onlyPositiveNumbers = "/^[1-9][0-9]*$/";

    // Validate package name
    if (empty($title)) {
        $_SESSION['error-title'] = "Package name is required";
    }

    // Validate event type
    if (empty($descript)) {
        $_SESSION['error-descript'] = "Event type is required";
    }

    // Validate price from
    if (empty($minCap)) {
        $_SESSION['error-minCap'] = "Starting price is required";
    } else if (!preg_match($onlyPositiveNumbers, $minCap)) {
        $_SESSION['error-minCap'] = "Starting price must be a positive number";
    }

    // Validate description
    if (empty($location)) {
        $_SESSION['error-location'] = "Description is required";
    }

    // If there are any errors go back
    if (
        isset($_SESSION['error-title']) ||
        isset($_SESSION['error-descript']) ||
        isset($_SESSION['error-minCap']) ||
        isset($_SESSION['error-location'])
    ) {
        echo "<script> history.back(); </script>";
    } else {
        // Prepare an insert statement
        $sql = "INSERT INTO  sup_product_general( supplier_ID,title,description,other_details) 
        VALUES(?,?,?,?)";

        //,venloc,venlocation,ventype,maxCap,minCap,?,?,?,?,?

        if ($stmt = $conn->prepare($sql)) {


            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('isss',$sup_ID, $param_title, $param_descript,$param_other);
            // Set parameters
            $param_title = $title;
            $param_descript = $descript ;
            $param_other = $other ;
            

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Get the last inserted id
                $product_id  = $conn->insert_id;

                $sql1 = "INSERT INTO  supplier_venue( product_id,venloc,venlocation,ventype,maxCap,minCap) 
                VALUES(?,?,?,?,?,?)";

                if ($stmt1 = $conn->prepare($sql1)) {

                    $stmt1->bind_param('isssii',$product_id, $param_venueIn, $param_location, $param_type,$param_maxCap,$param_minCap);
                    
                    $param_venueIn = $venueIn ;
                    $param_location = $location;
                    $param_type = $type;
                    $param_maxCap = $maxCap ;
                    $param_minCap = $minCap;

                    if ($stmt1->execute()) {
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

                            $sql = "INSERT INTO supplier_product_images (product_id, image_id, image, name, type) VALUES ('$product_id', '$index', '$image', '$name', '$type')";

                            mysqli_query($conn, $sql);
                            echo mysqli_error($conn);
                        }
                    }
                }
                // Redirect package services page
                $_SESSION['success'] = "Package added successfully".$package_id;
                header("location: ../form-venue.php?product_type=venue");
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
