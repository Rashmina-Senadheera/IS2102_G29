<?php
include('eventplanner_sidenav.php');
include('eventplanner_header.php');

// check method is post
if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_POST['quotation-type']) || !isset($_POST['ps-id'])) {
    // show error message
    echo "<script>alert('No product or service selected!')</script>";
    // redirect to event planner main page
    echo "<script>window.location.href = 'Suppliers.php'</script>";
} else {
    // $psType = 'Entertainment';
    $psType = $_POST['quotation-type'];
    $psId = $_POST['ps-id'];
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/eventPlannerMain.css">
        <link rel="stylesheet" href="../css/formEP.css">
        <link rel="stylesheet" href="../css/requestQuotationEP.css">
    </head>

    <body>
        <div class="main-body">
            <div class="form-card2">
                <div class="searchSec">
                    <div class="page-title">Request Quotation for <?php echo $_POST['ps-title'] ?></div>
                </div>
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

                    <?php if ($psType == "Beverage" || $psType == "Catering") { ?>
                        <div class="row">
                            <div class="input width-50" id="noOfParticipants">
                                <label class="input-label">Number of Participants <span>*</span></label>
                                <input type="text" class="input-field" required />
                            </div>
                            <div class="input width-50" id="transportLocations">
                                <label class="input-label">Locations </label>
                                <input type="text" class="input-field" required />
                            </div>
                        </div>
                        <div class="row" id='check'>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Catered for <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Indoor Catering</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Outdoor Catering</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Transport <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="radio" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Needed</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="radio" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Not Needed</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id='check'>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Need as <span>*</span></label>
                                <?php if ($psType == "Beverage") { ?>
                                    <div class="check-bx">
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                            <label for="" class="input-ps-label-opt">Bottle</label>
                                        </div>
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                            <label for="" class="input-ps-label-opt">In bulk</label>
                                        </div>
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                            <label for="" class="input-ps-label-opt">Cups/Packets</label>
                                        </div>
                                    </div>
                                <?php } else if ($psType == "Catering") { ?>
                                    <div class="check-bx">
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                            <label for="" class="input-ps-label-opt">Packets</label>
                                        </div>
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                            <label for="" class="input-ps-label-opt">Buffet</label>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Need For <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Breakfast</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Lunch</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Dinner</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Brunch</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">High-Tea</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } else if ($psType == "Transport") { ?>
                        <div class="row">
                            <div class="input width-50" id="noOfParticipants">
                                <label class="input-label">Location (From) <span>*</span></label>
                                <input type="text" class="input-field" required />
                            </div>
                            <div class="input width-50" id="transportLocations">
                                <label class="input-label">Location (To) <span>*</span></label>
                                <input type="text" class="input-field" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="input width-50" id="noOfParticipants">
                                <label class="input-label">Number of Participants <span>*</span></label>
                                <input type="text" class="input-field" required />
                            </div>
                            <div class="input width-50" id="hours">
                                <label class="input-label">Hours</label>
                                <input type="text" class="input-field" placeholder="Approximately" required />
                            </div>
                        </div>

                    <?php } else if ($psType == "Venue") { ?>
                        <div class="row">
                            <div class="input width-50" id="noOfParticipants">
                                <label class="input-label">Number of Participants <span>*</span></label>
                                <input type="text" class="input-field" required />
                            </div>
                            <div class="input width-50" id="hours">
                                <label class="input-label">Hours</label>
                                <input type="text" class="input-field" placeholder="Approximately" required />
                            </div>
                        </div>

                    <?php } else if ($psType == "Florist" || $psType == "Decoration") { ?>
                        <div class="row">
                            <div class="input width-50" id="theme">
                                <label class="input-label">Theme <span>*</span></label>
                                <input type="text" class="input-field" required />
                            </div>
                        </div>
                        <div class="row" id='check'>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Need for <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Indoor</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Outdoor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Transport <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="radio" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Needed</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="radio" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Not Needed</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } else if ($psType == "Photography") { ?>
                        <div class="row">
                            <div class="input width-50" id="hours">
                                <label class="input-label">Hours</label>
                                <input type="text" class="input-field" placeholder="Approximately" required />
                            </div>
                            <div class="input width-50 hide" id="theme">
                                <label class="input-label">Theme <span>*</span></label>
                                <input type="text" class="input-field" required />
                            </div>
                        </div>
                        <div class="row" id='check'>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Photographs in <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Indoor</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Outdoor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Needs <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">DVD</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Prints</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Book</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } else if ($psType == "Entertainment") { ?>
                        <div class="row">
                            <div class="input width-50" id="hours">
                                <label class="input-label">Hours</label>
                                <input type="text" class="input-field" placeholder="Approximately" required />
                            </div>
                        </div>
                        <div class="row" id='check'>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Perform in <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Indoor</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Outdoor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Needs <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Music</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Dancing</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                                        <label for="" class="input-ps-label-opt">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                    <div class="row" id='check'>
                        <div class="input-ps" id='check'>
                            <label for="" class="input-label" id='check'>Province <span>*</span></label>

                            <div class="check-bx">
                                <div class="check-bx-opt">
                                    <input type="radio" id="province" name="province" value="Car">
                                    <label for="" class="input-ps-label-opt">Western </label>
                                </div>
                                <div class="check-bx-opt">
                                    <input type="radio" id="province" name="province" value="Car">
                                    <label for="" class="input-ps-label-opt">Eastern</label>
                                </div>
                                <div class="check-bx-opt">
                                    <input type="radio" id="province" name="province" value="Car">
                                    <label for="" class="input-ps-label-opt">Central</label>
                                </div>
                                <div class="check-bx-opt">
                                    <input type="radio" id="province" name="province" value="Car">
                                    <label for="" class="input-ps-label-opt">Northern</label>
                                </div>
                                <div class="check-bx-opt">
                                    <input type="radio" id="province" name="province" value="Car">
                                    <label for="" class="input-ps-label-opt">Southern</label>
                                </div>
                                <div class="check-bx-opt">
                                    <input type="radio" id="province" name="province" value="Car">
                                    <label for="" class="input-ps-label-opt">North Western</label>
                                </div>
                                <div class="check-bx-opt">
                                    <input type="radio" id="province" name="province" value="Car">
                                    <label for="" class="input-ps-label-opt">Sabaragamuwa </label>
                                </div>
                                <div class="check-bx-opt">
                                    <input type="radio" id="province" name="province" value="Car">
                                    <label for="" class="input-ps-label-opt">Uva</label>
                                </div>
                                <div class="check-bx-opt">
                                    <input type="radio" id="province" name="province" value="Car">
                                    <label for="" class="input-ps-label-opt">North Central</label>
                                </div>
                            </div>
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

<?php } ?>