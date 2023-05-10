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
    function makeArray($arr,$reciveData){
        foreach($reciveData as $val)  
        {  
            $arr .= $val.",";  
        } 
        return $arr;
    }

    $product_id = validate($_POST['productId']);
    $title = validate($_POST['title']);
    $descript = validate($_POST['descript']);
    $other = validate($_POST['other']);
    $maxBudget = validate($_POST['maxBudget']);
    $minBudget = validate($_POST['minBudget']);
    $sup_ID = $_SESSION['user_id'];
    $images = $_FILES['images'];
    $ptype = validate($_POST['ptype']);

    if($ptype == 'venue'){
        $venueIn = validate($_POST['venueIn']);
        $location = validate($_POST['location']);
        $maxCap = validate($_POST['maxCap']);
        $minCap = validate($_POST['minCap']);
        $type = validate($_POST['type']);
    }
    if($ptype == 'foodbev'){
        $cater_transport = validate($_POST['cater-transport']);
        $cater_type_a = $_POST['cater-type'];
        $available_as_fb_a = $_POST['available-as-fb'];
        $available_for_fb_a = $_POST['available-for-fb'];

        $available_for_fb = makeArray($available_for_fb,$available_for_fb_a); 
        $cater_type = makeArray($cater_type,$cater_type_a); ; 
        $available_as_fb = makeArray($available_as_fb,$available_as_fb_a ); 
        
    }
    if($ptype == 'transport'){
        $transport_type = validate($_POST['transport_type']);
        $transport_Brand = validate($_POST['transport_Brand']);
        $transport_Model = validate($_POST['transport_Model']);
    }
    if($ptype == 'florist'){
        $floral_type = validate($_POST['floral-type']);
        $floral_height = validate($_POST['floral-height']);
        $floral_quant = validate($_POST['floral-quant']);
        $floral_for_a = $_POST['type-floral'];
        $floral_for = makeArray($floral_for,$floral_for_a ); 
    }
    if($ptype == 'deco'){
        $deco_type_a = $_POST['type-deco'];
        $deco_type = makeArray($deco_type,$deco_type_a);
    }
    if($ptype == 'photo'){
        $photo_in = validate($_POST['photo-in']);
        $type_photo = validate($_POST['type-photo']);
    }
    if($ptype == 'ent'){
        $type_ent = validate($_POST['type-ent']);
    }
    if($ptype == 'sound'){
        $type_sound_a = $_POST['type-sound'];
        $type_sound = makeArray($type_sound,$type_sound_a); 
    }
    if($ptype == 'light'){
        $type_light_a = $_POST['type-light'];
        $type_light = makeArray($type_light,$type_light_a); 
    }



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


    // If there are any errors go back
    if (
        isset($_SESSION['error-title']) ||
        isset($_SESSION['error-descript'])
    ) {
        echo "<script> history.back(); </script>";
    } else {
        // Prepare an insert statement
        $sql = "UPDATE sup_product_general SET title =? ,description =? ,other_details = ? ,type =? ,budget_min =? ,budget_max =? WHERE product_id = ? ";

        //,venloc,venlocation,ventype,maxCap,minCap,?,?,?,?,?

        if ($stmt = $conn->prepare($sql)) {


            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('ssssiii', $param_title, $param_descript,$param_other,$param_ptype,$param_minBudget,$param_maxBudget,$product_id);
            // Set parameters
            $param_title = $title;
            $param_descript = $descript ;
            $param_other = $other ;
            $param_maxBudget= $maxBudget ;
            $param_minBudget= $minBudget ;
            $param_other = $other ;
            $param_ptype = $ptype ;
            

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {

                if($ptype == 'venue'){
                    $sql1 = "UPDATE supplier_venue SET venloc =? ,venlocation=?,ventype=?,maxCap=?,minCap=? WHERE product_id = ?";
                }
                if($ptype == 'foodbev'){
                    $sql1 = "UPDATE  supplier_foodbev SET catered_for =? ,transport =? ,available_as =? ,available_for =? WHERE product_id = ?";
                }
                if($ptype == 'transport'){
                    $sql1 = "UPDATE supplier_transport SET type =? ,brand =? ,model =?  WHERE product_id = ?";
                }
                if($ptype == 'florist'){
                    $sql1 = "UPDATE   supplier_florist SET type_of_flowers =? ,height =? ,quantity =? ,suitable_for =? WHERE product_id = ?";
                }
                if($ptype == 'deco'){
                    $sql1 = "UPDATE   supplier_deco SET suitable_for =?  WHERE product_id = ?";
                }
                if($ptype == 'photo'){
                    $sql1 = "UPDATE  supplier_photo SET  photo_in =? ,available =?  WHERE product_id = ?";
                }
                if($ptype == 'ent'){
                    $sql1 = "UPDATE   supplier_ent SET provide =?  WHERE product_id = ?";
                }
                if($ptype == 'sound'){
                    $sql1 = "UPDATE   supplier_sound SET type_sound =?  WHERE product_id = ?";
                }
                if($ptype == 'light'){
                    $sql1 = "UPDATE   supplier_light SET type_light  =? ) WHERE product_id = ?";
                }

                if($ptype != 'other') {
                    if ($stmt1 = $conn->prepare($sql1)) {

                    if($ptype == 'venue'){
                        $stmt1->bind_param('sssiii', $param_venueIn, $param_location, $param_type,$param_maxCap,$param_minCap,$product_id);
                        $param_venueIn = $venueIn ;
                        $param_location = $location;
                        $param_type = $type;
                        $param_maxCap = $maxCap ;
                        $param_minCap = $minCap;
                    }
                    if($ptype == 'foodbev'){
                        $stmt1->bind_param('ssssi', $param_catType, $param_catTransport, $param_availAsFb,$param_availForFb,$product_id);
                        $param_availAsFb = $available_as_fb;
                        $param_availForFb = $available_for_fb;
                        $param_catTransport = $cater_transport;
                        $param_catType = $cater_type;

                    }
                    if($ptype == 'transport'){
                        $stmt1->bind_param('sssi', $param_transportType, $param_transportBrand, $param_transportModel,$product_id);
                        $param_transportType = $transport_type;
                        $param_transportBrand = $transport_Brand;
                        $param_transportModel = $transport_Model;
                    }
                    if($ptype == 'florist'){
                        $stmt1->bind_param('sdisi', $param_type_of_flowers, $param_height, $param_quantity,$param_suitable_for,$product_id);
                        $param_type_of_flowers = $floral_type;
                        $param_height = $floral_height;
                        $param_quantity = $floral_quant;
                        $param_suitable_for = $floral_for;
                    }
                    if($ptype == 'deco'){
                        $stmt1->bind_param('si', $param_type_deco,$product_id);
                        $param_type_deco = $deco_type;
                    }

                    if($ptype == 'photo'){
                        $stmt1->bind_param('ssi',$photo_in, $param_type_photo,$product_id);
                        $param_photo_in = $photo_in;
                        $param_type_photo = $type_photo;
                    }
                    if($ptype == 'ent'){
                        $stmt1->bind_param('si', $param_type_ent,$product_id);
                        $param_type_ent = $type_ent;
                    }
                    if($ptype == 'sound'){
                        $stmt1->bind_param('si', $param_type_sound,$product_id);
                        $param_type_sound = $type_sound;
                    }
                    if($ptype == 'light'){
                        $stmt1->bind_param('si', $param_type_light,$product_id);
                        $param_type_light = $type_light;
                    }
                }
                
                    if ($stmt1->execute()) {
                            // continue the loop
                        } else {
                            echo "Something went wrong.";
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

                    $sqlSelect = "SELECT image_id FROM supplier_product_images WHERE product_id = '$product_id' AND image_id = '$index'";
                    $sqlUpdate = "UPDATE supplier_product_images SET image='$image', name='$name', type='$type' WHERE product_id = '$product_id' AND image_id = '$index'";
                    $sqlInsert = "INSERT INTO supplier_product_images (product_id, image_id, image, name, type) VALUES ('$product_id', '$index', '$image', '$name', '$type')";

                    if (mysqli_num_rows(mysqli_query($conn, $sqlSelect)) > 0) {
                        $sql = $sqlUpdate;
                    } else {
                        $sql = $sqlInsert;
                    }
                    mysqli_query($conn, $sql);
                    echo mysqli_error($conn);
                }

                // Redirect package services page
                $_SESSION['success'] = "Product Edited Successfully".$package_id;
                header("location: ../form-venue.php?product_type=".$ptype);
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
