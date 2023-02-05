<?php
    session_start();
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
    include('../controllers/commonFunctions.php');
    $pid = $_GET['product_type'];
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
    <link rel="stylesheet" href="../../css/modal.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../js/form.js"></script>
    
</head>

<body>
  
  <div class="container-profile">
    
    <div class="flex-container-addps">

      <div class ='grid-main' id='ps'>

        <form class='add-ps' action="controllers/passdata.php" method="POST" enctype="multipart/form-data">

          <h4 class='ps-form-title'>Add Venue</h4>

          <div class="form-description">
            You can create a package by including the services you provide. Please fill the form correctly.
          </div>
          
          <div class="row">
            <?php if (isset($_SESSION['success'])) { 
                 echo '<p class="success">' . showSessionMessage("success") . '</p>';
            }?>
            <?php if (isset($_GET['successs'])) { ?>
                <p class="success"><i class="fa-solid fa-check"></i><?php echo $_GET['successs']; ?></p>
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
          
          <!-- Venue Optional Parameters -->
          <?php if($pid == 'venue') {?>

            <div class="row">
              <div class="input-ps">
                <label for="" class="input-ps-label">Venue in <span>*</span></label>
                <select name="venueIn" id="type" required>
                  <option value="indoor">Indoor</option>
                  <option value="outdoor">Outdoor</option>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="input-ps" >
                <label for="" class="input-ps-label">Location <span>*</span> </label>
                <input type="text" placeholder="Full Name" name="location" class="input-ps-in" required/>
              </div>
            </div>

            <div class="row">
              <div class="input-ps">
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
            </div>

            <div class="row">
              <div class="input-ps">
                <label for="" class="input-ps-label" >Capacity </label>
              </div>
            </div>
            <div class= "row">
              <div class="input-ps">    
                <div class="wrapper">
                  <header>
                    <p> Enter min and max seating capacity </p>
                  </header>
                  <div class="price-input">
                    <div class="field">
                      <span>Min</span>
                      <input type="number" class="input-min" name="maxCap" value="2500">
                    </div>
                    <div class="field">
                      <span>Max</span>
                      <input type="number" class="input-max" name="minCap" value="7500">
                    </div>
                  </div>
                  <div class="slider">
                    <div class="progress"></div>
                  </div>
                  <div class="range-input">
                    <input type="range" class="range-min" min="0" max="10000" value="2500" step="100">
                    <input type="range" class="range-max" min="0" max="10000" value="7500" step="100">
                  </div>
                </div>
              </div>
            </div>

          <?php } ?>
          <!-- Venue Optional Parameters end -->

          <!-- Transport Optional Parameters -->
          <?php if($pid == 'transport') {?>

            <div class="row">
              <div class="input-ps">
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

            <?php } ?>
            <!-- Transport Optional Parameters end -->

                <?php if($pid == 'cb') {?>
                <div class="row" id='check'>
                <div class="input-ps" id='check'>
                  <label for="" class="input-ps-label" id='check'>Catered for</label>
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
                  <label for="" class="input-ps-label" id='check'>Available as </label>
                  <div class="check-bx">
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                      <label for="" class="input-ps-label-opt">Packets/Cups</label>
                    </div>
                    <div class="check-bx-opt">
                      <input type="checkbox" id="type-venue" name="type-venue" value="Car">
                      <label for="" class="input-ps-label-opt">Buffet</label>
                    </div>
                  </div>
                </div>
                <div class="input-ps" id='check'>
                  <label for="" class="input-ps-label" id='check'>Available For </label>
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
                  </div>
                  <div class="check-bx">
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
                <div class="row">
                    <div class="card">
                      <label for="" class="input-ps-label" id='check'>Upload Menu </label>
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
                <?php } ?>
                <?php if($pid == 'florist') {?>
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
                  <?php } ?>
                  <?php if($pid == 'deco') {?>

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
                  <?php } ?>
                <?php if($pid == 'florist' || $pid == 'deco' || $pid == 'cb' ) {?>
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
              <?php } ?>
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
                          <div class="upload__img-wrap"></div>
                        </div>
                      </div>
                    </div>
                  </div> -->

              <div class="row">
                <div class="input-ps">

                  <label class="input-label">Images <span class="desc">(Maximum 6 images)</span></label>

                  <div class="row" id="img">

                    <input type="file" name="images[]" id="img0" class="inputfile" accept="image/*" onchange="imageSelect(this, 0)" />
                    <label for="img0" id="labelImg0">+</label>
                    <img for="img0" class="imgPreview" id="prev0" src="" onclick="clickImage(0)"></img>
                    <button type="button" id="removeImg0" class="img-delete-btn">X</button>


                    <input type="file" name="images[]" id="img1" class="inputfile" accept="image/*" onchange="imageSelect(this, 1)" />
                    <label for="img1" id="labelImg1">+</label>
                    <img class="imgPreview" id="prev1" src="" onclick="clickImage(1)"></img>
                    <button type="button" id="removeImg1" class="img-delete-btn">X</button>


                    <input type="file" name="images[]" id="img2" class="inputfile" accept="image/*" onchange="imageSelect(this, 2)" />
                    <label for="img2" id="labelImg2">+</label>
                    <img class="imgPreview" id="prev2" src="" onclick="clickImage(2)"></img>
                    <button type="button" id="removeImg2" class="img-delete-btn">X</button>

                    <input type="file" name="images[]" id="img3" class="inputfile" accept="image/*" onchange="imageSelect(this, 3)" />
                    <label for="img3" id="labelImg3">+</label>
                    <img class="imgPreview" id="prev3" src="" onclick="clickImage(3)"></img>
                    <button type="button" id="removeImg3" class="img-delete-btn">X</button>

                    <input type="file" name="images[]" id="img4" class="inputfile" accept="image/*" onchange="imageSelect(this, 4)" />
                    <label for="img4" id="labelImg4">+</label>
                    <img class="imgPreview" id="prev4" src="" onclick="clickImage(4)"></img>
                    <button type="button" id="removeImg4" class="img-delete-btn">X</button>

                    <input type="file" name="images[]" id="img5" class="inputfile" accept="image/*" onchange="imageSelect(this, 5)" />
                    <label for="img5" id="labelImg5">+</label>
                    <img class="imgPreview" id="prev5" src="" onclick="clickImage(5)"></img>
                    <button type="button" id="removeImg5" class="img-delete-btn">X</button>

                  </div>

                  <output id="imgResult"></output>

                </div>
              </div>
              
              <div class="row">
              <div class="input-ps">
                <label for="" class="input-ps-label">Other Details <span>*</span></label>
                <textarea  name="other" class="input-ps-in" id='other' required spellcheck="true">
                </textarea>
              </div>
            </div>

            <?php if($pid == 'venue') {?> 
            <div class="action">
              
                <input type="submit" value="Add" class="action-button" />
              
            </div>
            <?php } ?>   

            </div>
          </form>
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
    </script>
</body>

</html>

<?php
 }else{
    header("Location:sign_in.php?");
    exit();
 }
?>