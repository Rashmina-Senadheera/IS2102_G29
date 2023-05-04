<?php

// variable to check images and services
$hasProduct = false;

if (isset($_GET['id'])) {
    // Start output buffering
    ob_start();

    include('../constants.php');
    include( 'supplier_sidenav.php' );
    include( 'header.php' );

    $productId = $_GET['id'];
    $sql = "SELECT * FROM sup_product_general WHERE product_id = $productId";

    // execute query and check if successful
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // check if the user is the owner of the package
            if ($row['supplier_ID'] == $_SESSION['user_id']) {
                $hasProduct = true;
                $productName = $row['title'];
                $productType = $row['type'];
                $productDescript = $row['description'];
                $other_details = $row['other_details'];
                $minBudget = $row['budget_min'];
                $maxBudget = $row['budget_max'];
            } else {
                header("Location: ./403.php");
                exit();
            }
        } else {
            header("Location: ./404.php");
            exit();
        }
    }

    // Send the output buffer to the browser and turn off output buffering
    ob_end_flush();
} else {
    header("Location: ./ps-list.php");
    exit();
}

// avoid fetching images and services in the buffer
if ($hasProduct) {
    // get package image
    $image_sql = "SELECT * FROM supplier_product_images WHERE product_id = $productId";
    $image_result = $conn->query($image_sql);

    if($productType== 'venue') { 
      $sql = "SELECT * FROM supplier_venue WHERE product_id = $productId";
    } 
    if($productType == 'foodbev') { 
      $sql = "SELECT * FROM supplier_foodbev WHERE product_id = $productId";
    }
    if($productType == 'transport') {
      $sql = "SELECT * FROM supplier_transport WHERE product_id = $productId";
    } 
    if($productType == 'florist') {
      $sql = "SELECT * FROM supplier_florist WHERE product_id = $productId";
    } 
    if($productType == 'deco') { 
      $sql = "SELECT * FROM supplier_deco WHERE product_id = $productId";
    } 
    if($productType == 'ent') { 
      $sql = "SELECT * FROM supplier_ent WHERE product_id = $productId";
    } 
    if($productType == 'photo') { 
      $sql = "SELECT * FROM supplier_photo WHERE product_id = $productId";
    } 
    if($productType == 'sound') { 
      $sql = "SELECT * FROM supplier_sound WHERE product_id = $productId";
    } 
    if($productType == 'light') { 
      $sql = "SELECT * FROM supplier_light WHERE product_id = $productId";
    } 

    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // check if the user is the owner of the package
            if ($productType== 'venue') {
                $venlocation = $row['venlocation'];
                $venloc = $row['venloc'];
                $ventype = $row['ventype'];
                $maxCap = $row['maxCap'];
                $minCap = $row['minCap'];
            }
            if ($productType== 'foodbev') {
                $catered_for = explode(",", $row['catered_for']);
                $cat_transport = $row['transport'];
                $available_as = explode(",", $row['available_as']);
                $available_for = explode(",",$row['available_for']);
            }
            if ($productType== 'transport') {
                $transportType = $row['type'];
                $transportBrand = $row['brand'];
                $transportModel = $row['model'];
            }
            if ($productType== 'florist') {
                $type_of_flowers = $row['type_of_flowers'];
                $height = $row['height'];
                $quantity = $row['quantity'];
                $suitable_for = explode(",", $row['suitable_for']);
            }
            if ($productType== 'deco') {
                $suitable_for = explode(",", $row['suitable_for']);
            }
            if ($productType== 'photo') {
                $photo_in = explode(",", $row['photo_in']);
                $available = explode(",", $row['available']);
            }
            if ($productType== 'ent') {
                $provide = explode(",", $row['provide']);
            }
            if ($productType== 'sound') {
                $type_sound = explode(",", $row['type_sound']);
            }
            if ($productType== 'light') {
                $type_light = explode(",", $row['type_light']);
            }
        } else {
            header("Location: ./404.php");
            exit();
        }
    }

    function check($element,$arr){
      if (in_array($element, $arr)) {
        echo "checked";
    }
  }
}
?>

