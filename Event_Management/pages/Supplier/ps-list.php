

<!DOCTYPE html>
<html>

    <head>
        <meta charset = 'UTF-8'>
        <meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
        <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel = 'stylesheet' href = '../../css/supplierMain.css'>
        <link rel = 'stylesheet' href = '../../css/ps-list.css'>
    </head>
    <?php
        ob_start();

        include('../constants.php');
        include( 'supplier_sidenav.php' );
        include( 'header.php' );
        include('../controllers/commonFunctions.php');
        $id = $_SESSION['user_id'];

        ob_end_flush();
    ?>

    
        
    <body>

        
        <div class = 'container-main'>
            <div class = 'flex-container-main'>
                <div class="title-search">
                    <div class = 'searchSec'>
                        <div class = 'page-title'> My Products & Services </div>
                        <div class="search" id='add'>
                            <button type = 'submit' class = 'srcButton' id='add'><i class='bx bx-plus-circle'></i>
                            <a href="addps.php" id="btn">
                                <div class="btn-title">Add Product & Services</div></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="ps-list">
            <div class ='grid-main' id='ps-list'>
                <div class="cards"id="supplier_items">
                    <div class='.ps-card-message'>
                        <?php if (isset($_SESSION['success'])) { 
                            echo '<p class="success">' . showSessionMessage("success") . '</p>';
                        }?>
                        <?php if (isset($_SESSION['error'])) { 
                            echo '<p class="error">' . showSessionMessage("error") . '</p>';
                        } ?>
                    </div>
                    <?php
                        if (isset($_GET['type'])) {
                            $type = $_GET['type'];
                            if ($type == "foodbev") {
                                $sql = "SELECT `product_ID`, `title`, `description`, `type` FROM sup_product_general WHERE `type` = 'foodbev'  AND supplier_ID = $id";
                            } else if ($type == "pv") {
                                $sql = "SELECT `product_ID`, `title`, `description`, `type` FROM sup_product_general WHERE `type` = 'photo' OR `type` = 'video'  AND supplier_ID = $id";
                            } else if ($type == "sl") {
                                $sql = "SELECT `product_ID`, `title`, `description`, `type` FROM sup_product_general WHERE `type` = 'deco' OR `type` = 'deco'  AND supplier_ID = $id";
                            } else {
                                $sql = "SELECT `product_ID`, `title`, `description`, `type` FROM sup_product_general WHERE `type` = '$type' AND supplier_ID = $id ";
                            }
                        } else {
                            $sql = "SELECT `product_ID`, `title`, `description`, `type` FROM sup_product_general WHERE supplier_ID = $id ";
                        }

                        $result = $conn->query($sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $product_id = $row['product_ID'];
                                $image_sql = "SELECT * FROM supplier_product_images WHERE product_id = $product_id LIMIT 1";
                                $image_result = $conn->query($image_sql);
                                $image_row = $image_result->fetch_assoc();
                                $packageImage = isset($image_row['image']) ? $image_row['image'] : 0;
                        ?>
                        <a href='more-info.php?id=<?php echo $row["product_ID"];?>' id='a-card'>
                            <div class='ps-card'>
                                <div class='ps-card-img'>
                                    <img src= <?php 
                                    if (!$packageImage){
                                        echo "../../images/imageNot.png";
                                    }else{
                                        echo "data:image/jpeg;base64,".base64_encode($packageImage);
                                    }
                                    ?>> 
                                </div>
                                <div class='ps-card-desc'>
                                    <div class='ps-title'><?php echo $row["title"];?></div>
                                    <div class='ps-type'><?php echo $row["description"];?></div>
                                </div>
                            </div>
                        </a> 
                    <?php 
                        }
                        } else {
                            echo "<div class='no-records'>
                                    <img src='../../images/notFound.jpg' alt='No Requests' id='noReports'>
                                    <div class='message-noRecords'> No Products Found </div>  
                                </div>";
                        }
                    ?> 
                </div>
            </div>
            <?php require_once 'components/productFilter.php'; ?>
        </div>
        <script src="../../js/productSupplierFilter.js"></script>
    </body>

</html>
