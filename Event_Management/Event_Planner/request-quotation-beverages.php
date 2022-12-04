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
    <link rel="stylesheet" href="../css/formEP.css">
</head>

<body>
    <div class="main-body">
        <div class="form-card">
            <form>
                <div class="form-description"></div>
                <div class="row">
                    <div class="input width-50">
                        <label class="input-label">Date <span>*</span></label>
                        <input type="date" class="input-field" required />
                    </div>
                    <div class="input width-50">
                        <label class="input-label">Event Type <span>*</span></label>
                        <select name="eventType" class="input-field" onchange="test()">
                            <option value="" disabled selected>Select Event Type...</option>
                            <option value="Birthday">Birthday</option>
                            <option value="Company Party">Company Party</option>
                            <option value="Conference">Conference</option>
                            <option value="Exhibition">Exhibition</option>
                            <option value="Exhibition">Musical Show</option>
                            <option value="Seminar">Seminar</option>
                            <option value="Sports and Competition">Sports and Competition</option>
                            <option value="Wedding">Wedding</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="input width-50">
                        <label class="input-label" id="noOfParticipants">Number of Participants <span>*</span></label>
                        <input type="text" class="input-field" required />
                    </div>
                </div>

                <div class="row">
                    <div class="input">
                        <label class="input-label">Remarks </label>
                        <!-- <input type="text" class="input-field" required /> -->
                        <textarea class="input-field" rows="5"></textarea>
                    </div>
                </div>
                <div class="action">
                    <input type="submit" value="Request Quotation" class="action-button" />
                </div>
            </form>
        </div>
    </div>

</body>

</html>