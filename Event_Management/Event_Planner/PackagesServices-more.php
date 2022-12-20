<?php

// variable to check images and services
$hasPackage = false;

if (isset($_GET['packageId'])) {
    // Start output buffering
    ob_start();

    include('eventplanner_sidenav.php');
    include('eventplanner_header.php');

    $packageId = $_GET['packageId'];
    $sql = "SELECT * FROM packages WHERE package_id = $packageId";

    // execute query and check if successful
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // check if the user is the owner of the package
            if ($row['ep_id'] == $_SESSION['user_id']) {
                $hasPackage = true;
                $packageName = $row['package_name'];
                $packageType = $row['event_type'];
                $packagePrice = $row['price_start'];
                $packageDescription = $row['description'];
            } else {
                header("Location: ./403.php");
                exit();
            }
        } else {
            header("Location: ./404.php");
            exit();
        }
    }

    // Send the output buffer to the browser and turn off output buffering
    ob_end_flush();
} else {
    header("Location: ./PackagesServices.php");
    exit();
}

// avoid fetching images and services in the buffer
if ($hasPackage) {
    // get package image
    $image_sql = "SELECT * FROM package_images WHERE package_id = $packageId";
    $image_result = $conn->query($image_sql);

    // get package services
    $services_sql = "SELECT * FROM package_services WHERE package_id = $packageId";
    $services_result = $conn->query($services_sql);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/profileEP.css">
    <link rel="stylesheet" href="../css/more-info.css">
</head>

<body>
    <div class="container-profile">
        <div class="flex-container-profile">
            <div class="about">
                <div class="ps-images">
                    <div class="image">
                        <?php
                        if ($image_result->num_rows > 0) {
                            while ($image_row = $image_result->fetch_assoc()) {
                                $image = $image_row['image'];
                                $image = base64_encode($image);
                                $image = 'data:' . $image_row['type'] . ';base64,' . $image;
                                echo '<img src="' . $image . '" class="mySlides" alt="">';
                            }
                        } else {
                            echo '<img src="../images/Suppliers/supplier01.jpg" alt="">';
                        }
                        ?>
                    </div>
                    <button class="display-left" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="display-right" onclick="plusDivs(1)">&#10095;</button>
                </div>
                <div class="product-title">
                    <div class="product-name">
                        <?php echo $packageName; ?>
                    </div>
                    <div class="product-cat">
                        <?php echo $packageType; ?>
                    </div>
                </div>
                <div class="product-descript">
                    <div class="sm-all-p">
                        <div class="sm-name">
                            <div class="actionBtn">
                                <a href="PackagesServices-edit.php?packageId=<?php echo $packageId; ?>">
                                    <button type="button" name="quotation-type" value="Venue" class="accepted">
                                        Edit Package
                                    </button>
                                </a>
                            </div>
                            <div class="actionBtn">
                                <button type="button" class="rejected" style="margin-left: 0;">
                                    Delete
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
                            Package Details & Services
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Price start from</div>
                            <div class="prof-data">
                                Rs. <?php echo $packagePrice; ?>
                            </div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Description</div>
                            <div class="prof-data">
                                <?php echo $packageDescription; ?>
                            </div>
                        </div>

                        <div class="prof-all-p">
                            <div class="prof-name-p">Services Provides</div>
                            <?php
                            if ($services_result->num_rows > 0) {
                                while ($services_row = $services_result->fetch_assoc()) {
                                    echo '<div class="prof-feedback">' . $services_row['service'] . '</div>';
                                }
                            } else {
                                echo '<div class="prof-feedback">No Services</div>';
                            }
                            ?>
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