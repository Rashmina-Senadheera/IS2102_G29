<?php
require_once '../controllers/commonFunctions.php';

ob_start();
require_once('eventplanner_sidenav.php');
require_once('eventplanner_header.php');

if (!empty($_GET['reqID'])) {
    require_once './controllers/getRequestDetails.php';
}
ob_end_flush();

// check method is post
if ($_SERVER['REQUEST_METHOD'] != 'GET' || !isset($_GET['id']) || empty($_GET['id'])) {
    // show error message
    // echo "<script>alert('No product or service selected!')</script>";
    // redirect to suppliers page
    echo "<script>window.location.href = '404.php'</script>";
} else {
    // get reqID from cookie
    // $reqID = $_COOKIE['quotation_for'];

    // get the product or service details
    $psId = $_GET['id'];
    $sql = "SELECT `title`, `type`, `supplier_ID` FROM sup_product_general WHERE `product_id` = " . $psId;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $psTitle = $row['title'];
        $psType = $row['type'];
        $supplierId = $row['supplier_ID'];
    } else {
        // echo "<script>alert('Product or Service cannot be found!')</script>";
        echo "<script>window.location.href = '404.php'</script>";
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/eventPlannerMain.css">
        <link rel="stylesheet" href="../../css/formEP.css">
        <link rel="stylesheet" href="../../css/requestQuotationEP.css">
    </head>

    <body>
        <?php
        if (isset($_SESSION['success'])) {
            echo '<div class="success-message">' . showSessionMessage("success") . '</div>';
        } else if (isset($_SESSION['error'])) {
            echo '<div class="error-message">' . showSessionMessage("error") . '</div>';
        }
        ?>
        <div class="main-body">
            <?php if (isset($reqID) && !empty($reqID)) {
                require_once './components/CustomerRequestDetails.php';
                $hours = timeDiff($time_from, $time_to);
            } else {
                $reqID = 0;
                $theme = $no_of_guests = $hours = '';
            }
            ?>

            <div class="form-card scrollable">
                <div class="searchSec">
                    <div class="page-title">Request Quotation for <?php echo $psTitle . ' (' . ucwords(showSupType($psType)) . ') ' ?></div>
                </div>

                <form action="controllers/sendQuotationRequest.php" method="POST">
                    <input type="hidden" name="psId" value="<?php echo $psId ?>">
                    <input type="hidden" name="psTitle" value="<?php echo $psTitle ?>">
                    <input type="hidden" name="psType" value="<?php echo $psType ?>">
                    <input type="hidden" name="supplierId" value="<?php echo $supplierId ?>">
                    <input type="hidden" name="quotation_for" value="<?php echo $reqID ?>">
                    <div class="form-description"></div>
                    <div class="row">
                        <div class="input width-50">
                            <label class="input-label">Date <span>*</span></label>
                            <input type="date" name="date" class="input-field" value="<?php echo formatDateDefault($date_from); ?>" required />
                        </div>
                        <div class="input width-50">
                            <label class="input-label">Event Type <span>*</span></label>
                            <?php
                            $isDefault = 'selected';
                            $isBirthday = $isWedding = $isAnniversary = $isCompanyParty = $isCorporateEvent = $isConference = $isExhibition = $isGenderReveal = $isMusicalShow = $isSeminar = $isSportsAndCompetition = $isOther = '';

                            if ($psType == "foodbev") {
                                $isBottle = $isBulk = $isCups = $isPackets = $isBuffet = '';
                                $isBreakfast = $isLunch = $isDinner = $isBrunch = $isHighTea = '';
                            } else if ($psType == "venue") {
                            } else if ($psType == "florist" || $psType == "deco") {
                            } else if ($psType == "photo") {
                            } else if ($psType == "ent") {
                            }
                            if (!empty($_GET['reqID'])) {
                                require_once './controllers/request-quotation-value-select.php';
                            }
                            ?>
                            <select name="eventType" class="input-field" onchange="test()">
                                <option value="" disabled <?php echo $isDefault; ?>>Select Event Type...</option>
                                <option value="Anniversary" <?php echo $isAnniversary; ?>>Anniversary</option>
                                <option value="Birthday" <?php echo $isBirthday; ?>>Birthday</option>
                                <option value="Company Party" <?php echo $isCompanyParty; ?>>Company Party</option>
                                <option value="Corporate Event" <?php echo $isCorporateEvent; ?>>Corporate Event</option>
                                <option value="Conference" <?php echo $isConference; ?>>Conference</option>
                                <option value="Exhibition" <?php echo $isExhibition; ?>>Exhibition</option>
                                <option value="Gender Reveal" <?php echo $isGenderReveal; ?>>Gender Reveal</option>
                                <option value="Musical Show" <?php echo $isMusicalShow; ?>>Musical Show</option>
                                <option value="Seminar" <?php echo $isSeminar; ?>>Seminar</option>
                                <option value="Sports and Competition" <?php echo $isSportsAndCompetition; ?>>Sports and Competition</option>
                                <option value="Wedding" <?php echo $isWedding; ?>>Wedding</option>
                                <option value="Other" <?php echo $isOther; ?>>Other</option>
                            </select>
                        </div>
                    </div>

                    <?php if ($psType == "foodbev") { ?>
                        <div class="row">
                            <div class="input width-50" id="noOfParticipants">
                                <label class="input-label">Number of Participants <span>*</span></label>
                                <input name="no_of_participants" type="number" class="input-field" value="<?php echo $no_of_guests; ?>" required />
                            </div>
                            <div class="input width-50" id="transportLocations">
                                <label class="input-label">Locations </label>
                                <input name="location" type="text" class="input-field" placeholder="Address / City" required />
                            </div>
                        </div>
                        <div class="row" id='check'>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Catered for <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="catered_for" name="catered_for" value="Indoor">
                                        <label for="" class="input-ps-label-opt">Indoor Catering</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="catered_for" name="catered_for" value="Outdoor">
                                        <label for="" class="input-ps-label-opt">Outdoor Catering</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Transport <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="radio" id="transport" name="transport" value="Needed">
                                        <label for="" class="input-ps-label-opt">Needed</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="radio" id="transport" name="transport" value="Not Needed">
                                        <label for="" class="input-ps-label-opt">Not Needed</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id='check'>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Need as <span>*</span></label>
                                <?php if ($psType == "foodbev") { ?>
                                    <div class="check-bx">
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="bev_need_as" name="bev_need_as" value="Bottle" <?php echo $isBottle; ?>>
                                            <label for="" class="input-ps-label-opt">Bottle</label>
                                        </div>
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="bev_need_as" name="bev_need_as" value="In bulk" <?php echo $isBulk; ?>>
                                            <label for="" class="input-ps-label-opt">In bulk</label>
                                        </div>
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="bev_need_as" name="bev_need_as" value="Cups/Packets" <?php echo $isCups; ?>>
                                            <label for="" class="input-ps-label-opt">Cups/Packets</label>
                                        </div>
                                    </div>
                                <?php }
                                if ($psType == "foodbev") { ?>
                                    <div class="check-bx">
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="food_need_as" name="food_need_as" value="Packets" <?php echo $isPackets; ?>>
                                            <label for="" class="input-ps-label-opt">Packets</label>
                                        </div>
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="food_need_as" name="food_need_as" value="Buffet" <?php echo $isBuffet; ?>>
                                            <label for="" class="input-ps-label-opt">Buffet</label>
                                        </div>
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="food_need_as" name="food_need_as" value="Other" <?php echo $isOther; ?>>
                                            <label for="" class="input-ps-label-opt">Other</label>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Need For <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="need_for" name="need_for" value="Breakfast" <?php echo $isBreakfast; ?>>
                                        <label for="" class="input-ps-label-opt">Breakfast</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="need_for" name="need_for" value="Lunch" <?php echo $isLunch; ?>>
                                        <label for="" class="input-ps-label-opt">Lunch</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="need_for" name="need_for" value="Dinner" <?php echo $isDinner; ?>>
                                        <label for="" class="input-ps-label-opt">Dinner</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="need_for" name="need_for" value="Brunch" <?php echo $isBrunch; ?>>
                                        <label for="" class="input-ps-label-opt">Brunch</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="need_for" name="need_for" value="High-Tea" <?php echo $isHighTea; ?>>
                                        <label for="" class="input-ps-label-opt">High-Tea</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } else if ($psType == "transport") { ?>
                        <div class="row">
                            <div class="input width-50" id="noOfParticipants">
                                <label class="input-label">Location (From) <span>*</span></label>
                                <input name="location_from" type="text" class="input-field" placeholder="Address / City" required />
                            </div>
                            <div class="input width-50" id="transportLocations">
                                <label class="input-label">Location (To) <span>*</span></label>
                                <input name="location_to" type="text" class="input-field" placeholder="Address / City" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="input width-50" id="noOfParticipants">
                                <label class="input-label">Number of Participants <span>*</span></label>
                                <input name="no_of_participants" type="number" class="input-field" value="<?php echo $no_of_guests; ?>" required />
                            </div>
                            <div class="input width-50" id="hours">
                                <label class="input-label">Hours</label>
                                <input name="hours" type="number" class="input-field" placeholder="Approximately"  value="<?php echo $hours; ?>" />
                            </div>
                        </div>

                    <?php } else if ($psType == "venue") { ?>
                        <div class="row">
                            <div class="input width-50" id="noOfParticipants">
                                <label class="input-label">Number of Participants <span>*</span></label>
                                <input name="no_of_participants" type="number" class="input-field" value="<?php echo $no_of_guests; ?>" required />
                            </div>
                            <div class="input width-50" id="hours">
                                <label class="input-label">Hours</label>
                                <input name="hours" type="number" class="input-field" placeholder="Approximately" value="<?php echo $hours; ?>" />
                            </div>
                        </div>

                    <?php } else if ($psType == "florist" || $psType == "deco") { ?>
                        <div class="row">
                            <div class="input width-50" id="theme">
                                <label class="input-label">Theme <span>*</span></label>
                                <input name="theme" type="text" class="input-field" value="<?php echo $theme ?>" required />
                            </div>
                        </div>
                        <div class="row" id='check'>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Need for <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="need_for" name="need_for" value="Indoor">
                                        <label for="" class="input-ps-label-opt">Indoor</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="need_for" name="need_for" value="Outdoor">
                                        <label for="" class="input-ps-label-opt">Outdoor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Transport <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="radio" id="transport" name="transport" value="Needed">
                                        <label for="" class="input-ps-label-opt">Needed</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="radio" id="transport" name="transport" value="Not Needed">
                                        <label for="" class="input-ps-label-opt">Not Needed</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } else if ($psType == "light") { ?>
                        <div class="row">
                            <div class="input width-50" id="theme">
                                <label class="input-label">Theme</label>
                                <input name="theme" type="text" class="input-field" value="<?php echo $theme ?>" />
                            </div>
                        </div>

                    <?php } else if ($psType == "sound") { ?>
                        <div class="row">
                            <div class="input width-50" id="theme">
                                <label class="input-label">Theme</label>
                                <input name="theme" type="text" class="input-field" value="<?php echo $theme ?>" />
                            </div>
                            <div class="input width-50" id="hours">
                                <label class="input-label">Hours</label>
                                <input name="hours" type="number" class="input-field" placeholder="Approximately" value="<?php echo $hours; ?>" />
                            </div>
                        </div>
                        <div class="row" id='check'>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Type of Sound <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="sound_type" name="sound_type" value="DJ">
                                        <label for="" class="input-ps-label-opt">DJ</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="sound_type" name="sound_type" value="Live Music">
                                        <label for="" class="input-ps-label-opt">Live Music</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="sound_type" name="sound_type" value="Band">
                                        <label for="" class="input-ps-label-opt">Band</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="sound_type" name="sound_type" value="Other">
                                        <label for="" class="input-ps-label-opt">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } else if ($psType == "photo") { ?>
                        <div class="row">
                            <div class="input width-50" id="hours">
                                <label class="input-label">Hours</label>
                                <input name="hours" type="number" class="input-field" placeholder="Approximately" />
                            </div>
                            <div class="input width-50 hide" id="theme">
                                <label class="input-label">Theme</label>
                                <input name="theme" type="text" class="input-field" value="<?php echo $theme ?>" />
                            </div>
                        </div>
                        <div class="row" id='check'>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Photographs in <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="photographs_in" name="photographs_in" value="Indoor">
                                        <label for="" class="input-ps-label-opt">Indoor</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="photographs_in" name="photographs_in" value="Outdoor">
                                        <label for="" class="input-ps-label-opt">Outdoor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Needs <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="needs" name="needs" value="DVD">
                                        <label for="" class="input-ps-label-opt">DVD</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="needs" name="needs" value="Prints">
                                        <label for="" class="input-ps-label-opt">Prints</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="needs" name="needs" value="Book">
                                        <label for="" class="input-ps-label-opt">Book</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } else if ($psType == "ent") { ?>
                        <div class="row">
                            <div class="input width-50" id="hours">
                                <label class="input-label">Hours</label>
                                <input name="hours" type="number" class="input-field" placeholder="Approximately" />
                            </div>
                        </div>
                        <div class="row" id='check'>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Perform in <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="perform_in" name="perform_in" value="Indoor">
                                        <label for="" class="input-ps-label-opt">Indoor</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="perform_in" name="perform_in" value="Outdoor">
                                        <label for="" class="input-ps-label-opt">Outdoor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Needs <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="needs" name="needs" value="Music">
                                        <label for="" class="input-ps-label-opt">Music</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="needs" name="needs" value="Dancing">
                                        <label for="" class="input-ps-label-opt">Dancing</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="needs" name="needs" value="Other">
                                        <label for="" class="input-ps-label-opt">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                    <div class="row">
                        <div class="input">
                            <label class="input-label">Remarks </label>
                            <!-- <input type="text" class="input-field" required /> -->
                            <textarea name="remarks" class="input-field" rows="5"></textarea>
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