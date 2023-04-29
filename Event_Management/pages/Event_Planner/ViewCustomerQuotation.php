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
    <link rel="stylesheet" href="../../css/formEP.css">
</head>

<body>
    <div class="main-body">

        <div class="form-card scrollable">
            <div class="form-title">Requested Details</div>
            <div class="form-description">The customer has requested the quotation for the following details.</div>

            <div class="formSection">General
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Requested On:</label>
                        <div class="input-value">2022-05-01</div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Event Type:</label>
                        <div class="input-value">Wedding</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Participants:</label>
                        <div class="input-value">170</div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Theme:</label>
                        <div class="input-value">Classic</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Tentative Date:</label>
                        <div class="input-value">2022-07-15</div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Budget:</label>
                        <div class="input-value">Rs. 560,000</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Time:</label>
                        <div class="input-value">10:00 AM</div>
                    </div>
                </div>
            </div>

            <div class="formSection">Venue
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Type:</label>
                        <div class="input-value">Banquet Hall</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input input-background">
                        <label class="input-label">Remarks:</label>
                        <div class="input-value">We want a hall that looks good on the outside as well. And the seats should be comfortable.</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input">
                        <label class="input-label">Supplier Quotations related to this event:</label>
                        <table>
                            <tr>
                                <td>Bravo Event Productions</td>
                                <td>Rs. 154,000.00</td>
                            </tr>
                            <tr>
                                <td>Bandu River Hotel</td>
                                <td>Rs. 142,000.00</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="formSection">Food & Beverages
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Need as:</label>
                        <div class="input-value">Buffet</div>
                    </div>
                    <div class="input-50">
                        <label class="input-label">Need for:</label>
                        <div class="input-value">Lunch</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-50">
                        <label class="input-label">Preferences:</label>
                        <div class="input-value">Non Veg</div>
                    </div>
                </div>
                <div class="row">
                    <div class="input input-background">
                        <label class="input-label">Remarks:</label>
                        <div class="input-value">Grilled chicken salad with mixed greens, cherry tomatoes, cucumbers, and a honey mustard dressing.</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-card scrollable">
            <form method="POST" action="controllers/addNewPackage.php" enctype="multipart/form-data">
                <div class="form-title">Quotation</div>
                <!-- <div class="form-description"></div> -->
                <div class="row">
                    <div class="input">
                        <label class="input-label">Event Planner's Cost</label>
                        <input type="text" class="input-field" name="packageName" placeholder="Cost" value="48000" disabled />
                    </div>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Venue</label>
                            <input type="text" class="input-field" name="packageName" placeholder="Supplier Name / Product Name"  value="Bravo Event Productions" disabled/>
                            <input type="text" class="input-field" name="packageName" placeholder="Cost" style="margin-top: 5px;"  value="154000" disabled/>

                        </div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Food & Beverages</label>
                            <input type="text" class="input-field" name="packageName" placeholder="Supplier Name / Product Name" value="Gunasinghe Catering" disabled />
                            <input type="text" class="input-field" name="packageName" placeholder="Cost" style="margin-top: 5px;" value="251000" disabled />
                        </div>
                    </div>
                    <div class="row">
                        <div class="input">
                            <label class="input-label">Remarks <span class="desc">(Other expenses or special notes.)</span></label>
                            <textarea class="input-field" rows="5" name="description" disabled>This quotation is valid only for 10 days. If you want to book, please contact us within 10 days.</textarea>
                        </div>
                    </div>
                    <div class="action btnSend">
                        <input type="submit" value="Contact" class="action-button" />
                    </div>
            </form>
        </div>
    </div>

</body>

</html>