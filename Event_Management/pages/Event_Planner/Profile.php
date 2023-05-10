<?php
require_once('eventplanner_sidenav.php');
require_once('eventplanner_header.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/profileEP.css">
</head>

<body>
    <!-- <div class="gridMain"> -->
    <div class="container-profile">
        <div class="flex-container-profile">
            <div class="about">
                <div class="image">
                    <img src="../../images/defaultPP.jpg" alt="Profile Picture">
                </div>
                <div class="profile-bio">
                    <div class="profile-name">
                        Sachintha Gunaratne
                    </div>
                    <div class="profile-role">
                        Event Planner
                    </div>
                </div>
                <div class="social-media">
                    <div class="sm-all">
                        <div class="sm-logo">
                            <img src="../../images/icons/web.png" alt="">
                        </div>
                        <div class="sm-name">Website</div>
                        <div class="sm-link">Not set</div>
                    </div>
                    <div class="sm-all">
                        <div class="sm-logo">
                            <img src="../../images/icons/instagram.png" alt="">
                        </div>
                        <div class="sm-name">Instagram</div>
                        <div class="sm-link">sxchintha</div>
                    </div>
                    <div class="sm-all">
                        <div class="sm-logo">
                            <img src="../../images/icons/facebook.png" alt="">
                        </div>
                        <div class="sm-name">Facebook</div>
                        <div class="sm-link">sxchintha</div>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="info">
                    <div class="personal-info">
                        <div class="personal-info-heading">
                            Personal Information
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Full Name</div>
                            <div class="prof-data">Sachintha Gunaratne</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Email</div>
                            <div class="prof-data">sachinthasl99@gmail.com</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">NIC</div>
                            <div class="prof-data">991458123V</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Contact 1</div>
                            <div class="prof-data">0769852145</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Contact 2</div>
                            <div class="prof-data">0714523695</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Address</div>
                            <div class="prof-data">No 35, Salmal road, Kalutara</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Bio</div>
                            <div class="prof-data">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam consequatur voluptatibus official doloremque Voluptatem voluptate quidem dolorem inventore repudiandae accusamus quas consequuntur molestiae natus necessitatibus quae.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span class="close">&times;</span>
                Update your profile
            </div>
            <div class="modal-body">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-50">
                            <label for="fname">First Name</label>
                            <input type="text" id="fname" name="firstname" placeholder="Your name..">
                        </div>
                        <div class="col-50">
                            <label for="lname">Last Name</label>
                            <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-50">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" placeholder="Your email..">
                        </div>
                        <div class="col-50">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" placeholder="Your address..">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-50">
                            <label for="contact1">Contact Number 1</label>
                            <input type="text" id="contact1" name="contact1" placeholder="Your contact number..">
                        </div>
                        <div class="col-50">
                            <label for="contact2">Contact Number 2</label>
                            <input type="text" id="contact2" name="contact2" placeholder="Your contact number..">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-50">
                            <label for="eventTypes">Event Types</label>
                            <ul class="eventList">
                                <div class="row">
                                    <li><input type="checkbox" /><label>Birthdays</label><br /></li>
                                    <li><input type="checkbox" /><label>Company parties</label></li>
                                    <li><input type="checkbox" /><label>Conferences</label></li>
                                </div>
                                <div class="row">
                                    <li><input type="checkbox" /><label>Exhibitions</label></li>
                                    <li><input type="checkbox" /><label>Seminars</label></li>
                                    <li><input type="checkbox" /><label>Sports and competition</label></li>
                                </div>
                                <div class="row">
                                    <li><input type="checkbox" /><label>Weddings</label></li>
                                </div>
                            </ul>
                        </div>
                    </div><br /><br />
                    <div class="row">
                        <div class="col-50">
                            <input type="submit" id="btnupdate" value="Update Profile">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- </div> -->

</body>

<script>
    var fname = document.getElementById('fname');
    var lname = document.getElementById('lname');
    var email = document.getElementById('email');
    var address = document.getElementById('address');
    var contact1 = document.getElementById('contact1');
    var contact2 = document.getElementById('contact2');
    var eventTypes = document.getElementById('eventTypes');
    var btnupdate = document.getElementById('btnupdate');
    var btnEditProfile = document.getElementById('btnEditProfile');

    // Dropdown check list for event types
    // eventTypes.getElementsByClassName('anchor')[0].onclick = function(evt) {
    //     if (eventTypes.classList.contains('visible'))
    //         eventTypes.classList.remove('visible');
    //     else
    //         eventTypes.classList.add('visible');
    // }

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btnEditProfile.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //     }
    // }
</script>

</html>