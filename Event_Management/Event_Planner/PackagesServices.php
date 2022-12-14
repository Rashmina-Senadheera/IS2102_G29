<?php
include('eventplanner_sidenav.php');
include('eventplanner_header.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/packagesServicesEP.css">
</head>

<body>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> Packages & Services </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search Package" name="search">
                    <i class="fa fa-search icon"></i>
                </div>
                <button type="submit" class="srcButton">Search</button>
            </div>
        </div>
        <div class="gridMain">
            <div class="my-packages-container">

                <div class="add-new-section">
                    <a href="./AddNewPackage.php" class="add-new">Create new package</a>
                </div>

                <?php
                // Get user id from session
                $epID = $_SESSION['user_id'];

                // Get packages from database
                $sql = "SELECT * FROM packages WHERE ep_id = $epID";

                // Check if the query was successful
                if ($result = $conn->query($sql)) {
                    // Check if there are packages
                    if ($result->num_rows > 0) {
                        // Display packages
                        while ($row = $result->fetch_assoc()) {
                            $packageID = $row['package_id'];
                            $packageName = $row['package_name'];
                            $packageDescription = $row['description'];

                            // Get package image
                            $image_sql = "SELECT * FROM package_images WHERE package_id = $packageID LIMIT 1";
                            $image_result = $conn->query($image_sql);
                            $image_row = $image_result->fetch_assoc();
                            $packageImage = $image_row['image'];

                            // Display package with blob image
                            // echo $packageImage;
                            echo '<div class="card">
                                    <div class="content">
                                        <div class="imgBx">
                                            <img src="data:image/jpeg;base64,' . base64_encode($packageImage) . '">
                                        </div>
                                        <div class="contentBx">
                                            <h3>' . $packageName . '<br><span>' . $packageDescription . '</span></h3>
                                        </div>
                                    </div>
                                    <ul class="sci">
                                        <li>
                                            <a href="./EditPackage.php?packageID=' . $packageID . '">Edit</a>
                                        </li>
                                        <li>
                                            <a href="./DeletePackage.php?packageID=' . $packageID . '">Delete</a>
                                        </li>
                                    </ul>
                                </div>';
                        }
                    } else {
                        // Display no packages
                        echo '<div class="no-packages">No package available</div>';
                    }
                } else {
                    // Display error alert
                    echo '<script>alert("Something went wrong. Please try again later.")</script>';
                }

                ?>

            </div>
        </div>
    </div>

</body>

</html>