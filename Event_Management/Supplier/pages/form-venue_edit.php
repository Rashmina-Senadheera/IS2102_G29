<?php
    include('../constants.php');
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
    $id = $_GET['id'];
    if(isset($_SESSION['user_name'])){
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="eventPlannerMain.css">
    <link rel="stylesheet" href="profile.css"> -->
    <link rel="stylesheet" href="../css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/form.js"></script>
    
</head>

<body>
          <?php
              $sql = "SELECT *
                      FROM supplier_venue V , images I
                      where V.item_ID = I.item_ID
                      AND V.item_ID = $id";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {?>
  <div class="container-profile">
    <div class="flex-container-addps">
      <div class="title-search">
        <div class = 'searchSec'>
          <div class = 'page-title'> Add New Products & Services </div>
        </div>
      </div>
    <div class ='grid-main' id='ps'>
      <form class='add-ps' action="passdata.php" method="POST" enctype="multipart/form-data">
        <h4 class='ps-form-title'>Add Venue</h4>
            <div class="row">
              <?php if (isset($_GET['errors'])) { ?>
     		          <p class="error"><?php echo $_GET['errors']; ?></p>
     	        <?php } ?>

     	        <?php if (isset($_GET['successs'])) { ?>
                  <p class="success"><?php echo $_GET['successs']; ?></p>
              <?php } ?>
            </div>

            <div class="row">
              <div class="input-ps">
                <label for="" class="input-ps-label">Title</label>
                <input type="text" placeholder="Full Name" name="title" class="input-ps-in" value = <?php echo $row["title"];?>/>
              </div>
            </div>
            <div class="row">
              <div class="input-ps">
                <label for="" class="input-ps-label">Description</label>
                <textarea  name="descript" class="input-ps-in" id='txt-area'><?php echo $row["descript"];?>
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
                <input type="text" placeholder="Full Name" name="location" class="input-ps-in"value = <?php echo $row["venlocation"];?>/>
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
                  <input type="text" placeholder="Full Name" name="maxCap" class="input-ps-in" value = <?php echo $row["maxCap"];?>/>
                </div>
              </div>
              <div class="input-ps" id='check'style="padding-left:15px;">
                <div class="input-ps">
                  <label for="" class="input-ps-label"> Minimum </label>
                  <input type="text" placeholder="Full Name" name="minCap" class="input-ps-in" value = <?php echo $row["minCap"];?>/>
                </div>
              </div>
          </div>
              <div class="row">
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
                          <!-- <img src="../images/<?php echo $row["file_name"];?>" alt=""> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <button class=submit name="send" value="create" >Submit</button>
                </div>                    
          </div>
        </form>
        <?php ;}
                    }
                    ?> 
    </div>
  </div>
  <script src="../js/file-up.js"></script>
</body>

</html>

<?php
 }else{
    header("Location:sign_in.php?");
    exit();
 }
?>