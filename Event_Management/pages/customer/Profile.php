<?php
session_start();
include('customer_sidenav.php');
include('customer_header.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/profileEP.css">
<style>
    .image:hover{
        transform: scale(1.1);
        z-index: 1;

    }
</style>
</head>

<body>
    <!-- <div class="gridMain"> -->
    <div class="container-profile">
        <div class="flex-container-profile">
            <div class="about">
                <div class="image">
                    <img src="../images/cs1.jpg" alt="Profile Picture">
                </div>
                <div class="profile-bio">
                    <div class="profile-name">
                        Daweendri Thilakarathne
                    </div>
                    <div class="profile-role">
                        Customer
                    </div>
                </div>
                <div><br >
                    <div class="sm-all">
                        <div class="center" style="color:white;">Change Picture</div>
                        <div>&nbsp;&nbsp;<input type="file" id="myFile" name="filename" ></div>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="info">
                    <div class="personal-info"><br >
                        <div class="personal-info-heading">
                            Personal Information
                        </div>
                        <br >
                        <div class="prof-all">
                            <div class="prof-name">Full Name</div>
                            <div class="prof-data">Daweendri Thilakarathne</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Email</div>
                            <div class="prof-data">dawee@gmail.com</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">NIC</div>
                            <div class="prof-data">988151807V</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Contact Number</div>
                            <div class="prof-data">0714567321</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Address</div>
                            <div class="prof-data">No 5, New Town, Anuradhapura</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Bio</div>
                            <div class="prof-data">I am a person who is positive about every aspect of life. There are many things I like to do, to see, and to experience. I like to read, I like to write; I like to think, I like to dream; I like to talk, I like to listen.</div>
                        </div>
                        <br ><br >
                        <center><button id="btnEditProfile" class="srcButton" data-inline="true">Update Profile</button>
                        <a href="Password.php"><button type="submit" class="srcButton" data-inline="true">Change Password</button></center></a>
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
        Update Profile
    </div>
    <div class="modal-body">
        <form action="#" method="POST">
            <div class="row">
                <div class="col-50">
                    <label for="fname">Full Name</label>
                    <input type="text" id="fname" name="fullname" placeholder="Your name..">
                </div>
                <div class="col-50">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Your email..">
                </div>           
            </div>
            <div class="row">
            <div class="col-50">
                    <label for="nic">NIC</label>
                    <input type="text" id="nic" name="nic" placeholder="Your nic..">
                </div>
                <div class="col-50">
                    <label for="contact">Contact Number</label>
                    <input type="text" id="contact" name="contact" placeholder="Your contact number..">
                </div>              
            </div>
            <div class="row">
            <div class="col-50">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" placeholder="Your address..">
                </div>
                <div class="col-50">
                    <label for="address">Bio</label>
                    <input type="text" id="bio" name="bio" placeholder="Your bio..">
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-50">
                    <input type="submit" id="btnupdate" value="Update Profile">
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
    
</body>
<script>
    var fname = document.getElementById('fname');
    var email = document.getElementById('email');
    var nic = document.getElementById('nic');
    var contact = document.getElementById('contact');
    var address = document.getElementById('address');
    var bio = document.getElementById('bio');
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
