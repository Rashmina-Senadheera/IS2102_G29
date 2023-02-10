<?php
    include('../constants.php');
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
    include('../controllers/commonFunctions.php');

//check if there is a id in the url
if (isset($_GET['id'])) {
    $id = checkInput($_GET['id']);
    $sql = "SELECT * FROM request_supplier_quotation WHERE request_id = $id";
    $result = mysqli_query($conn, $sql);

    // check if the id is valid
    if (mysqli_num_rows($result) > 0) {
        $general_details = mysqli_fetch_assoc($result);
        $title = $general_details['title'];
        $remarks = $general_details['remarks'];
        // $other_details = $general_details['other_details'];
        // $budget_min = $general_details['budget_min'];
        // $budget_max = $general_details['budget_max'];
        // $type = $general_details['type'];
        // $img_sql = "SELECT `image` FROM supplier_product_images WHERE `product_id` = $id";
        // $img_result = mysqli_query($conn, $img_sql);

        //get other details according to the type
        $more_details = "SELECT * FROM sup_product_general G supplier_" . $type . "T WHERE G.product_id = T.product_id AND product_id = $id";

        // // check if the query is successful
        // if ($more_result = mysqli_query($conn, $more_details)) {
        //     $more_details = mysqli_fetch_assoc($more_result);

        //     $suitable_for = !empty($more_details['suitable_for']) ? $more_details['suitable_for'] : "";
        //     $locations = !empty($more_details['locations']) ? $more_details['locations'] : "";
        //     $provide = !empty($more_details['provide']) ? $more_details['provide'] : "";
        //     $type_of_flowers = !empty($more_details['type_of_flowers']) ? $more_details['type_of_flowers'] : "";
        //     $height = !empty($more_details['height']) ? $more_details['height'] : "";
        //     $quantity = !empty($more_details['quantity']) ? $more_details['quantity'] : "";
        //     $catered_for = !empty($more_details['catered_for']) ? $more_details['catered_for'] : "";
        //     $transport = !empty($more_details['transport']) ? $more_details['transport'] : "";
        //     $available_as = !empty($more_details['available_as']) ? $more_details['available_as'] : "";
        //     $available_for = !empty($more_details['available_for']) ? $more_details['available_for'] : "";
        //     $transport_type = !empty($more_details['type']) ? $more_details['type'] : "";
        //     $brand = !empty($more_details['brand']) ? $more_details['brand'] : "";
        //     $model = !empty($more_details['model']) ? $more_details['model'] : "";
        //     $venloc = !empty($more_details['venloc']) ? $more_details['venloc'] : "";
        //     $venlocation = !empty($more_details['venlocation']) ? $more_details['venlocation'] : "";
        //     $ventype = !empty($more_details['ventype']) ? $more_details['ventype'] : "";
        //     $maxCap = !empty($more_details['maxCap']) ? $more_details['maxCap'] : "";
        //     $minCap = !empty($more_details['minCap']) ? $more_details['minCap'] : "";
        // } else {
        //     echo "Error: " . $more_details . "<br>" . mysqli_error($conn);
        // }
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
    <link rel="stylesheet" href="../../css/profileEP.css">
    <link rel="stylesheet" href="../css/quote-view.css">
</head>

<body>
    <!-- <div class="gridMain"> -->
    <div class = 'container-main'>
        <div class = 'flex-container-main'>
                <div class="title-search">
                    <div class = 'searchSec'>
                        <div class = 'page-title'><?php echo $title; ?></div>
                    </div>
                </div>
            </div>
        <div class="flex-container-profile" style="height: 90%;">
            <div class="about" style="margin-top: 0px;">
                <div class="personal-info">
                    <div class="personal-info-heading" style="width: 90%;">
                        Product/Service Details
                    </div>
                    <div class="prof-all">
                        <img src="../images/Villa-Balbiano.png" alt="" id="about-img">
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Location:</div>
                        <div class="prof-data"><?php echo $title; ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Max Participants:</div>
                        <div class="prof-data">170</div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Min Participants:</div>
                        <div class="prof-data">20</div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Catered for:</div>
                        <div class="prof-data">Indoor</div>
                    </div>
                    <div class="personal-info-heading-avail" style="width: 90%;">
                        Availability on Requested Date
                    </div>
                    <div class="actionBtn" id="avail">
                        <button type="button" class="available" id="avail" style="margin-left: 0;">
                            Available
                        </button>
                    </div>
                </div>
            </div>
            <div class="other" id="quote" style="margin-top: 0px;margin-right:0px;">
                
                <div class="personal-info" style="margin-bottom: 0px; margin-top: 5px;">
                    <div class="personal-info-heading" id="quoteb" style="width: 90%;">
                        Quotation Event Details
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Event Type:</div>
                        <div class="prof-data">Wedding</div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Participants:</div>
                        <div class="prof-data">170</div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Hours:</div>
                        <div class="prof-data">6 hours</div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Tentative Date:</div>
                        <div class="prof-data">2022-07-15</div>
                    </div>
                     <div class="prof-all">
                        <div class="prof-name-50">Remarks:</div>
                        <div class="prof-data">Need the quotation to be submitted as soon as possible with the necessary details</div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Urgency:</div>
                        <div class="prof-data" id="urg">Urgent</div>
                    </div>
                    <div class="actionBtn">
                        <button type="button" id="btnDecline" class="rejected" style="margin-left: 0;">
                            Decline
                        </button>
                        <a href="SendEventPlannerQuote.php">
                            <button type="button" class="accepted" style="margin-left: 0;">
                                Send Quotation
                            </button>
                        </a>
                    </div>
                </div>
                <div class="personal-info" id="quote" style="margin-top: 0px;">
                    <div class="personal-info-heading" style="width: 90%;">
                        Event Planner Profile
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-20">Name:</div>
                        <div class="contact">Chandana Sooriyabandara</div>
                    </div>
                     <div class="prof-all">
                        <div class="prof-name-20">Contact :</div>
                        <div class="contact">
                            <i class="fa-solid fa-envelope"  id="qu-con"></i>hhshaminf@gmail.com
                            <i class="fa-solid fa-phone" id="qu-conm"></i>0777931062
                            <i class="fa-brands fa-rocketchat" id="qu-conme"></i><a href = "Messages.php"> <b>Message</b> <a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div id="kModal" class="modal">
        <!-- Modal content -->
        <div class="modal-decline">
            <div class="modal-header">
                <span class="close1">&times;</span>
                Are you sure you want to decline this request?
            </div>
            <div class="modal-body">
                <div class="actionBtn">
                    <button type="button" id="cancelde" class="rejected" style="margin-left: 0;">
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

<script>
    // Get the modal
    var modal = document.getElementById("kModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close1")[0];

    // When the user clicks the button, open the modal 
    btnDecline.onclick = function() {
        modal.style.display = "block";
    }

    cancelde.onclick = function() {
        modal.style.display = "none";
    }
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</html>