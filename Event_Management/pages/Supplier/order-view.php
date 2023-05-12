<?php
    include('../../constants.php');
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/profileSup.css">
    <link rel="stylesheet" href="../css/quote-view.css">
</head>

<body>
    <!-- <div class="gridMain"> -->
    <div class = 'container-main'>
        <div class = 'flex-container-main'>
                <div class="title-search">
                    <div class = 'searchSec'>
                        <div class = 'page-title'>Order for Bravo Event Productions Hall</div>
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
                        <div class="prof-data">Aluthge Road, Galle</div>
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
                        <div class="prof-name-50">Quotation:</div>
                        <div class="prof-data">#Q0010</div>
                    </div>
                     <div class="prof-all">
                        <div class="prof-name-50">Remarks:</div>
                        <div class="prof-data">Need the quotation to be submitted as soon as possible with the necessary details</div>
                    </div>
                    <div class="actionBtn">
                        <button type="button" id="btnDecline" class="rejected" style="margin-left: 0;">
                            Decline
                        </button>
                        <a href="SendEventPlannerAccept.php">
                            <button type="button" class="accepted" style="margin-left: 0;">
                                Accept Order
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
                            <i class="fa-brands fa-rocketchat" id="qu-conme"></i> <a href = "Messages.php"> <b>Message</b> <a>
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