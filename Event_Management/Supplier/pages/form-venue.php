<?php
    session_start();
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
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
  
  <div class="container-profile">
    <div class="flex-container-addps">
      <!-- <div class="title-search">
        <div class = 'searchSec'>
          <div class = 'page-title'> Add New Products & Services </div>
        </div>
      </div> -->
    <div class ='grid-main' id='ps'>
      <form class='add-ps' action="passdata.php" method="POST" enctype="multipart/form-data">
        <h4 class='ps-form-title'>Add Venue</h4>
        <div class="form-description">You can create a package by including the services you provide. Please
                    fill the form correctly.</div>
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
                <label for="" class="input-ps-label"  >Title <span>*</span></label>
                <input type="text" placeholder="Full Name" name="title" class="input-ps-in" required/>
              </div>
            </div>
            <div class="row">
              <div class="input-ps">
                <label for="" class="input-ps-label">Description <span>*</span></label>
                <textarea  name="descript" class="input-ps-in" id='txt-area' required spellcheck="true">
                </textarea>
              </div>
            </div>
            <div class="row">
              <label for="" class="input-ps-label">Venue in <span>*</span></label>
              <select name="venueIn" id="type" required>
                <option value="indoor">Indoor</option>
                <option value="outdo">Outdoor</option>
              </select>
            </div>
            <div class="row">
              <div class="input-ps" >
                <label for="" class="input-ps-label">Location <span>*</span> </label>
                <input type="text" placeholder="Full Name" name="location" class="input-ps-in" required/>
              </div>
            </div>
            <div class="row">
              <label for="" class="input-ps-label" >Type <span>*</span></label>
              <select name="type" id="type" required>
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
            <div class="row">
              <label for="" class="input-ps-label" >Capacity </label>
            </div>
            <div class="row" id='check'>
              
              <div class="input-ps" id='check' style="padding-left:15px;">
                <div class="input-ps">
                  <label for="" class="input-ps-label"> Maximum <span>*</span></label>
                  <input type="text" placeholder="Full Name" name="maxCap" class="input-ps-in" required/>
                </div>
              </div>
              <div class="input-ps" id='check'style="padding-left:15px;">
                <div class="input-ps">
                  <label for="" class="input-ps-label"> Minimum </label>
                  <input type="text" placeholder="Full Name" name="minCap" class="input-ps-in"/>
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
                        <div class="upload__img-wrap"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="action">
                  <button class=submit name="send" value="create" >Submit</button>
                  </div>
                </div>                    
          </div>
        </form>
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