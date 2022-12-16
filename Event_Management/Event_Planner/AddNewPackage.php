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
                <div class="form-description">You can create a package by including the services you provide. Please fill the form correctly.</div>
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
                        <label class="input-label">Images <span class="desc">(Maximum 5 images)</span></label>
                        <!-- <input type="file" id="img" name="img" accept="image/*" value="Choose Image" required> -->
                        <input type="file" name="images[]" id="img" class="inputfile" accept="image/*" multiple required />
                        <label for="img">Choose Image</label>
                        <div class="formInputError"><?php echo showSessionMessage('error-lastname') ?></div>
                        <!-- <p id="testp"></p> -->
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
                    <label class="input-label">Services <span>*</span> <span class="desc">(Add the services you offer with the package)</span></label>
                </div>
                <div class="formInputError"><?php echo showSessionMessage('error-services') ?></div>
                <div id="container"></div>
                <button type="button" class="add-service-btn" id="btnAddService" onclick="addServiceFields()">Add Service</button>


                <div class="action">
                    <input type="submit" value="Create" class="action-button" />
                </div>
            </form>
        </div>
    </div>

    <script type='text/javascript'>
        var numOfServices = 0;
        var img = document.getElementById("img");
        var btnAddService = document.getElementById("btnAddService");

        img.onchange = e => {
            if (window.File && window.FileList && window.FileReader && window.Blob) {
                var files = e.target.files;

                // check number of images (max 5)
                if (files.length > 5) {
                    alert("Maximum 5 images are allowed");
                    img.value = '';
                    return;
                }

                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var fileReader = new FileReader();
                    fileReader.onload = function(e) {
                        // add imgage preview with delete button
                        var div = document.createElement("div");
                        var img = document.createElement("img");
                        var btn = document.createElement("button");
                        btn.innerHTML = "X";
                        btn.className = "img-delete-btn";
                        btn.addEventListener('click', () => {
                            img.remove();
                            btn.remove();
                        });

                        img.src = e.target.result;
                        img.className = "thumbnail";
                        div.appendChild(img);
                        div.appendChild(btn);
                        document.getElementById("imgResult").appendChild(div);
                    }
                    fileReader.readAsDataURL(file);
                }
            } else {
                alert("Your browser doesn't support File API");
            }
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