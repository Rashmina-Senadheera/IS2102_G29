<?php

include_once '../../constants.php';

// get the request id if it is set
if (isset($_GET['reqID'])) {
    $reqID = $_GET['reqID'];
} else {
    $reqID = '0';
}

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    $search = $_GET['search'];
    $typeArr = explode(",", $type);
    $dbTypes = "";

    for ($i = 0; $i < count($typeArr); $i++) {
        if ($i == 0) {
            $dbTypes = $dbTypes . "`type` = '" . $typeArr[$i] . "'";
        } else {
            $dbTypes = $dbTypes . " OR `type` = '" . $typeArr[$i] . "'";
        }
    }

    // different sql queries for different search and type combinations
    if ($search != "" && $type != "") {
        $sql = "SELECT `product_id`, `title`, `description`, `type` FROM sup_product_general WHERE (`title` LIKE '%" . $search . "%' OR `description` LIKE '%" . $search . "%') AND (" . $dbTypes . ") ORDER BY RAND()";
    } else if ($search == "" && $type != "") {
        $sql = "SELECT `product_id`, `title`, `description`, `type` FROM sup_product_general WHERE " . $dbTypes . " ORDER BY RAND()";
    } else if ($search != "" && $type == "") {
        $sql = "SELECT `product_id`, `title`, `description`, `type` FROM sup_product_general WHERE `title` LIKE '%" . $search . "%' OR `description` LIKE '%" . $search . "%' ORDER BY RAND()";
    } else {
        $sql = "SELECT `product_id`, `title`, `description`, `type` FROM sup_product_general ORDER BY RAND()";
    }
} else {
    $sql = "SELECT `product_id`, `title`, `description`, `type` FROM sup_product_general  ORDER BY RAND()";
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
                        <a href="./request-quotation.php?id=' . $productID . '&reqID=' . $reqID . '" class="request">Request a Quotation</a>
                    </li>
                </ul>
            </div>';
    }
} else {
    echo "<div class='no-records'>
            No Supplier Found
            <img src='../../images/no-record.png' alt='No Requests'>
        </div>";
}
