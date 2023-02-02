<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/profileEP.css">
</head>

<body>
    <!-- <div class="gridMain"> -->
    <div class="container-profile">
        <div class="flex-container-profile">
            <div class="about">
                <div class="personal-info-heading" style="width:90%;">
                    General Details         
                </div>
                <div>
                <div class="sm-all">
                        <div class="sm-name">Event Type:</div>
                        <div class="sm-link">Birthday</div>
                    </div>
                    <div class="sm-all">
                        <div class="sm-name">Number of Participants:</div>
                        <div class="sm-link">400</div>
                    </div>
                    <div class="sm-all">
                        <div class="sm-name">Theme:</div>
                        <div class="sm-link">Sea Theme</div>
                    </div>
                    <div class="sm-all">
                        <div class="sm-name">Tentative date:</div>
                        <div class="sm-link">From: 2023-02-23 <br> To : 2023-03-05</div>
                    </div>  
                    <div class="sm-all">
                        <div class="sm-name">Budget:</div>
                        <div class="sm-link">Min: 1,000,000 <br> Max: 2,000,000</div>
                    </div> 
                    <div class="sm-all">
                        <div class="sm-name">Time:</div>
                        <div class="sm-link">From: 9.00 a.m. <br> To : 4.00 p.m.</div>
                    </div>     
                </div><br>
                <div class="personal-info-heading" style="width:90%;">
                    Event Planner Details         
                </div>
                <div class="sm-all">
                        <div class="sm-name">Name:</div>
                        <div class="sm-link">M.M.Sanath Weerasinghe</div>
                </div>
                <div class="sm-all">
                        <div class="sm-name">Email:</div>
                        <div class="sm-link">sanath77@gmail.com</div>
                </div>
                <div class="sm-all">
                        <div class="sm-name">Contact:</div>
                        <div class="sm-link">0717722345</div>
                </div>
            </div>
            <div class="other">
                <div class="info">
                    <div class="personal-info">
                        <div class="personal-info-heading">
                            Event Details
                        </div>
                        <div class="profile-name">
                            Venue          
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Type:</div>
                            <div class="prof-data">Indoor</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Location:</div>
                            <div class="prof-data">Auditorium</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Remarks:</div>
                            <div class="prof-data">Experience our uniquely created Summerfell brand.</div>
                        </div>
                        <div class="profile-name">
                            Food & Beverages          
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Available in:</div>
                            <div class="prof-data">Buffet</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Available at:</div>
                            <div class="prof-data">Breakfast</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Preferences:</div>
                            <div class="prof-data">Veg</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Remarks:</div>
                            <div class="prof-data">Experience our uniquely created Summerfell brand.</div>
                        </div>
                        <div class="profile-name">
                            Sound & Lightning         
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Sound Type:</div>
                            <div class="prof-data">Dj</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Light Type:</div>
                            <div class="prof-data">LED</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Remarks:</div>
                            <div class="prof-data">Experience our uniquely created Summerfell brand.</div>
                        </div>
                        <div class="profile-name">
                            Photography & Videography         
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Photography Preferences:</div>
                            <div class="prof-data">Drawing with light</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Videography Preferences:</div>
                            <div class="prof-data">Shoot and edit video footage</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Remarks:</div>
                            <div class="prof-data">Experience our uniquely created Summerfell brand.</div>
                        </div>
                        <br >
                        <center>
                            <a href="order.php"><button type="submit" class="srcButton">Back</button>
                        </center>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</body>


</html>