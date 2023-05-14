<?php
//check if there is a id in the url
if (isset($_GET['id'])) {
    $reqID = isset($_GET['reqID']) && !empty($_GET['reqID']) ? $_GET['reqID'] : 0;
    $id = $_GET['id'];
} else {
    header("Location: 404.php");
    exit();
}

require_once('eventplanner_sidenav.php');
require_once('eventplanner_header.php');
require_once('../controllers/commonFunctions.php');

$id = checkInput($id);
require_once('./controllers/getProductDetails.php');

// check if the user already requested a quotation for the selected event
$sql = "SELECT * FROM request_supplier_quotation WHERE for_cus_req = $reqID AND psId = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $alreadyRequested = true;
} else {
    $alreadyRequested = false;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/profileEP.css">
    <link rel="stylesheet" href="../../css/more-info.css">
</head>

<body>
    <div class="container-profile">
        <?php if ($alreadyRequested) { ?>
            <div class="ep-availability unavailable" style="text-align: center;">
                You have already requested a quotation from this supplier for the selected Customer Request.
            </div>
        <?php } ?>
        <div class="flex-container-profile">
            <div class="about">
                <div class="ps-images">
                    <div class="image">
                        <?php
                        if ($img_result->num_rows > 0) {
                            while ($image_row = $img_result->fetch_assoc()) {
                                $image = $image_row['image'];
                                $image = base64_encode($image);
                                // $image = 'data:' . $image_row['type'] . ';base64,' . $image;
                                $image = 'data:image/jpeg;base64,' . $image;
                                echo '<img src="' . $image . '" class="mySlides" alt="">';
                            }
                        } else {
                            echo '<img src="../../images/Suppliers/supplier_default.jpg" class="mySlides" alt="">';
                        }
                        ?>
                    </div>
                    <button class="display-left" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="display-right" onclick="plusDivs(1)">&#10095;</button>
                </div>
                <div class="product-title">
                    <div class="product-name">
                        <?php echo $title; ?>
                    </div>
                    <div class="product-cat">
                        <?php echo ucwords(showSupType($type)); ?>
                    </div>
                </div>
                <div class="product-descript">
                    <div class="sm-all-p">
                        <div class="sm-name">
                            <?php if (!$alreadyRequested) { ?>
                                <div class="actionBtn">
                                    <button type="button" class="accepted" style="margin-left: 0;" onclick="window.location='./request-quotation.php?id=<?php echo $id ?>&reqID=<?php echo $reqID ?>';">
                                        Request a Quotation
                                    </button>
                                </div>
                            <?php } ?>
                            <div class="actionBtn">
                                <button type="button" class="rejected" style="margin-left: 0;" onclick="window.location='Messages.php';">
                                    Message Supplier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="info">
                    <div class="personal-info">
                        <div class="product-info-heading">
                            Product / Service Description
                        </div>
                        <?php
                        if (!empty($suitable_for)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Suitable for</div>
                                    <div class="prof-data">' . $suitable_for . '</div>
                                </div>';
                        }
                        if (!empty($locations)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Available Locations</div>
                                    <div class="prof-data">' . $locations . '</div>
                                </div>';
                        }
                        if (!empty($provide)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Provide</div>
                                    <div class="prof-data">' . $provide . '</div>
                                </div>';
                        }
                        if (!empty($type_of_flowers)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Type of Flowers</div>
                                    <div class="prof-data">' . $type_of_flowers . '</div>
                                </div>';
                        }
                        if (!empty($height)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Height</div>
                                    <div class="prof-data">' . $height . '</div>
                                </div>';
                        }
                        if (!empty($quantity)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Quantity</div>
                                    <div class="prof-data">' . $quantity . '</div>
                                </div>';
                        }
                        if (!empty($catered_for)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Catered for</div>
                                    <div class="prof-data">' . $catered_for . '</div>
                                </div>';
                        }
                        if (!empty($transport)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Transport Provide</div>
                                    <div class="prof-data">' . $transport . '</div>
                                </div>';
                        }
                        if (!empty($available_as)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Available as</div>
                                    <div class="prof-data">' . $available_as . '</div>
                                </div>';
                        }
                        if (!empty($available_for)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Available as</div>
                                    <div class="prof-data">' . $available_for . '</div>
                                </div>';
                        }
                        if (!empty($transport_type)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Type of Transport</div>
                                    <div class="prof-data">' . $transport_type . '</div>
                                </div>';
                        }
                        if (!empty($brand)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Brand of Vehicle</div>
                                    <div class="prof-data">' . $brand . '</div>
                                </div>';
                        }
                        if (!empty($model)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Model of Vehicle</div>
                                    <div class="prof-data">' . $model . '</div>
                                </div>';
                        }
                        if (!empty($venloc)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Indoor/Outdoor</div>
                                    <div class="prof-data">' . $venloc . '</div>
                                </div>';
                        }
                        if (!empty($venlocation)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Location address</div>
                                    <div class="prof-data">' . $venlocation . '</div>
                                </div>';
                        }
                        if (!empty($ventype)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Type of Venue</div>
                                    <div class="prof-data">' . $ventype . '</div>
                                </div>';
                        }
                        if (!empty($maxCap)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Maximum Capacity</div>
                                    <div class="prof-data">' . $maxCap . ' people</div>
                                </div>';
                        }
                        if (!empty($minCap)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Minimum Capacity</div>
                                    <div class="prof-data">' . $minCap . 'people</div>
                                </div>';
                        }

                        ?>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Budget Range</div>
                            <div class="prof-data"><?php echo "Rs. $budget_min - Rs. $budget_max" ?></div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Description</div>
                            <div class="prof-data"><?php echo $description ?></div>
                        </div>
                        <?php
                        if (!empty($other_details)) {
                            echo '<div class="prof-all-p">
                                    <div class="prof-name-p">Other details</div>
                                    <div class="prof-data">' . $other_details . '</div>
                                </div>';
                        }
                        ?>
                        <!-- <div class="prof-all-p">
                            <div class="prof-name-p">Reviews & Feedbacks</div>
                            <div class="prof-feedback">I just loved the experience. I'm so happy to share my review.have no second thought and doubt in terms of quality of food ,decor and staff behaviour and management.wonderfull place and services.
                                <span class="fa fa-star starChecked"></span>
                                <span class="fa fa-star starChecked"></span>
                                <span class="fa fa-star starChecked"></span>
                                <span class="fa fa-star starChecked"></span>
                                <span class="fa fa-star starChecked"></span>
                            </div>
                            <div class="prof-feedback">Excellnt wedding hall.Good for raining days.Staff is polite and helpful.Price is very reasonable.reccommend forany function.
                                <span class="fa fa-star starChecked"></span>
                                <span class="fa fa-star starChecked"></span>
                                <span class="fa fa-star starChecked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <div class="prof-feedback">Nice Hall with 2 Floors. The Concerns are that there are No Lift and Less Parking Facility. Otherwise this is a great place to be.</div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function showDivs(n) {
            var i;
            var x = document.getElementsByClassName("mySlides");
            if (n > x.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex - 1].style.display = "block";
        }
    </script>
</body>

</html>