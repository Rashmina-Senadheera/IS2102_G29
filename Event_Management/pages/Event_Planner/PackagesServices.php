<?php
require_once('eventplanner_sidenav.php');
require_once('eventplanner_header.php');
require_once('../controllers/commonFunctions.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/packagesServicesEP.css">
</head>

<body>
    <!-- Show success message -->
    <?php
    if (isset($_SESSION['success'])) {
        echo '<div class="success-message">' . showSessionMessage("success") . '</div>';
    }
    ?>
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
                                    <div class="content clickable" onclick="viewPackageDetails(' . $packageID . ')">
                                        <div class="imgBx">
                                            <img src="data:image/jpeg;base64,' . base64_encode($packageImage) . '">
                                        </div>
                                        <div class="contentBx">
                                            <h3>' . $packageName . '<br><span>' . $packageDescription . '</span></h3>
                                        </div>
                                    </div>
                                    <ul class="sci">
                                        <li>
                                            <a class="edit-package" href="PackagesServices-edit.php?packageId=' . $packageID . '">Edit</a>
                                        </li>
                                        <li>
                                            <button class="delete-package" type="button" onclick="declineRequest()">
                                                Delete
                                            </button>
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

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-decline">
            <div class="modal-header">
                <span class="close">&times;</span>
                Are you sure you want to decline this request?
            </div>
            <div class="modal-body">
                <div class="actionBtn">
                    <button type="button" class="rejected" style="margin-left: 0;">
                        Cancel
                    </button>
                    <a href="SendCustomerQuotation.php">
                        <button type="button" class="accepted" style="margin-left: 0;">
                            Yes, Decline
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

</body>
<script src="../js/eventPlannerMain.js"></script>
<script>
    var modal = document.getElementById("myModal");
    var btnDelete = document.getElementById("btnDelete");

    btnDelete.onclick = function() {
        modal.style.display = "block";
    }

    function viewPackageDetails(packageID) {
        window.location.href = "PackagesServices-more.php?packageId=" + packageID;
    }

</script>

</html>