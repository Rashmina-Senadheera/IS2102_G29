<?php
include('../constants.php');
include('supplier_sidenav.php');
include('header.php');
include('../controllers/commonFunctions.php');

//check if there is a id in the url
if (isset($_GET['id'])) {

    function matchProduct($provide,$ask){
        if(!empty($ask)){
            if (strchr($provide, $ask)) {
                    echo '<div class="prof-data" id="opt-match"> 
                    <i class="fa-sharp fa-solid fa-check"></i>
                    Match product </div>';
                }else{
                echo '<div class="prof-data" id="opt-no"> 
                <i class="fa-solid fa-xmark"></i>
                Not match </div>';                                
                }
        }else{
            echo '<div class="prof-data" id="opt-none"> 
            <i class="fa-solid fa-question"></i>
            Not specified</div>';
        }
    }
    

    $id = checkInput($_GET['id']);
    $sql = "SELECT * 
                FROM request_supplier_quotation r
                JOIN sup_product_general p
                ON r.psId = p.product_id
                WHERE r.status='Pending' 
                AND r.request_id = $id";
    
    $result = mysqli_query($conn, $sql);

    // check if the id is valid
    if (mysqli_num_rows($result) > 0) {
        $general_details = mysqli_fetch_assoc($result);
        $p_title = $general_details['product_title'];
        $remarks = $general_details['remarks'];
        $event_type = $general_details['event_type'];
        $hours = $general_details['hours'];
        $date = $general_details['date'];
        $hours = $general_details['hours'];
        $urgency = $general_details['urgency'];
        $no_of_participants = $general_details['no_of_participants'];
        $psId = $general_details['psId'];
        $ep_id = $general_details['EP_id'];
        $cat_for = $general_details['catered_for'];
        $transport = $general_details['transport'];
        $bev_need_as = $general_details['bev_need_as'];
        $food_need_as = $general_details['food_need_as'];
        $need_for = $general_details['need_for'];
        $location_from = $general_details['location_from'];
        $location_to = $general_details['location_to'];
        $photographs_in = $general_details['photographs_in'];
        $needs = $general_details['needs'];
        // $type = $general_details['type'];
        // $img_sql = "SELECT `image` FROM supplier_product_images WHERE `product_id` = $id";
        // $img_result = mysqli_query($conn, $img_sql);

        //get other details according to the type
        $sql = "SELECT * FROM sup_product_general WHERE product_id = $psId";
        $result = mysqli_query($conn, $sql);

        // check if the id is valid
        if (mysqli_num_rows($result) > 0) {
            $general_details = mysqli_fetch_assoc($result);
            $title = $general_details['title'];
            $description = $general_details['description'];
            $other_details = $general_details['other_details'];
            $budget_min = $general_details['budget_min'];
            $budget_max = $general_details['budget_max'];
            $type = $general_details['type'];
            $img_sql = "SELECT `image` FROM supplier_product_images WHERE `product_id` = $psId LIMIT 1";
            $img_result = mysqli_query($conn, $img_sql);
            $img_row = mysqli_fetch_assoc($img_result);
            $img = $img_row['image'];

            // get other details according to the type
            $more_details = "SELECT * FROM supplier_" . $type . "  WHERE product_id = $psId";

            // check if the query is successful
            if ($more_result = mysqli_query($conn, $more_details)) {
                $more_details = mysqli_fetch_assoc($more_result);

                $suitable_for = !empty($more_details['suitable_for']) ? $more_details['suitable_for'] : "";
                $locations = !empty($more_details['locations']) ? $more_details['locations'] : "";
                $provide = !empty($more_details['provide']) ? $more_details['provide'] : "";
                $type_of_flowers = !empty($more_details['type_of_flowers']) ? $more_details['type_of_flowers'] : "";
                $height = !empty($more_details['height']) ? $more_details['height'] : "";
                $quantity = !empty($more_details['quantity']) ? $more_details['quantity'] : "";
                $catered_for = !empty($more_details['catered_for']) ? $more_details['catered_for'] : "";
                $transport = !empty($more_details['transport']) ? $more_details['transport'] : "";
                $available_as = !empty($more_details['available_as']) ? $more_details['available_as'] : "";
                $available_for = !empty($more_details['available_for']) ? $more_details['available_for'] : "";
                $transport_type = !empty($more_details['type']) ? $more_details['type'] : "";
                $brand = !empty($more_details['brand']) ? $more_details['brand'] : "";
                $model = !empty($more_details['model']) ? $more_details['model'] : "";
                $venloc = !empty($more_details['venloc']) ? $more_details['venloc'] : "";
                $venlocation = !empty($more_details['venlocation']) ? $more_details['venlocation'] : "";
                $ventype = !empty($more_details['ventype']) ? $more_details['ventype'] : "";
                $maxCap = !empty($more_details['maxCap']) ? $more_details['maxCap'] : "";
                $minCap = !empty($more_details['minCap']) ? $more_details['minCap'] : "";
                $sound_type = !empty($more_details['type_sound']) ? $more_details['type_sound'] : "";
                $light_type = !empty($more_details['type_light']) ? $more_details['type_light'] : "";
                $photo_in = !empty($more_details['photo_in']) ? $more_details['photo_in'] : "";
                $photo_available = !empty($more_details['available']) ? $more_details['available'] : "";
            }
        }
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
    <link rel='stylesheet' href='../../css/supplierMain.css'>
    <link rel="stylesheet" href="../../css/profileSup.css">
    <link rel="stylesheet" href="../css/quote-view.css">
</head>

<body>
    <!-- Show success message -->
    <?php
    if (isset($_SESSION['success'])) {
        echo '<div class="success-message">' . showSessionMessage("success") . '</div>';
    }
    ?>
    <!-- <div class="gridMain"> -->
    <div class='container-main'>
        <div class='flex-container-main' id="quote">
            <div class="title-search" id="quote">
                <div class='searchSec'>
                    <div class='page-title' id="quote" > Quoatation for <?php echo $title; ?></div>
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
                        <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($img) . '" id="about-img" ">' ?>
                    </div>

                    <?php if($type == 'venue') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Location:</div>
                            <div class="prof-data"><?php echo $venlocation; ?></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Participants:</div>
                            <div class="prof-data"><?php echo $maxCap ." - ". $minCap; ?></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Venue in:</div>
                            <div class="prof-data"><?php echo $venloc; ?></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Venue Type:</div>
                            <div class="prof-data"><?php echo $ventype; ?></div>
                        </div>
                    <?php } ?>

                    <?php if($type == 'foodbev') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Transport :</div>
                            <div class="prof-data"><?php echo $transport; ?></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Catered For :</div>
                            <div class="prof-data"><?php echo $catered_for; ?></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Available As :</div>
                            <div class="prof-data"><?php echo $available_as; ?></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Available For  :</div>
                            <div class="prof-data"><?php echo $available_for; ?></div>
                        </div>
                    <?php } ?> 

                    <?php if($type == 'transport') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Type  :</div>
                            <div class="prof-data"><?php echo $transport_type; ?></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Brand  :</div>
                            <div class="prof-data"><?php echo $brand; ?></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Model  :</div>
                            <div class="prof-data"><?php echo $model; ?></div>
                        </div>
                    <?php } ?> 

                    <?php if($type == 'florist') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Type   :</div>
                            <div class="prof-data"><?php echo $type_of_flowers; ?></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Height   :</div>
                            <div class="prof-data"><?php echo $height; ?></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Quantity   :</div>
                            <div class="prof-data"><?php echo $quantity; ?></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Suitable for   :</div>
                            <div class="prof-data"><?php echo $suitable_for; ?></div>
                        </div>
                    <?php } ?> 

                    <?php if($type == 'deco') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Suitable for   :</div>
                            <div class="prof-data"><?php echo $suitable_for; ?></div>
                        </div>
                    <?php } ?> 

                    <?php if($type == 'photo') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Suitable for   :</div>
                            <div class="prof-data"><?php echo $photo_in; ?></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Available as  :</div>
                            <div class="prof-data"><?php echo $photo_available; ?></div>
                        </div>
                    <?php } ?>
                    <?php if($type == 'ent') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Entertainment :</div>
                            <div class="prof-data"><?php echo $provide; ?></div>
                        </div>
                    <?php } ?> 
                     <?php if($type == 'light') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Type  :</div>
                            <div class="prof-data"><?php echo $light_type; ?></div>
                        </div>
                    <?php } ?> 
                     <?php if($type == 'sound') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Type :</div>
                            <div class="prof-data"><?php echo $sound_type; ?></div>
                        </div>
                    <?php } ?>  
                    
                    <div class="prof-all">
                            <div class="prof-name-50">Budget:</div>
                            <div class="prof-data"><?php echo $budget_min ." - ". $budget_max; ?></div>
                        </div>

                        


                        <?php 
                        $sql1 = "SELECT request_supplier_quotation.date 
                                FROM supplier_booking JOIN request_supplier_quotation 
                                ON supplier_booking.EP_quotation_id=request_supplier_quotation.request_id 
                                WHERE request_supplier_quotation.psId = $psId 
                                AND request_supplier_quotation.date = '$date'";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1) > 0){
                            $availability = 0;
                        }
                        else{
                            $availability = 1;
                        }
                        ?>
                        <div class="prof-all" id='avail'>
                            <div class="prof-name-50"  id='avail'>Orders on Requested Date  </div>
                        </div>

                        <div class="availTime">
                            <div class="actionBtn" 
                            <?php if($availability) echo "id='avail'"; else echo "id='notavail'"; ?>>
                                <button type="button" class="available" style="margin-left: 0;"
                                <?php if($availability) echo "id='avail'"; else echo "id='notavail'"; ?>>
                                    <?php if($availability) echo "None"; else echo "Exist Between"; ?>
                                </button>
                            </div>
                            <div>
                        <?php 
                            
                            if(!$availability){
                                
                                $sql2 = "SELECT c.from_time , c.to_time  
                                FROM supplier_booking b JOIN request_supplier_quotation r
                                ON b.EP_quotation_id = r.request_id 
                                JOIN cust_req_general c
                                ON r.for_cus_req = c.request_id 
                                WHERE r.psId = $psId 
                                AND r.date = '$date'";
                                
                                $result2 = mysqli_query($conn, $sql2);

                                if (mysqli_num_rows($result2) > 0){
                                    while ($row = mysqli_fetch_assoc($result2)) {
                                        $from_time =date('g:ia', strtotime($row['from_time']));
                                        $to_time =date('g:ia', strtotime($row['to_time']));
                                        echo "<div class='times'>".$from_time ."- ". $to_time."</div>";
                                    }
                                }
                                else{
                                    echo "bababaa";
                                }

                            }
                        ?>
                        </div>
                        </div>
                            

                </div>
            </div>
            <div class="other" id="quote" style="margin-top: 0px;margin-right:0px; overflow-y:scroll;">

                <div class="personal-info" style="margin-bottom: 0px; margin-top: 5px;">
                    <div class="personal-info-heading" id="quoteb" style="width: 90%;">
                        Quotation Event Details
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Event Type:</div>
                        <div class="prof-data"><?php echo $event_type; ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Participants:</div>
                        <div class="prof-data"><?php echo $no_of_participants; ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Hours:</div>
                        <div class="prof-data"><?php echo $hours; ?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-50">Tentative Date:</div>
                        <div class="prof-data"><?php echo $date; ?></div>
                    </div>

                    <hr>
                    <?php if($type == 'foodbev') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Catered for:</div>
                            <div class="prof-data" id="opt"><?php echo $cat_for; ?></div>
                            <?php 
                                matchProduct($catered_for,$cat_for);
                            ?>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Transport :</div>
                            <div class="prof-data" id="opt"><?php echo $transport; ?></div>
                            <?php 
                            if(!empty($transport)){
                                if (strcmp($transport_type, $transport)) {
                                        echo '<div class="prof-data" id="opt-match"> 
                                            <i class="fa-sharp fa-solid fa-check"></i>
                                            Match product </div>';
                                    }else{
                                    echo '<div class="prof-data" id="opt-no"> 
                                        <i class="fa-solid fa-xmark"></i>
                                        Not match </div>';                                
                                    }
                            }else{
                                echo '<div class="prof-data" id="opt-none"> 
                                <i class="fa-solid fa-question"></i>
                                Not specified</div>';
                            }
                            ?>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Beverages Need As:</div>
                            <div class="prof-data" id="opt"><?php echo $bev_need_as; ?></div>
                            <?php 
                            matchProduct("none", $bev_need_as);
                            ?>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Food Need As:</div>
                            <div class="prof-data" id="opt"><?php echo $food_need_as; ?></div>
                             <?php 
                                matchProduct($available_as, $food_need_as);
                            ?>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Need For:</div>
                            <div class="prof-data" id="opt"><?php echo $need_for; ?></div>
                             <?php
                             matchProduct($available_for, $need_for);
                            ?>
                        </div>
                    <?php } ?>

                    <?php if($type == 'transport') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Location From:</div>
                            <div class="prof-data" ><?php echo $location_from; ?></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Location To:</div>
                            <div class="prof-data"><?php echo $location_to; ?></div>
                        </div>
                    <?php } ?> 

                    <?php if($type == 'venue') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Participants :</div>
                            <div class="prof-data" id="opt"><?php echo $no_of_participants; ?></div>
                            <?php 
                                if(!empty($no_of_participants)){
                                    if ($maxCap>$no_of_participants && $minCap<$no_of_participants) {
                                            echo '<div class="prof-data" id="opt-match"> 
                                            <i class="fa-sharp fa-solid fa-check"></i>
                                            Capacity Match </div>';
                                        }else{
                                        echo '<div class="prof-data" id="opt-no"> 
                                        <i class="fa-solid fa-xmark"></i>
                                        Capacity Not match </div>';                                
                                        }
                                }else{
                                    echo '<div class="prof-data" id="opt-none"> 
                                    <i class="fa-solid fa-question"></i>
                                    Not specified</div>';
                                }
                            ?>
                        </div>
                    <?php } ?> 

                    <?php if($type == 'florist') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Needed for:</div>
                            <div class="prof-data" id="opt"><?php echo $need_for; ?></div>
                            <?php 
                                matchProduct($suitable_for,$need_for);
                            ?>
                        </div>
                    <?php } ?>

                    <?php if($type == 'deco') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Needed for:</div>
                            <div class="prof-data" id="opt"><?php echo $need_for; ?></div>
                            <?php 
                                matchProduct($suitable_for,$need_for);
                            ?>
                        </div>
                    <?php } ?>

                    <?php if($type == 'photo') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Needed Photos for:</div>
                            <div class="prof-data" id="opt"><?php echo $photographs_in; ?></div>
                            <?php 
                                matchProduct($photo_in,$photographs_in);
                            ?>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name-50">Needed As:</div>
                            <div class="prof-data" id="opt"><?php echo $needs; ?></div>
                            <?php 
                                matchProduct($photo_available,$needs);
                            ?>
                        </div>
                    <?php } ?>

                    <?php if($type == 'ent') {?>
                        <div class="prof-all">
                            <div class="prof-name-50">Needs:</div>
                            <div class="prof-data" id="opt"><?php echo $needs; ?></div>
                            <?php 
                                matchProduct($provide,$needs);
                            ?>
                        </div>
                    <?php } ?>

                    


                    <hr>
                    <div class="prof-all">
                        <div class="prof-name-50">Remarks:</div>
                        <div class="prof-data"><?php echo $remarks; ?></div>
                    </div>
                    <div class="actionBtn">
                        <button type="button" id="btnDecline" class="rejected" style="margin-left: 0;"
                        onclick="<?php echo 'declineRequest(' . $id . ', ' . $ep_id. ')'; ?>">
                            Decline
                        </button>
                        <a href="SendEventPlannerQuote.php?id=<?php echo $id; ?>">
                            <button type="button" class="accepted" style="margin-left: 0;">
                                Send Quotation
                            </button>
                        </a>
                    </div>
                </div>
                <div class="personal-info" id="quote" style="margin-top: 0px;">
                    <?php 
                        $sql1 = "SELECT * FROM user WHERE user_id= $ep_id";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result1) > 0){
                            $user_details = mysqli_fetch_assoc($result1);
                            $name = $user_details['name'];
                            $email = $user_details['email'];
                        }
                        else{
                            echo "Available";
                        }
                    
                    ?>
                    
                    <div class="personal-info-heading" style="width: 90%;">
                        Event Planner Profile
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-20">Name:</div>
                        <div class="contact"><?php echo $name;?></div>
                    </div>
                    <div class="prof-all">
                        <div class="prof-name-20">Contact :</div>
                        <div class="contact">
                            <i class="fa-solid fa-envelope" id="qu-con"></i><?php echo $email;?>
                            <!-- <i class="fa-solid fa-phone" id="qu-conm"></i>0777931062 -->
                            <i class="fa-brands fa-rocketchat" id="qu-conme"></i><a href="Messages.php?supplier_id=<?php echo $ep_id;?>"> <b>Message</b> <a>
                        </div>
                    </div>
                </div>
            </div>
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
                <form method="POST" action="./controllers/declineQuote.php">
                    <div class="decline-reason">
                        <input hidden type="text" name="request_id" id="modal_request_id">
                        <input hidden type="text" name="customer_id" id="modal_customer_id">
                        <label for="reason">Reason</label>
                        <>
                        <textarea id="reason" name="reason" rows="4" cols="50" required ></textarea>
                    </div>
                    <div class="actionBtn">
                        <button type="button" onclick="closeModal()" class="rejected" id="modal_cancel" style="margin-left: 0;">
                            Cancel
                        </button>
                        <button type="submit" class="accepted" style="margin-left: 0;">
                            Yes, Decline
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->

</body>
<script src="../../js/supplierQuote.js"></script>


</html>