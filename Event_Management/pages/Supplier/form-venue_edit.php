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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/form.js"></script>
    
</head>

<body>
  
  <div class="container-profile">
    <div class="flex-container-addps">
    <div class ='grid-main' id='ps'>
      <form class='add-ps' action="passdata.php" method="POST" enctype="multipart/form-data">
        <h4 class='ps-form-title'>Edit Venue</h4>
            <div class="row">
              <?php if (isset($_GET['errors'])) { ?>
     		          <p class="error"><?php echo $_GET['errors']; ?></p>
     	        <?php } ?>

     	        <?php if (isset($_GET['successs'])) { ?>
                  <p class="success"><?php echo $_GET['successs']; ?></p>
              <?php } ?>
            </div>
            
            <input type="hidden" name="item_ID" id="item_ID" value = '<?php echo $id;?>'></td>
            <div class="row">
              <div class="input-ps">
                <label for="" class="input-ps-label">Title</label>
                <input type="text" placeholder="Full Name" name="title" class="input-ps-in" value = '<?php echo $productName;?>'/>
              </div>
            </div>

            <div class="row">
              <div class="input-ps">
                <label for="" class="input-ps-label">Description</label>
                <textarea  name="descript" class="input-ps-in" id='txt-area'><?php echo $productDescript;?>
                </textarea>
              </div>
            </div>
            <div class="row">
              <label for="" class="input-ps-label">Venue in </label>
              <select name="venueIn" id="type">
                <option value="indoor" <?php if($row["venloc"]=="indoor") echo 'selected="selected"'; ?> >Indoor</option> 
                <option value="outdo" <?php if($row["venloc"]=="outdo") echo 'selected="selected"'; ?>>Outdoor</option>
              </select>
            </div>
            <div class="row">
              <div class="input-ps">
                <label for="" class="input-ps-label">Location</label>
                <input type="text" placeholder="Full Name" name="location" class="input-ps-in"value = '<?php echo $row["venlocation"];?>'/>
              </div>
            </div>
            <div class="row">
              <label for="" class="input-ps-label">Type</label>
              <select name="type" id="type">
                <option value="Banquet Halls" <?php if($row["ventype"]=="Banquet Halls") echo 'selected="selected"'; ?>>Banquet Halls</option>
                <option value="Conference Halls"<?php if($row["ventype"]=="Conference Halls") echo 'selected="selected"'; ?>>Conference Halls</option>
                <option value="Stadium"<?php if($row["ventype"]=="Stadium") echo 'selected="selected"'; ?>>Stadium</option>
                <option value="Hotels"<?php if($row["ventype"]=="Hotels") echo 'selected="selected"'; ?>>Hotels</option>
                <option value="Restaurants"<?php if($row["ventype"]=="Restaurants") echo 'selected="selected"'; ?>>Restaurants</option>
                <option value="Social clubs"<?php if($row["ventype"]=="Social clubs") echo 'selected="selected"'; ?>>Social clubs</option>
                <option value="Community centers"<?php if($row["ventype"]=="Community centers") echo 'selected="selected"'; ?>>Community centers</option>
                <option value="other"<?php if($row["ventype"]=="other") echo 'selected="selected"'; ?>>other (Museums, aquariums, zoos , gallery)</option>
              </select>
            </div>
            <div class="row">
              <label for="" class="input-ps-label">Capacity</label>
            </div>
            <div class="row" id='check'>
              
              <div class="input-ps" id='check' style="padding-left:15px;">
                <div class="input-ps">
                  <label for="" class="input-ps-label"> Maximum </label>
                  <input type="text" placeholder="Full Name" name="maxCap" class="input-ps-in" value = '<?php echo $row["maxCap"];?>'/>
                </div>
              </div>
              <div class="input-ps" id='check'style="padding-left:15px;">
                <div class="input-ps">
                  <label for="" class="input-ps-label"> Minimum </label>
                  <input type="text" placeholder="Full Name" name="minCap" class="input-ps-in" value = '<?php echo $row["minCap"];?>'/>
                </div>
              </div>
          </div>
              <!-- <div class="row">
                  <div class="card" id="upload">
                    <label for="" class="input-ps-label" id='check'>Upload Pictures </label>
                    <div class="drop_box">
                      <header>
                        <h4>Select Pictures here</h4>
                      </header>
                      <div class="upload__box">
                        <div class="upload__btn-box">
                          <label class="upload__btn">
                            <p>UPLOAD IMAGES</p>
                            <input type="file" multiple=""name="choosefile" data-max_length="20" class="upload__inputfile" id="custom-button" hidden="hidden">
                          </label>
                        </div>
                        <div class="upload__img-wrap">
                          <img src="../images/<?php echo $row["file_name"];?>" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
                <div class="row">
                  <button class=submit name="send" value="Edit">Edit</button>
                </div>                    
          </div>
        </form>
    </div>
  </div>
  <script src="../js/file-up.js"></script>
</body>

</html>
