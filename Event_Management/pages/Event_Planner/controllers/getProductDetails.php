<?php

$sql = "SELECT * FROM sup_product_general WHERE product_id = $id";
$result = mysqli_query($conn, $sql);

// check if the id is valid
if (mysqli_num_rows($result) > 0) {
    $general_details = mysqli_fetch_assoc($result);
    $title = ucwords($general_details['title']);
    $description = $general_details['description'];
    $other_details = $general_details['other_details'];
    $budget_min = formatCurrency($general_details['budget_min']);
    $budget_max = formatCurrency($general_details['budget_max']);
    $type = $general_details['type'];
    $img_sql = "SELECT `image` FROM supplier_product_images WHERE `product_id` = $id";
    $img_result = mysqli_query($conn, $img_sql);

    // get other details according to the type
    $more_details = "SELECT * FROM supplier_" . $type . "  WHERE product_id = $id";

    // check if the query is successful
    if ($more_result = mysqli_query($conn, $more_details)) {
        $more_details = mysqli_fetch_assoc($more_result);

        $suitable_for = !empty($more_details['suitable_for']) ? ucwords($more_details['suitable_for']) : "";
        $locations = !empty($more_details['locations']) ? $more_details['locations'] : "";
        $provide = !empty($more_details['provide']) ? $more_details['provide'] : "";
        $type_of_flowers = !empty($more_details['type_of_flowers']) ? $more_details['type_of_flowers'] : "";
        $height = !empty($more_details['height']) ? $more_details['height'] : "";
        $quantity = !empty($more_details['quantity']) ? $more_details['quantity'] : "";
        $catered_for = !empty($more_details['catered_for']) ? $more_details['catered_for'] : "";
        $transport = !empty($more_details['transport']) ? $more_details['transport'] : "";
        $available_as = !empty($more_details['available_as']) ? $more_details['available_as'] : "";
        $available_for = !empty($more_details['available_for']) ? $more_details['available_for'] : "";
        $transport_type = !empty($more_details['type']) ? $more_details['type'] : "";
        $brand = !empty($more_details['brand']) ? $more_details['brand'] : "";
        $model = !empty($more_details['model']) ? $more_details['model'] : "";
        $venloc = !empty($more_details['venloc']) ? ucwords($more_details['venloc']) : "";
        $venlocation = !empty($more_details['venlocation']) ? ucwords($more_details['venlocation']) : "";
        $ventype = !empty($more_details['ventype']) ? ucwords($more_details['ventype']) : "";
        $maxCap = !empty($more_details['maxCap']) ? $more_details['maxCap'] : "";
        $minCap = !empty($more_details['minCap']) ? $more_details['minCap'] : "";
        $type_light = !empty($more_details['type_light']) ? $more_details['type_light'] : "";
    } else {
        // echo "Error: " . $more_details . "<br>" . mysqli_error($conn);
        // header("Location: 404.php");
    }
} else {
    header("Location: 404.php");
}
