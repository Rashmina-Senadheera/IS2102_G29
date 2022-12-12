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
    <!-- get value in post to a hidden input -->
    <input type="hidden" id="type" value="<?php echo $_POST['quotation-type']; ?>" />

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
                    <div class="input width-50 hide" id="foodMethod">
                        <!-- Packets, Buffet -->
                        <label class="input-label">Method <span>*</span></label>
                        <input type="text" class="input-field" required />
                    </div>
                    <div class="input width-50 hide" id="foodNeedFor">
                        <!-- Breackfast, Lunch, Dinner, Brunch, High-Tea -->
                        <label class="input-label">Need for <span>*</span></label>
                        <input type="text" class="input-field" required />
                    </div>
                    <div class="input width-50 hide" id="photographsIn">
                        <!-- Indoor, Outdoor -->
                        <label class="input-label">Photographs in <span>*</span></label>
                        <input type="text" class="input-field" required />
                    </div>
                    <div class="input width-50 hide" id="photoOptions">
                        <!-- DVD, Prints, Book -->
                        <label class="input-label">Options <span>*</span></label>
                        <input type="text" class="input-field" required />
                    </div>
                    <div class="input width-50 hide" id="performeIn">
                        <!-- Indoor, Outdoor -->
                        <label class="input-label">Performe in <span>*</span></label>
                        <input type="text" class="input-field" required />
                    </div>
                    <div class="input width-50 hide" id="entertainmentsNeed">
                        <!-- Music, Dance, other -->
                        <label class="input-label">Need <span>*</span></label>
                        <input type="text" class="input-field" required />
                    </div>
                </div>
                <div class="row">
                    <div class="input width-50 hide" id="noOfParticipants">
                        <label class="input-label">Number of Participants <span>*</span></label>
                        <input type="text" class="input-field" required />
                    </div>
                    <div class="input width-50 hide" id="transportLocations">
                        <label class="input-label">Locations </label>
                        <input type="text" class="input-field" required />
                    </div>
                    <div class="input width-50 hide" id="hours">
                        <label class="input-label">Hours </label>
                        <input type="text" class="input-field" required />
                    </div>
                    <div class="input width-50 hide" id="theme">
                        <label class="input-label">Theme <span>*</span></label>
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

<script>
    const type = document.getElementById('type').value;

    const foodMethod = document.getElementById('foodMethod');
    const foodNeedFor = document.getElementById('foodNeedFor');
    const photographsIn = document.getElementById('photographsIn');
    const photoOptions = document.getElementById('photoOptions');
    const performeIn = document.getElementById('performeIn');
    const entertainmentsNeed = document.getElementById('entertainmentsNeed');
    const noOfParticipants = document.getElementById('noOfParticipants');
    const transportLocations = document.getElementById('transportLocations');
    const hours = document.getElementById('hours');
    const theme = document.getElementById('theme');

    if (type == "Catering") {
        foodMethod.classList.remove('hide');
        foodNeedFor.classList.remove('hide');
        noOfParticipants.classList.remove('hide');
    } else if (type == "Photography") {
        photographsIn.classList.remove('hide');
        photoOptions.classList.remove('hide');
        hours.classList.remove('hide');
        theme.classList.remove('hide');
    } else if (type == "Entertainment") {
        performeIn.classList.remove('hide');
        entertainmentsNeed.classList.remove('hide');
        hours.classList.remove('hide');
    } else if (type == "Transport") {
        console.log("Transport");
        transportLocations.classList.remove('hide');
        hours.classList.remove('hide');
    } else if (type == "Decoration") {
        theme.classList.remove('hide');
    } else if (type == "Beverages") {
        noOfParticipants.classList.remove('hide');
    } else if (type == "Florists") {
        theme.classList.remove('hide');
    } else if (type == "Venue") {
        noOfParticipants.classList.remove('hide');
        hours.classList.remove('hide');
    } else {
        // enter all details in remarks
    }
</script>

</html>