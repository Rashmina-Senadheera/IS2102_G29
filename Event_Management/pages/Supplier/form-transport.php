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
    <link rel="stylesheet" href="../../css/form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/form.js"></script>
    
</head>

<body>
  
  <div class="container-profile">
    <div class="flex-container-addps">
    <div class ='grid-main' id='ps'>
      <form class='add-ps'>
        <h4 class='ps-form-title'>Add Transport</h4>
        <div class="form-description">You can create a package by including the services you provide. Please
                    fill the form correctly.</div>
            <div class="row">
              <div class="input-ps">
                <label for="" class="input-ps-label">Title</label>
                <input type="text" placeholder="Full Name" class="input-ps-in"/>
              </div>
            </div>
            <div class="row">
              <div class="input-ps">
                <label for="" class="input-ps-label">Description</label>
                <textarea  name="" class="input-ps-in" id='txt-area'>
                  </textarea>
              </div>
            </div>
            <div class="row">
              <label for="" class="input-ps-label">Type</label>
              <select name="type" id="type">
                <option value="">Car</option>
                <option value="">Motorbike</option>
                <option value="">Bicycle</option>
                <option value="">Van</option>
                <option value="">Lorry</option>
                <option value="">Bus</option>
                <option value="">Jeep</option>
              </select>
            </div>
            <div class="row">
              <div class="input-ps">
                <label for="" class="input-ps-label">Brand</label>
                <input type="text" placeholder="Brand" class="input-ps-in"/>
              </div>
            </div>
            <div class="row">
              <div class="input-ps">
                <label for="" class="input-ps-label">Model</label>
                <input type="text" placeholder="Brand" class="input-ps-in"/>
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
                            <input type="file" multiple="" data-max_length="20" class="upload__inputfile" id="custom-button" hidden="hidden">
                          </label>
                        </div>
                        <div class="upload__img-wrap"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <button class=submit>Submit</button>
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