<!DOCTYPE html>
<html>

  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- <link rel="stylesheet" href="eventPlannerMain.css">
      <link rel="stylesheet" href="profile.css"> -->
      <link rel="stylesheet" href="../../css/form.css">
      <link rel="stylesheet" href="../../css/modal.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="../../js/form.js"></script>
  </head>

  <body>
    
    <div class="container-profile">
      
      <div class="flex-container-addps">

        <div class ='grid-main' id='ps'>

          <form class='add-ps' action="controllers/editProduct.php" method="POST" enctype="multipart/form-data">

          <input type="hidden" name="productId" value="<?php echo $productId ?>" />

            <h4 class='ps-form-title'>Edit
              <?php 
                if($productType== 'venue') { echo 'Venue';} 
                if($productType == 'foodbev') { echo 'Catering & Beverages';}
                if($productType == 'transport') { echo 'Transport';} 
                if($productType == 'florist') { echo 'Floral Arrangements';} 
                if($productType == 'deco') { echo 'Decorations';} 
                if($productType == 'ent') { echo 'Entertainment';} 
                if($productType == 'photo') { echo 'Photography';} 
                if($productType == 'other') { echo 'Other';} 
                
              ?>
            </h4>

            <div class="form-description">
              You can Edit a package by including the services you provide. Please fill the form correctly.
            </div>
            
            <div class="row">
              <?php if (isset($_SESSION['success'])) { 
                  echo '<p class="success">' . showSessionMessage("success") . '</p>';
              }?>
              <?php if (isset($_GET['successs'])) { ?>
                  <p class="success"><i class="fa-solid fa-check"></i><?php echo $_GET['successs']; ?></p>
              <?php } ?>
            </div>

            <div class="comp">

              <input type="hidden" name="ptype" value = '<?php echo $productType; ?>' required/>

              <div class="row">
                <div class="input-ps">
                  <label for="" class="input-ps-label"  >Title <span>*</span></label>
                  <input type="text" placeholder="Full Name" name="title" class="input-ps-in" required value = '<?php echo $productName;?>'/>
                </div>
              </div>

              <div class="row">
                <div class="input-ps">
                  <label for="" class="input-ps-label">Description <span>*</span></label>
                  <textarea  name="descript" class="input-ps-in" id='txt-area' required spellcheck="true">
                    <?php echo $productDescript; ?>
                  </textarea>
                </div>
              </div>

            </div>
            
            <!-- Venue Optional Parameters -->
            <?php if($productType == 'venue') {?>

              <div class="row">
                <div class="input-ps">
                  <label for="" class="input-ps-label">Venue in <span>*</span></label>
                  <select name="venueIn" id="venueIn" required>
                    <option value="indoor">Indoor</option>
                    <option value="outdoor">Outdoor</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="input-ps" >
                  <label for="" class="input-ps-label">Location <span>*</span> </label>
                  <input type="text" placeholder="Full Name" name="location" class="input-ps-in" required value = '<?php echo $venlocation;?>'/>
                </div>
              </div>

              <div class="row">
                <div class="input-ps">
                  <label for="" class="input-ps-label" >Type <span>*</span></label>
                  <select name="venType" id="venType" required>
                    <option value="Banquet Halls">Banquet Halls</option>
                    <option value="Conference Halls">Conference Halls</option>
                    <option value="Stadium">Stadium</option>
                    <option value="Hotels">Hotels</option>
                    <option value="Restaurants">Restaurants</option>
                    <option value="Social clubs">Social clubs</option>
                    <option value="Community centers">Community centers</option>
                    <option value="other">other (Museums, aquariums, zoos , gallery)</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="input-ps">
                  <label for="" class="input-ps-label" >Capacity </label>
                </div>
              </div>
              <div class= "row">
                <div class="input-ps">    
                  <div class="wrapper">
                    <div class="price-input">
                      <div class="field">
                        <span>Min</span>
                        <input type="number" class="input-min" name="minCap" value = '<?php echo $minCap;?>'>
                      </div>
                      <div class="field">
                        <span>Max</span>
                        <input type="number" class="input-max" name="maxCap" value = '<?php echo $maxCap;?>'>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <?php } ?>
            <!-- Venue Optional Parameters end -->

            <!-- Transport Optional Parameters -->
            <?php if($productType == 'transport') {?>

              <div class="row">
                <div class="input-ps">
                  <label for="" class="input-ps-label">Type</label>
                  <select name="transport_type" id="transport_type">
                    <option value="Car">Car</option>
                    <option value="Motorbike">Motorbike</option>
                    <option value="Bicycle">Bicycle</option>
                    <option value="Van">Van</option>
                    <option value="Lorry">Lorry</option>
                    <option value="Bus">Bus</option>
                    <option value="Jeep">Jeep</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="input-ps">
                  <label for="" class="input-ps-label">Brand</label>
                  <input type="text" name = "transport_Brand" placeholder="Brand" class="input-ps-in" value = '<?php echo $transportBrand;?>'/>
                </div>
              </div>

              <div class="row">
                <div class="input-ps">
                  <label for="" class="input-ps-label">Model</label>
                  <input type="text" placeholder="Model" name = "transport_Model" class="input-ps-in" value = '<?php echo $transportModel;?>'/>
                </div>
              </div>

            <?php } ?>
            <!-- Transport Optional Parameters end -->

            <!-- Catering Optional Parameters  -->
            <?php if($productType == 'foodbev') {?>

              <div class="row" id='check'>
                <div class="input-ps" id='check'>
                  <label for="" class="input-ps-label" id='check'>Catered for 
                  </label>
                  <div class="check-bx">
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="cater-type[]" value="Indoor"
                      <?php check("Indoor",$catered_for);?>>
                      <label for="" class="input-ps-label-opt">Indoor Catering</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="cater-type[]" value="Outdoor"
                      <?php check("Outdoor",$catered_for);?>>
                      <label for="" class="input-ps-label-opt">Outdoor Catering</label>
                    </div>
                  </div>
                </div>
                <div class="input-ps" id='check'>
                  <label for="" class="input-ps-label" id='check'>Transport provided
                    <?php echo $cat_transport; ?>
                  </label>
                  <div class="check-bx">
                    <div class="check-bx-opt">
                      <input type="radio" id="type-venue" name="cater-transport" value="Provided"
                      <?php if($cat_transport =="Provided") echo 'checked="checked"'; ?>>
                      <label for="" class="input-ps-label-opt">Provided</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="radio" id="type-venue" name="cater-transport" value="Not provided"
                      <?php if($cat_transport == "Not provided") echo 'checked="checked"'; ?>>
                      <label for="" class="input-ps-label-opt">Not Provided</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" id='check'>
                <div class="input-ps" id='check'>
                  <label for="" class="input-ps-label" id='check'>Available as </label>
                  <div class="check-bx">
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="available-as-fb[]" value="Packets/Cups"
                      <?php check("Packets/Cups",$available_as);?>>
                      <label for="" class="input-ps-label-opt">Packets/Cups</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="available-as-fb[]" value="Buffet"
                      <?php check("Buffet",$available_as);?>>
                      <label for="" class="input-ps-label-opt">Buffet</label>
                    </div>
                  </div>
                </div>
                <div class="input-ps" id='check'>
                  <label for="" class="input-ps-label" id='check'>Available For </label>
                  <div class="check-bx">
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="available-for-fb[]" value="Breakfast" 
                      <?php check("Breakfast",$available_for);?>>
                      <label for="" class="input-ps-label-opt">Breakfast</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="available-for-fb[]" value="Lunch"
                      <?php check("Lunch",$available_for);?>>
                      <label for="" class="input-ps-label-opt">Lunch</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="available-for-fb[]" value="Dinner"
                      <?php check("Dinner",$available_for);?>>
                      <label for="" class="input-ps-label-opt">Dinner</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="available-for-fb[]" value="Brunch"
                      <?php check("Brunch",$available_for);?>>
                      <label for="" class="input-ps-label-opt">Brunch</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="available-for-fb[]" value="High-tea"
                      <?php check("High-tea",$available_for);?>>
                      <label for="" class="input-ps-label-opt">High-Tea</label>
                    </div>
                  </div>
                </div>
              </div>

            <?php } ?>
            <!-- Catering Optional Parameters end -->

            <!-- Florists Optional Parameters -->
            <?php if($productType == 'florist') {?>

              <div class="row">
                <div class="input-ps">
                  <label for="" class="input-ps-label">Type of Flowers</label>
                  <input type="text" placeholder="type" name='floral-type' class="input-ps-in"
                  value = '<?php echo $type_of_flowers;?>'/>
                </div>
              </div>

              <div class="row" id='check'>
                <div class="input-ps">
                  <label for="" class="input-ps-label">Height</label>
                  <input type="text" placeholder="type" name='floral-height' class="input-ps-in"
                  value = '<?php echo $height;?>'/>
                </div>
              </div>

              <div class="row" id='check'>
                <div class="input-ps">
                  <label for="" class="input-ps-label">Quantity of Flowers</label>
                  <input type="text" placeholder="type" name='floral-quant' class="input-ps-in"
                  value = '<?php echo $quantity;?>'/>
                </div>
              </div>

              <div class="row" id='check'>
                  <div class="input-ps">
                    <label for="" class="input-ps-label" id='check'>Suitablefor</label>
                    <div class="check-bx">
                      <div class="check-bx-opt">
                        <input type="checkbox" id="type-venue" name="type-floral[]" value="Indoor"
                        <?php check("Indoor",$suitable_for);?>>
                        <label for="" class="input-ps-label-opt">Indoor Events</label>
                      </div>
                      <div class="check-bx-opt">
                        <input type="checkbox" id="type-venue" name="type-floral[]" value="Outdoor"
                        <?php check("Outdoor",$suitable_for);?>>
                        <label for="" class="input-ps-label-opt">Outdoor Events</label>
                      </div>
                    </div>
                  </div>
              </div>

            <?php } ?>
            <!-- Florists Optional Parameters end -->

            <!-- Decorations Optional Parameters  -->
            <?php if($productType == 'deco') {?>

              <div class="row" id='check'>
                <div class="input-ps">
                  <label for="" class="input-ps-label" id='check'>Suitablefor</label>
                  <div class="check-bx">
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-deco" name="type-deco[]" value="Indoor"
                      <?php check("Indoor",$suitable_for);?>>
                      <label for="" class="input-ps-label-opt">Indoor Events</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-deco" name="type-deco[]" value="Outdoor"
                      <?php check("Outdoor",$suitable_for);?>>
                      <label for="" class="input-ps-label-opt">Outdoor Events</label>
                    </div>
                  </div>
                </div>
              </div>

            <?php } ?>
            <!-- Decorations Optional Parameters end -->

            <!-- Photo Optional Parameters  -->
            <?php if($productType == 'photo') {?>

              <br>
              <div class="row" id='check'>
                <div class="input-ps">
                  <label for="" class="input-ps-label" id='check'>Photographs in</label>
                  <div class="check-bx">
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="photo-in" value="Indoor"
                      <?php check("Indoor",$photo_in);?>>
                      <label for="" class="input-ps-label-opt">Indoor Events</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="photo-in" value="Outdoor"
                      <?php check("Outdoor",$photo_in);?>>
                      <label for="" class="input-ps-label-opt">Outdoor Events</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" id='check'>
                <div class="input-ps" >
                  <label for="" class="input-ps-label" id='check'>Provide </label>
                  <div class="check-bx">
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-photo" value="DVD"
                      <?php check("DVD",$available);?>>
                      <label for="" class="input-ps-label-opt">DVD</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-photo" value="Prints"
                      <?php check("Prints",$available);?>>
                      <label for="" class="input-ps-label-opt">Prints</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-photo" value="Book"
                      <?php check("Book",$available);?>>
                      <label for="" class="input-ps-label-opt">Book</label>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- Photo Optional Parameters end -->

            <!-- Entertainment Optional Parameters  -->
            <?php if($productType == 'ent') {?>
              <br>
              <div class="row" id='check'>
                <div class="input-ps">
                  <label for="" class="input-ps-label" id='check'>Provide </label>
                  <div class="check-bx">
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-ent" value="Music"
                      <?php check("Music",$provide);?>>
                      <label for="" class="input-ps-label-opt">Music</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-ent" value="Dancing"
                      <?php check("Dancing",$provide);?>>
                      <label for="" class="input-ps-label-opt">Dancing</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-ent" value="Other"
                      <?php check("Other",$provide);?>>
                      <label for="" class="input-ps-label-opt">Other</label>
                    </div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <!-- Entertainment Optional Parameters end -->
          
            <!-- Lights Optional Parameters  -->
            <?php if($productType == 'light') {?>

              <div class="row" >
                <div class="input-ps" id='check'>
                  <label for="" class="input-ps-label" id='check'>Type of Light </label>
                  <div class="check-bx">
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-light[]" value="LED"
                      <?php check("LED",$type_light);?>>
                      <label for="" class="input-ps-label-opt">LED</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-light[]" value="SpotLight"
                      <?php check("SpotLight",$type_light);?>>
                      <label for="" class="input-ps-label-opt">SpotLight</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-light[]" value="Laser"
                      <?php check("Laser",$type_light);?>>
                      <label for="" class="input-ps-label-opt">Laser</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-light[]" value="Dimlights"
                      <?php check("Dimlights",$type_light);?>>
                      <label for="" class="input-ps-label-opt">Dimlights</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-light[]" value="Other"
                      <?php check("Other",$type_light);?>>
                      <label for="" class="input-ps-label-opt">Other</label>
                    </div>
                  </div>
                </div>
              </div>

            <?php } ?>

            <!-- Sounds Optional Parameters  -->
            <?php if($productType == 'sound') {?>

              <div class="row" id="images">
                <div class="input-ps" id='check'>
                  <label for="" class="input-ps-label" id='check'>Type of Sound </label>
                  <div class="check-bx">
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-sound[]" value="DJ"
                      <?php check("DJ",$type_sound);?>>
                      <label for="" class="input-ps-label-opt">DJ</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-sound[]" value="Live Music"
                      <?php check("Live Music",$type_sound);?>>
                      <label for="" class="input-ps-label-opt">Live Music</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-sound[]" value="Band"
                      <?php check("Band",$type_sound);?>>
                      <label for="" class="input-ps-label-opt">Band</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-sound[]" value="Other"
                      <?php check("Other",$type_sound);?>>
                      <label for="" class="input-ps-label-opt">Other</label>
                    </div>
                  </div>
                </div>
              </div>

            <?php } ?>

            <!-- Images Upload  -->
            <div class="row" id="images">
              <div class="input-ps">

                <label class="input-label">Images <span class="desc">(Maximum 6 images)</span></label>

                <div class="row" id="img">

                <?php
                for ($i = 0; $i < 6; $i++) {
                  if ($image_row = $image_result->fetch_assoc()) {
                    while ($image_row['image_id'] != $i) {
                        echo '<input type="file" name="images[]" id="img' . $i . '" class="inputfile" accept="image/*" onchange="imageSelect(this, ' . $i . ')" />
                        <label for="img' . $i . '" id="labelImg' . $i . '">+</label>
                        <img for="img' . $i . '" class="imgPreview" id="prev' . $i . '" src="" onclick="clickImage(' . $i . ')"></img>
                        <button type="button" id="removeImg" class="img-delete-btn">X</button>';
                        $i++;
                    }
                    echo '<input type="file" name="images[]" id="img' . $i . '" class="inputfile" accept="image/*" onchange="imageSelect(this, ' . $i . ')" />
                        <label for="img' . $i . '" id="labelImg' . $i . '" style="display: none;">+</label>
                        <img for="img' . $i . '" class="imgPreview" style="display: block;" id="prev' . $i . '" src="data:' . $image_row['type'] . ';base64,' . base64_encode($image_row['image']) . '" onclick="clickImage(' . $i . ')"></img>
                        <button type="button" id="removeImg' . $i . '" class="img-delete-btn">X</button>';
                    } else {
                      echo '<input type="file" name="images[]" id="img' . $i . '" class="inputfile" accept="image/*" onchange="imageSelect(this, ' . $i . ')" />
                      <label for="img' . $i . '" id="labelImg' . $i . '">+</label>
                      <img for="img' . $i . '" class="imgPreview" id="prev' . $i . '" src="" onclick="clickImage(' . $i . ')"></img>
                      <button type="button" id="removeImg" class="img-delete-btn">X</button>';
                  }
                }
                ?>

                <output id="imgResult">
                  <?php
                  if ($image_result->num_rows > 0) {
                      while ($image_row = $image_result->fetch_assoc()) {
                          echo '<div>
                                  <img src="data:image/jpeg;base64,' . base64_encode($image_row['image']) . '" alt="" class="thumbnail" />
                                  <button type="button" class="img-delete-btn">X</button>
                              </div>';
                      }
                  }
                  ?>
                </output>
            </div>
            <!-- Images Upload end  -->

            <!-- other details-->
            <div class="row">
              <div class="input-ps">
                <label for="" class="input-ps-label">Other Details <span>*</span></label>
                <textarea  name="other" class="input-ps-in" id='other' required spellcheck="true" >
                  <?php echo $other_details;?>
                </textarea>
              </div>
            </div>
            <div class="row" >
                <div class="input-ps">
                  <label for="" class="input-ps-label" >Budget </label>
                </div>
            </div>
            <div class= "row">
                <div class="input-ps" >    
                  <div class="wrapper">
                    <header>
                      <p> Enter min and max Budget </p>
                    </header>
                    <div class="budget-input">
                      <div class="field">
                        <span>Min</span>
                        <input type="number" class="input-min" name="minBudget" value='<?php echo $minBudget;?>'>
                      </div>
                      <div class="field">
                        <span>Max</span>
                        <input type="number" class="input-max" name="maxBudget" value='<?php echo $maxBudget;?>'>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <!-- other details end -->

            <!-- action button -->
            <div class="action">
                <input type="submit" value="Update" class="action-button" />
            </div>  
          </form>
        </div>
      </div>
    </div>

    <script type='text/javascript'>
          var numOfServices = 0;
          var btnAddService = document.getElementById("btnAddService");

          function imageSelect(input, id) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();

                  reader.onload = function(e) {
                      var img = document.getElementById("prev" + id);
                      var label = document.getElementById("labelImg" + id);
                      var removeBtn = document.getElementById("removeImg" + id);
                      img.src = e.target.result;
                      img.style.display = "block";
                      // removeBtn.style.display = "block";
                      label.style.display = "none";
                  };

                  reader.readAsDataURL(input.files[0]);
              }
          }

          function clickImage(id) {
              var img = document.getElementById("img" + id);
              img.click();
          }

          function addServiceFields() {
              // Get the element where the inputs will be added to
              var container = document.getElementById("container");

              // Append a node with text
              // container.appendChild(document.createTextNode("Service " + (++numOfServices)));
              var serviceLabel = document.createElement("label");
              serviceLabel.setAttribute("class", "service-label");
              serviceLabel.innerHTML = "Service " + (++numOfServices);
              container.appendChild(serviceLabel);

              // Create an <input> element, set its type and name attributes
              var serviceTitle = document.createElement("input");
              serviceTitle.type = "text";
              serviceTitle.name = "services[]";
              serviceTitle.className = "input-field";
              container.appendChild(serviceTitle);

              // Append a line break 
              container.appendChild(document.createElement("br"));

              // max 10 services
              if (numOfServices >= 10) {
                  btnAddService.style.display = "none";
              }
          }

          const rangeInput = document.querySelectorAll(".range-input input"),
          priceInput = document.querySelectorAll(".price-input input"),
          range = document.querySelector(".slider .progress");
          let priceGap = 1000;
          priceInput.forEach(input =>{
              input.addEventListener("input", e =>{
                  let minPrice = parseInt(priceInput[0].value),
                  maxPrice = parseInt(priceInput[1].value);
                  
                  if((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max){
                      if(e.target.className === "input-min"){
                          rangeInput[0].value = minPrice;
                          range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
                      }else{
                          rangeInput[1].value = maxPrice;
                          range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                      }
                  }
              });
          });
          rangeInput.forEach(input =>{
              input.addEventListener("input", e =>{
                  let minVal = parseInt(rangeInput[0].value),
                  maxVal = parseInt(rangeInput[1].value);
                  if((maxVal - minVal) < priceGap){
                      if(e.target.className === "range-min"){
                          rangeInput[0].value = maxVal - priceGap
                      }else{
                          rangeInput[1].value = minVal + priceGap;
                      }
                  }else{
                      priceInput[0].value = minVal;
                      priceInput[1].value = maxVal;
                      range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
                      range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                  }
              });
          });

          // select value of event type
          <?php if($productType == 'venue') {?>
          var eventType = document.getElementById("venueIn");
          var eventTypeValue = "<?php echo $venloc ?>";
          if (eventTypeValue != "") {
              eventType.value = eventTypeValue;
          }
          
          var venType = document.getElementById("venType");
          var venTypeValue = "<?php echo $ventype ?>";
          if (venTypeValue != "") {
              venType.value = venTypeValue;
          }
          <?php } ?>

          <?php if($productType == 'transport') {?>
          var transport_type = document.getElementById("transport_type");
          var transport_typeValue = "<?php echo $transportType ?>";
          if (transport_typeValue != "") {
              transport_type.value = transport_typeValue;
          }
          <?php } ?>
    </script>
    
  </body>

</html>
