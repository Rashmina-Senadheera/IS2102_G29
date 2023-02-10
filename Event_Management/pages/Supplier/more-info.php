<?php
    include('../constants.php');
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
    include('../controllers/commonFunctions.php');

//check if there is a id in the url
if (isset($_GET['id'])) {
    $id = checkInput($_GET['id']);
    $sql = "SELECT * FROM sup_product_general WHERE product_id = $id";
    $result = mysqli_query($conn, $sql);

    // check if the id is valid
    if (mysqli_num_rows($result) > 0) {
        $general_details = mysqli_fetch_assoc($result);
        $title = $general_details['title'];
        $description = $general_details['description'];
        $other_details = $general_details['other_details'];
        $budget_min = $general_details['budget_min'];
        $budget_max = $general_details['budget_max'];
        $type = $general_details['type'];
        $img_sql = "SELECT `image` FROM supplier_product_images WHERE `product_id` = $id";
        $img_result = mysqli_query($conn, $img_sql);

        // get other details according to the type
        $more_details = "SELECT * FROM supplier_" . $type . "  WHERE product_id = $id";

        // check if the query is successful
        if ($more_result = mysqli_query($conn, $more_details)) {
            $more_details = mysqli_fetch_assoc($more_result);

            $suitable_for = !empty($more_details['suitable_for']) ? $more_details['suitable_for'] : "";
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
            $venloc = !empty($more_details['venloc']) ? $more_details['venloc'] : "";
            $venlocation = !empty($more_details['venlocation']) ? $more_details['venlocation'] : "";
            $ventype = !empty($more_details['ventype']) ? $more_details['ventype'] : "";
            $maxCap = !empty($more_details['maxCap']) ? $more_details['maxCap'] : "";
            $minCap = !empty($more_details['minCap']) ? $more_details['minCap'] : "";
        } else {
            echo "Error: " . $more_details . "<br>" . mysqli_error($conn);
        }
    } else {
        header("Location: 404.php");
    }
} else {
    header("Location: 404.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = 'stylesheet' href = '../../css/supplierMain.css'>
    <link rel="stylesheet" href="../../css/profile.css">
    <link rel="stylesheet" href="../../css/more-info.css">
</head>

<body>
    <div class="container-profile">
        <div class="flex-container-profile">
            <div class="about">
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
                    <button class="display-left" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="display-right" onclick="plusDivs(1)">&#10095;</button>
                </div>
                <div class="product-title">
                    <div class="product-name">
                        <?php echo $title;?>
                    </div>    
                    <div class="product-cat">
                        <?php $title;?>
                    </div> 
                </div>
                <div class="product-descript">
                    <div class="sm-all-p">
                        <div class="sm-name">
                            <?php echo $description?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="info">
                    <div class="personal-info">
                        <div class="personal-info-heading">
                            Product Description
                        </div> 
                        <div class="prof-all-p">
                            <div class="prof-name-p">Catered For</div>
                            <div class="prof-data"><?php echo $venloc;?></div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Venue Location</div>
                            <div class="prof-data"><?php echo $venlocation;?></div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Venue Type</div>
                            <div class="prof-data"><?php echo $ventype;?></div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Maximum Capacity</div>
                            <div class="prof-data"><?php echo $maxCap ;?></div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Minimum Capacity</div>
                            <div class="prof-data"><?php echo $minCap;?></div>
                        </div>
                       

                         <div class="prof-all-e">
                                <a href="form-venue_edit.php?id=<?php echo $id;?>" class="custom-button-e" id="ed">
                                    Edit
                                </a>
                                <button type="button" class="custom-button-e" id="del">Delete</button>
                            </div>
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
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    x[slideIndex-1].style.display = "block";  
    }
    </script>
</body>

</html>