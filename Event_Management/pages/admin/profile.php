<?php 
    
    include("admin_header.php");
    include("admin_nav.php");

    $_SESSION["page_name"] = "Profile";
    
    

?>
<!DOCTYPE html>

<body>
<main class="admin_main">

    <!-- <div class="gridMain"> -->
    <div class="container-profile">
        <div class="flex-container-profile">
            <div class="about">
                <div class="image" id="profilePic">
                    <img src="../../images/evt_planner.jfif" >
                    
                </div>
                <div class="profile-bio">
                    <div class="profile-name">
                        <p id="txtProfileName"></p>
                        
                    </div>
                    
                </div>
                <div>
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
    

</main>

</body>