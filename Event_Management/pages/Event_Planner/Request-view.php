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
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/profileEP.css">
</head>

<body>
    <!-- <div class="gridMain"> -->
    <div class="container-profile" style="padding-left: 20px;">
        <div class="gridSearch" style="margin-top: 10px;">
            <div class="searchSec">
                <div class="page-title">Quotation Request</div>
            </div>
        </div>
        <div class="flex-container-profile" style="height: 95%;">
            <div class="about">
                <div class="personal-info">
                    <div class="personal-info-heading">
                        General
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Requested On:</div>
                        <div class="prof-data">2022-05-01</div>
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
                        <div class="prof-name-50">Theme:</div>
                        <div class="prof-data">Classic</div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Tentative Date:</div>
                        <div class="prof-data">2022-07-15</div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Budget:</div>
                        <div class="prof-data">Rs. 560,000</div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Time:</div>
                        <div class="prof-data">10:00 AM</div>
                    </div>

                    <div class="personal-info-heading" style="width: 50%; margin-top: 40px;">
                        Customer Profile
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Name:</div>
                        <div class="prof-data">Chandana Sooriyabandara</div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Email:</div>
                        <div class="prof-data">chandanaS@gmail.com</div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Contact:</div>
                        <div class="prof-data">0742514385</div>
                    </div>
                    <div class="actionBtn">
                        <button type="button" class="rejected" style="margin-left: 0;" onclick="window.location='Messages.php';">
                            Message
                        </button>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="info">
                    <div class="personal-info">
                        <div class="personal-info-heading">
                            Venue
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Type:</div>
                            <div class="prof-data">Banquet Hall</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Remarks:</div>
                            <div class="prof-data">We want a hall that looks good on the outside as well. And the seats should be comfortable.</div>
                        </div>

                        <div class="personal-info-heading">
                            Food & Beverages
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Need as:</div>
                            <div class="prof-data">Buffet</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Need for:</div>
                            <div class="prof-data">Lunch</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Preferences:</div>
                            <div class="prof-data">Non Veg</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Remarks:</div>
                            <div class="prof-data">Grilled chicken salad with mixed greens, cherry tomatoes, cucumbers, and a honey mustard dressing.</div>
                        </div>
                    </div>
                    <div class="actionBtn">
                        <button type="button" id="btnDecline" class="rejected" style="margin-left: 0;">
                            Decline
                        </button>
                        <a href="SendCustomerQuotation.php">
                            <button type="button" class="accepted" style="margin-left: 0;">
                                Send Quotation
                            </button>
                        </a>
                    </div>
                </div>
                <!-- <div class="p-s-info">
                    <main role="main">
                        <div class="personal-info-heading">
                            Customer Profile
                        </div>
                        <a href="#"><span class="tag tag-javascript tag-lg">#ListOfEventTypes</span></a>
                    </main>
                </div> -->
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

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btnDecline.onclick = function() {
        modal.style.display = "block";
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