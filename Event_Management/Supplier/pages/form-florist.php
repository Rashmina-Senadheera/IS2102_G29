<?php
    include('supplier_sidenav.php');
    include('header.php');

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
      <div class="title-search">
        <div class = 'searchSec'>
          <div class = 'page-title'> Add New Products & Services </div>
        </div>
      </div>
    <div class ='grid-main' id='ps'>
      <form class='add-ps'>
        <h4 class='ps-form-title'>Add Floral Arrangement</h4>
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
              <div class="input-ps">
                <label for="" class="input-ps-label">Type of Flowers</label>
                <input type="text" placeholder="type" class="input-ps-in"/>
              </div>
            </div>
            <div class="row" id='check'>
              <div class="input-ps">
                <label for="" class="input-ps-label">Height</label>
                <input type="text" placeholder="type" class="input-ps-in"/>
              </div>
            </div>
            <div class="row" id='check'>
              <div class="input-ps">
                <label for="" class="input-ps-label">Quantity of Flowers</label>
                <input type="text" placeholder="type" class="input-ps-in"/>
              </div>
            </div>
          <div class="row" id='check'>
              <div class="input-ps" id='check'>
                <label for="" class="input-ps-label" id='check'>Suitablefor</label>
                <div class="check-bx">
                  <div class="check-bx-opt">
                    <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                    <label for="" class="input-ps-label-opt">Indoor Events</label>
                  </div>
                  <div class="check-bx-opt">
                    <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                    <label for="" class="input-ps-label-opt">Outdoor Events</label>
                  </div>
                </div>
              </div>
              <div class="input-ps" id='check'>
                <label for="" class="input-ps-label" id='check'>Transport provided</label>
                <div class="check-bx">
                  <div class="check-bx-opt">
                    <input type="radio" id="type-venue" name="type-venue" value="Car">
                    <label for="" class="input-ps-label-opt">provided</label>
                  </div>
                  <div class="check-bx-opt">
                    <input type="radio" id="type-venue" name="type-venue" value="Car">
                    <label for="" class="input-ps-label-opt">not provided</label>
                  </div>
                </div>
              </div>
          </div>
           
              <div class="row" id='check'>
              <div class="input-ps" id='check'>
                <label for="" class="input-ps-label" id='check'>Available Provinces </label>
                <div class="check-bx">
                  <div class="check-bx-opt">
                    <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                    <label for="" class="input-ps-label-opt">Western </label>
                  </div>
                  <div class="check-bx-opt">
                    <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                    <label for="" class="input-ps-label-opt">Eastern</label>
                  </div>
                  <div class="check-bx-opt">
                    <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                    <label for="" class="input-ps-label-opt">Central</label>
                  </div>
                  <div class="check-bx-opt">
                    <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                    <label for="" class="input-ps-label-opt">Northern</label>
                  </div>
                  <div class="check-bx-opt">
                    <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                    <label for="" class="input-ps-label-opt">Southern</label>
                  </div>
                  <div class="check-bx-opt">
                    <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                    <label for="" class="input-ps-label-opt">North Western</label>
                  </div>
                </div>
                <div class="check-bx">
                  <div class="check-bx-opt">
                    <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                    <label for="" class="input-ps-label-opt">Sabaragamuwa </label>
                  </div>
                  <div class="check-bx-opt">
                    <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                    <label for="" class="input-ps-label-opt">Uva</label>
                  </div>
                  <div class="check-bx-opt">
                    <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                    <label for="" class="input-ps-label-opt">North Central</label>
                  </div>
                </div>
              </div>
              </div>
              <div class="row">
                  <div class="card">
                    <label for="" class="input-ps-label" id='check'>Upload Catalog </label>
                    <div class="drop_box">
                      <header>
                        <h4>Select File here</h4>
                      </header>
                      <p>Files Supported: PDF, TEXT, DOC , DOCX</p>
                      <input type="file" id="real-file" hidden="hidden" />
                      <button type="button" class="btn" id="custom-button">CHOOSE A FILE</button>
                      <span id="custom-text">No file chosen, yet.</span>
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
