<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/viewSuppliersEP.css">
    <link rel="stylesheet" href="../../css/filterEP.css">
</head>

<body>
    <?php
    // Start output buffering
    ob_start();

    require_once('eventplanner_sidenav.php');
    require_once('eventplanner_header.php');
    require_once('../controllers/commonFunctions.php');

    // get the request id if it is set
    if (isset($_GET['reqID'])) {
        $reqID = $_GET['reqID'];
        setcookie("quotation_for", $reqID);
    } else {
        $reqID = '0';
        setcookie("quotation_for", 0);
    }

    // Send the output buffer to the browser and turn off output buffering
    ob_end_flush();

    // Show success message if it is set
    if (isset($_SESSION['success'])) {
        echo '<div class="success-message">' . showSessionMessage("success") . '</div>';
    }
    ?>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> Supplier Products & Services </div>
                <!-- <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search suppliers" name="search">
                    <i class="fa fa-search icon"></i>
                </div>
                <button type="submit" class="srcButton">Search</button> -->
            </div>
        </div>
        <div class="gridMain">
            <div class="suppliers-cards-container" id="supplier_items">

                <?php
                if (isset($_GET['type'])) {
                    $type = $_GET['type'];
                    if ($type == "foodbev") {
                        $sql = "SELECT `product_id`, `title`, `description`, `type` FROM sup_product_general WHERE `type` = 'foodbev'";
                    } else if ($type == "pv") {
                        $sql = "SELECT `product_id`, `title`, `description`, `type` FROM sup_product_general WHERE `type` = 'photo' OR `type` = 'video'";
                    } else if ($type == "sl") {
                        $sql = "SELECT `product_id`, `title`, `description`, `type` FROM sup_product_general WHERE `type` = 'deco' OR `type` = 'deco'";
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
                ?>

            </div>
            <?php require_once 'components/SuppliersFilter.php'; ?>
        </div>
    </div>
    <script src="../../js/epSupplierFilter.js"></script>
</body>

</html>