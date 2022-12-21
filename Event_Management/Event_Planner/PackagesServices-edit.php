<?php

// variable to check images and services
$hasPackage = false;

if (isset($_GET['packageId'])) {
    // Start output buffering
    ob_start();

    include('eventplanner_sidenav.php');
    include('eventplanner_header.php');
    include('controllers/commonFunctions.php');

    $packageId = $_GET['packageId'];
    $sql = "SELECT * FROM packages WHERE package_id = $packageId";

    // execute query and check if successful
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // check if the user is the owner of the package
            if ($row['ep_id'] == $_SESSION['user_id']) {
                $hasPackage = true;
                $packageName = $row['package_name'];
                $packageType = $row['event_type'];
                $packagePrice = $row['price_start'];
                $packageDescription = $row['description'];
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
    header("Location: ./PackagesServices.php");
    exit();
}

// avoid fetching images and services in the buffer
if ($hasPackage) {
    // get package image
    $image_sql = "SELECT * FROM package_images WHERE package_id = $packageId";
    $image_result = $conn->query($image_sql);

    // get package services
    $services_sql = "SELECT * FROM package_services WHERE package_id = $packageId";
    $services_result = $conn->query($services_sql);
}
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
            <form method="POST" action="controllers/editPackage.php" enctype="multipart/form-data">
                <input type="hidden" name="packageId" value="<?php echo $packageId ?>" />
                <div class="form-title">Edit Package</div>
                <div class="form-description">You can create a package by including the services you provide. Please
                    fill the form correctly.</div>
                <div class="row">
                    <div class="input">
                        <label class="input-label">Package Name <span>*</span></label>
                        <input type="text" class="input-field" name="packageName" value="<?php echo $packageName ?>" required />
                        <div class="formInputError"><?php echo showSessionMessage('error-packageName') ?></div>
                    </div>
                    <div class="input">
                        <label class="input-label">Event Type <span>*</span></label>
                        <select name="eventType" id="eventType" class="input-field">
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
                        <input type="number" min="0" class="input-field" name="priceFrom" value="<?php echo $packagePrice ?>" required />
                        <div class="formInputError"><?php echo showSessionMessage('error-priceFrom') ?></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input">
                        <label class="input-label">Images <span class="desc">(Maximum 6 images)</span></label>
                        <div class="formInputError"><?php echo showSessionMessage('error-images') ?></div>

                        <div class="row">

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

                        </div>

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
                </div>
                <div class="row">
                    <div class="input">
                        <label class="input-label">Description <span>*</span></label>
                        <!-- <input type="text" class="input-field" required /> -->
                        <textarea class="input-field" rows="5" name="description"><?php echo $packageDescription ?></textarea>
                        <div class="formInputError"><?php echo showSessionMessage('error-description') ?></div>
                    </div>
                </div>
                <div class="row">
                    <label class="input-label">Services <span>*</span> <span class="desc">(Add the services you offer
                            with the package)</span></label>
                </div>
                <div class="formInputError"><?php echo showSessionMessage('error-services') ?></div>
                <div id="container">
                    <?php
                    if ($services_result->num_rows > 0) {
                        $i = 1;
                        while ($service_row = $services_result->fetch_assoc()) {
                            echo '<label class="service-label">Service ' . $i . '</label>
                            <input type="text" name="services[]" class="input-field" value="' . $service_row['service'] . '"/>
                            <br>';
                            $i++;
                        }
                    }
                    ?>
                </div>
                <button type="button" class="add-service-btn" id="btnAddService" onclick="addServiceFields()">Add
                    Service</button>


                <div class="action">
                    <input type="submit" value="Update" class="action-button" />
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

        // select value of event type
        var eventType = document.getElementById("eventType");
        var eventTypeValue = "<?php echo $packageType ?>";
        if (eventTypeValue != "") {
            eventType.value = eventTypeValue;
        }
    </script>

</body>

</html>