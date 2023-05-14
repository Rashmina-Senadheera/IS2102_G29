<?php

include_once '../../constants.php';

// get the request id if it is set

$id = $_SESSION['user_id'];

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    $budget = $_GET['budget'];
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
    if ($search != "" && $type != "" ) {
        $sql = "SELECT `product_ID`, `title`, `description`, `type` FROM sup_product_general WHERE (`title` LIKE '%" . $search . "%' OR `description` LIKE '%" . $search . "%') AND (" . $dbTypes . ") AND supplier_ID = $id ORDER BY `budget_min` " . $budget ."";
    } else if ($search == "" && $type != "") {
        $sql = "SELECT `product_ID`, `title`, `description`, `type` FROM sup_product_general WHERE " . $dbTypes." AND supplier_ID = $id ORDER BY `budget_min` " . $budget ."";
    } else if ($search != "" && $type == "") {
        $sql = "SELECT `product_ID`, `title`, `description`, `type` FROM sup_product_general WHERE (`title` LIKE '%" . $search . "%' OR `description` LIKE '%" . $search . "%') AND supplier_ID = $id ORDER BY `budget_min` " . $budget ."";
    } else {
        $sql = "SELECT `product_ID`, `title`, `description`, `type` FROM sup_product_general WHERE supplier_ID = $id ORDER BY `budget_min` " . $budget ."";
    }
} else {
    $sql = "SELECT `product_ID`, `title`, `description`, `type` FROM sup_product_general WHERE supplier_ID = $id ";
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $productID = $row['product_ID'];
        $title = $row['title'];
        $description = $row['description'];
        $type = $row['type'];
        $img_sql = "SELECT `image` FROM supplier_product_images WHERE `product_ID` = " . $row['product_ID'] . " LIMIT 1";
        $img_result = mysqli_query($conn, $img_sql);
        $img_row = mysqli_fetch_assoc($img_result);
        $img =isset($img_row['image']) ? $img_row['image'] : 0;
        ?>
            <a href='more-info.php?id=<?php echo $row["product_ID"];?>' id='a-card'>
                <div class='ps-card'>
                    <div class='ps-card-img'>
                        <img src= <?php 
                        if (!$img){
                            echo "../../images/imageNot.png";
                        }else{
                            echo "data:image/jpeg;base64,".base64_encode($img);
                        }
                        ?>> 
                    </div>
                    <div class='ps-card-desc'>
                         <div class='ps-ptype'><?php 
                                    switch($row["type"]){
                                        case 'venue':
                                            echo "Venue";
                                            break;
                                        case 'foodbev':
                                            echo "Catering";
                                            break;
                                        case 'transport':
                                            echo "Transport";
                                            break;
                                        case 'florist':
                                            echo "Floral Deco ";
                                            break;
                                        case 'deco':
                                            echo "Decorations ";
                                            break;
                                        case 'photo':
                                            echo "Photography ";
                                            break;
                                        case 'ent':
                                            echo "Entertainment ";
                                            break;
                                        case 'other':
                                            echo "Other ";
                                            break;
                                        default:
                                            echo $row["type"];
                                    }
                                    ?></div>
                        <div class='ps-title'><?php echo $row["title"];?></div>
                        <div class='ps-type'><?php echo $row["description"];?></div>
                    </div>
                </div>
            </a> 
        <?php 
            }
            } else {
                echo "<div class='no-records'>
                        <img src='../../images/notFound.jpg' alt='No Requests' id='noRecords'>
                        <div class='message-noRecords'> No Products Found </div>  
                    </div>";
            }
        ?> 
