<?php
include('eventplanner_sidenav.php');
include('eventplanner_header.php');

// check method is post
if ($_SERVER['REQUEST_METHOD'] != 'GET' || !isset($_GET['id'])) {
    // show error message
    echo "<script>alert('No product or service selected!')</script>";
    // redirect to suppliers page
    echo "<script>window.location.href = 'Suppliers.php'</script>";
} else {
    // get reqID from cookie
    $reqID = $_COOKIE['quotation_for'];

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
        echo "<script>alert('Product or Service cannot be found!')</script>";
        echo "<script>window.location.href = 'Suppliers.php'</script>";
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
        <div class="main-body">
            <div class="form-card2">
                <div class="searchSec">
                    <div class="page-title">Request Quotation for <?php echo $psTitle ?></div>
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
                            <input type="date" name="date" class="input-field" required />
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

                    <?php if ($psType == "foodbev") { ?>
                        <div class="row">
                            <div class="input width-50" id="noOfParticipants">
                                <label class="input-label">Number of Participants <span>*</span></label>
                                <input name="no_of_participants" type="number" class="input-field" required />
                            </div>
                            <div class="input width-50" id="transportLocations">
                                <label class="input-label">Locations </label>
                                <input name="location" type="text" class="input-field" required />
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
                                            <input type="checkbox" id="bev_need_as" name="bev_need_as" value="Bottle">
                                            <label for="" class="input-ps-label-opt">Bottle</label>
                                        </div>
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="bev_need_as" name="bev_need_as" value="In bulk">
                                            <label for="" class="input-ps-label-opt">In bulk</label>
                                        </div>
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="bev_need_as" name="bev_need_as" value="Cups/Packets">
                                            <label for="" class="input-ps-label-opt">Cups/Packets</label>
                                        </div>
                                    </div>
                                <?php }
                                if ($psType == "foodbev") { ?>
                                    <div class="check-bx">
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="food_need_as" name="food_need_as" value="Packets">
                                            <label for="" class="input-ps-label-opt">Packets</label>
                                        </div>
                                        <div class="check-bx-opt">
                                            <input type="checkbox" id="food_need_as" name="food_need_as" value="Buffet">
                                            <label for="" class="input-ps-label-opt">Buffet</label>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="input-ps" id='check'>
                                <label for="" class="input-label" id='check'>Need For <span>*</span></label>
                                <div class="check-bx">
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="need_for" name="need_for" value="Breakfast">
                                        <label for="" class="input-ps-label-opt">Breakfast</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="need_for" name="need_for" value="Lunch">
                                        <label for="" class="input-ps-label-opt">Lunch</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="need_for" name="need_for" value="Dinner">
                                        <label for="" class="input-ps-label-opt">Dinner</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="need_for" name="need_for" value="Brunch">
                                        <label for="" class="input-ps-label-opt">Brunch</label>
                                    </div>
                                    <div class="check-bx-opt">
                                        <input type="checkbox" id="need_for" name="need_for" value="High-Tea">
                                        <label for="" class="input-ps-label-opt">High-Tea</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } else if ($psType == "transport") { ?>
                        <div class="row">
                            <div class="input width-50" id="noOfParticipants">
                                <label class="input-label">Location (From) <span>*</span></label>
                                <input name="location_from" type="text" class="input-field" required />
                            </div>
                            <div class="input width-50" id="transportLocations">
                                <label class="input-label">Location (To) <span>*</span></label>
                                <input name="location_to" type="text" class="input-field" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="input width-50" id="noOfParticipants">
                                <label class="input-label">Number of Participants <span>*</span></label>
                                <input name="no_of_participants" type="number" class="input-field" required />
                            </div>
                            <div class="input width-50" id="hours">
                                <label class="input-label">Hours</label>
                                <input name="hours" type="number" class="input-field" placeholder="Approximately" />
                            </div>
                        </div>

                    <?php } else if ($psType == "venue") { ?>
                        <div class="row">
                            <div class="input width-50" id="noOfParticipants">
                                <label class="input-label">Number of Participants <span>*</span></label>
                                <input name="no_of_participants" type="number" class="input-field" required />
                            </div>
                            <div class="input width-50" id="hours">
                                <label class="input-label">Hours</label>
                                <input name="hours" type="number" class="input-field" placeholder="Approximately" />
                            </div>
                        </div>

                    <?php } else if ($psType == "florist" || $psType == "deco") { ?>
                        <div class="row">
                            <div class="input width-50" id="theme">
                                <label class="input-label">Theme <span>*</span></label>
                                <input name="theme" type="text" class="input-field" required />
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

                    <?php } else if ($psType == "photo") { ?>
                        <div class="row">
                            <div class="input width-50" id="hours">
                                <label class="input-label">Hours</label>
                                <input name="hours" type="number" class="input-field" placeholder="Approximately" />
                            </div>
                            <div class="input width-50 hide" id="theme">
                                <label class="input-label">Theme <span>*</span></label>
                                <input name="theme" type="text" class="input-field" />
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