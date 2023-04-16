<?php

include_once '../../constants.php';
if (isset($_GET['type'])) {
    $type = $_GET['type'];
    $search = $_GET['search'];
    $typeArr = explode(",", $type);
    print_r($typeArr);
    if ($type == "") {
        $sql = "SELECT `product_id`, `title`, `description`, `type` FROM sup_product_general";
    } else if ($type == "foodbev") {
        $sql = "SELECT `product_id`, `title`, `description`, `type` FROM sup_product_general WHERE `type` = 'food' OR `type` = 'beverage'";
    } else if ($type == "pv") {
        $sql = "SELECT `product_id`, `title`, `description`, `type` FROM sup_product_general WHERE `type` = 'photography' OR `type` = 'videography'";
    } else if ($type == "sl") {
        $sql = "SELECT `product_id`, `title`, `description`, `type` FROM sup_product_general WHERE `type` = 'lighting' OR `type` = 'sound'";
    } else {
        $sql = "SELECT `product_id`, `title`, `description`, `type` FROM sup_product_general WHERE `type` = '$type'";
    }
} else {
    $sql = "SELECT `product_id`, `title`, `description`, `type` FROM sup_product_general";
}
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productID = $row['product_id'];
        $title = $row['title'];
        $description = $row['description'];
        $type = $row['type'];
        $img_sql = "SELECT `image` FROM supplier_product_images WHERE `product_id` = " . $row['product_id'] . " LIMIT 1";
        $img_result = mysqli_query($conn, $img_sql);
        $img_row = mysqli_fetch_assoc($img_result);
        $img = $img_row['image'];
        echo '<div class="card">
        <div class="content">
            <div class="imgBx">
                <img src="data:image/jpeg;base64,' . base64_encode($img) . '">
            </div>
            <div class="contentBx">
                <h3>' . $title . '</h3>
                <span>' . $description . '</span>
            </div>
        </div>
        <ul class="sci">
            <li>
                <!-- <a href="" class="view-supplier">View</a> -->
                <a href="./Supplier-more-info.php?id=' . $productID . '" class="view-supplier">View</a>
            </li>
            <li>
                <a href="./request-quotation.php?id=' . $productID . '" class="request">Request a Quotation</a>
            </li>
        </ul>
    </div>';
    }
} else {
    echo "No supplier found";
}
