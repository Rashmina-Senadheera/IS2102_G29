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
                <div class="image" id="profilePic">
                    
                </div>
                <div class="profile-bio">
                    <div class="profile-name">
                        <p id="txtProfileName"></p>
                        
                    </div>
                    <div class="profile-role">
                        Customer
                    </div>
                </div>
                <div><br >
                <form action="php/profileBackend.php"  method="POST" enctype="multipart/form-data">
                    <div class="sm-all">
                        <div class="center" style="color:white;">Change Picture</div>
                        <div>&nbsp;&nbsp;<input type="file" id="myFile"  name="pp" ></div>
                        
                    </div>
                    <center><input class="srcButton" type="submit" id="btnProPicpdate" value="Update Profile Picture"></center>
                </form>
                </div>
            </div>
            <div class="other">
                <div class="info">
                    <div class="personal-info"><br >
                    <center>
                        <div class="personal-info-heading">
                            Personal Information
                        </div>
                    </center>    
                        <br >
                        <div class="prof-all">
                            <div class="prof-name">Full Name</div>
                            <div class="prof-data" ><p id="txtName">Daweendri Thilakarathne</p></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Email</div>
                            <div class="prof-data" ><p id="txtEmail">dawee@gmail.com</p></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">NIC</div>
                            <div class="prof-data" ><p id="txtNIC">988151807V</p></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Contact Number</div>
                            <div class="prof-data" ><hp id="txtPhoneNo">0714567321</p></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Address</div>
                            <div class="prof-data" ><p id="txtAdress">No 5, New Town, Anuradhapura</p></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Bio</div>
                            <div class="prof-data" ><p id="txtBio">I am a person who is positive about every aspect of life. There are many things I like to do, to see, and to experience. I like to read, I like to write; I like to think, I like to dream; I like to talk, I like to listen.</p></div>
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
        
            <div class="row">
                <div class="col-50">
                    <label for="fname">Full Name</label><span><p id="valiName" style="color:red;"></p></span>
                    <input type="text" id="fname" name="fullname" placeholder="Your name..">
                </div>
                <div class="col-50">
                    <label for="email">Email</label><span><p id="valiEmail" style="color:red;"></p></span>
                    <input type="text" id="email" name="email" placeholder="Your email..">
                </div>           
            </div>
            <div class="row">
            <div class="col-50">
                    <label for="nic">NIC</label><span><p id="valiNIC" style="color:red;"></p></span>
                    <input type="text" id="nic" name="nic" placeholder="Your nic..">
                </div>
                <div class="col-50">
                    <label for="contact">Contact Number</label><p id="valiContactNumber" style="color:red;"></p></span>
                    <input type="text" id="contact" name="contact" placeholder="Your contact number..">
                </div>              
            </div>
            <div class="row">
            <div class="col-50">
                    <label for="address">Address</label><p id="valiAdress" style="color:red;"></p></span>
                    <input type="text" id="address" name="address" placeholder="Your address..">
                </div>
                <div class="col-50">
                    <label for="address">Bio</label><p id="valiBio" style="color:red;"></p></span>
                    <input type="text" id="bio" name="bio" placeholder="Your bio..">
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-50">
                    <input type="button" id="btnupdate" class="srcButton" value="Update Profile">
                </div>
            </div>
        
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

    $(document).ready(function() {
    // your code here
    callPHPFunction();
    });

    $("#btnupdate").click(function(){
        UpdateDetails();
    });


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

    function callPHPFunction() {
    fetch("php/ProfileBackend.php?method=loadData")
    .then(response => response.json())
    .then(data => {
             $('#profilePic').html('');
            let row = data[0];            
            $('#txtEmail').text(row.username);
            $('#txtName').text(row.fname);
            $('#txtProfileName').text(row.fname);
            $('#txtNIC').text(row.nic);
            $('#txtPhoneNo').text(row.tel);
            $('#txtAdress').text(row.address);
            $('#txtBio').text(row.bioo);
            console.log(row.pp);
            var path="<img src='upload/"+row.pp+"' alt='Profile Picture'>"
            console.log(path);
             $( "#profilePic" ).append(path);
       
    });
   
    }

    function UpdateDetails(){
       var isEmail= false;
       var isValiContactNumber= false;
       var isValiName= false;

       var name=$('#fname').val();
       var email=$('#email').val();
       var nic=$('#nic').val();
       var address=$('#address').val();
       var contact=$('#contact').val();
       var bio=$('#bio').val();
       $('#valiEmail').text("");
       $('#valiContactNumber').text("");
       $('#valiName').text("");

       if(ValidateEmail(email)){ 
        $('#valiEmail').text("You have entered an invalid email address!");
        isEmail =false
       }else{
        isEmail =true
       }
        if(phonenumber(contact)){
        $('#valiContactNumber').text("Not a valid Phone Number");
        isValiContactNumber =false
       }else{
        isValiContactNumber =true
       }
       
       if(name == ''){
        $('#valiName').text("This field can't be empty ");
        isValiName =false
       }else{
        isValiName =true
       }
      if(isEmail && isValiContactNumber && isValiName){
        $('#valiName').text("This field can't be empty ");
       
       
        $.ajax({
                type: "POST",
                url: "php/ProfileBackend.php?method=update",
                data: { "NAME": name, "EMAIL": email, "NIC": nic, "PHONE_NUMBER": contact, "ADDRESS": address, "BIO": bio},
                success: function(response){
                    console.log(response);
                    callPHPFunction();
                    swal("Good job!", "Profile Updated!", "success");
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
        });

    }
    }

    function ValidateEmail(inputText)
    {
        var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
        if(!pattern.test(inputText))
        {
        return true;
        }
        else
        {
        return false;
        }
    }

    function phonenumber(inputtxt)
    {
        var pattern = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
        if(!pattern.test(inputtxt))
        {
        return true;
        }
        else
        {
        
        return false;
        }
    }

    
    function nic(inputtxt)
    {
    }


</script>


</html>
