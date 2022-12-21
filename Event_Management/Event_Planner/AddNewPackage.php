<?php
include('eventplanner_sidenav.php');
include('eventplanner_header.php');
include('controllers/commonFunctions.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/formEP.css">
</head>

<body>
    <div class="main-body">
        <div class="form-card">
            <form method="POST" action="controllers/addNewPackage.php" enctype="multipart/form-data">
                <div class="form-title">Create New Package</div>
                <div class="form-description">You can create a package by including the services you provide. Please
                    fill the form correctly.</div>
                <div class="row">
                    <div class="input">
                        <label class="input-label">Package Name <span>*</span></label>
                        <input type="text" class="input-field" name="packageName" required />
                        <div class="formInputError"><?php echo showSessionMessage('error-packageName') ?></div>
                    </div>
                    <div class="input">
                        <label class="input-label">Event Type <span>*</span></label>
                        <select name="eventType" class="input-field">
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
                        <div class="formInputError"><?php echo showSessionMessage('error-eventType') ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input">
                        <label class="input-label">Price Start From (Rs.) <span>*</span></label>
                        <input type="number" min="0" class="input-field" name="priceFrom" required />
                        <div class="formInputError"><?php echo showSessionMessage('error-priceFrom') ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input">
                        <label class="input-label">Images <span class="desc">(Maximum 6 images)</span></label>
                        <div class="formInputError"><?php echo showSessionMessage('error-lastname') ?></div>
                        <div class="row">
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
                    <div class="input">
                        <label class="input-label">Description <span>*</span></label>
                        <!-- <input type="text" class="input-field" required /> -->
                        <textarea class="input-field" rows="5" name="description"></textarea>
                        <div class="formInputError"><?php echo showSessionMessage('error-description') ?></div>
                    </div>
                </div>
                <div class="row">
                    <label class="input-label">Services <span>*</span> <span class="desc">(Add the services you offer
                            with the package)</span></label>
                </div>
                <div class="formInputError"><?php echo showSessionMessage('error-services') ?></div>
                <div id="container"></div>
                <button type="button" class="add-service-btn" id="btnAddService" onclick="addServiceFields()">Add
                    Service</button>


                <div class="action">
                    <input type="submit" value="Create" class="action-button" />
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
    </script>

</body>

</html>