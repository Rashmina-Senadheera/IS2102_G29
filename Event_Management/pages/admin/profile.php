<?php 
    
    include("admin_header.php");
    include("admin_nav.php");

    $_SESSION["page_name"] = "Profile";
    $id = $_SESSION['user_id'];
    $row = get_details($id);
    
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
                    
                        <div class="personal-info-heading">
                            Personal Information
                        </div>
                       
                        
                        <div class="prof-all">
                            <div class="prof-name">Full Name</div>
                            <div class="prof-data" ><p id="txtName"><?php if($row){ echo $row['name'];} else{ echo "Not Availabale";} ?></p></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Email</div>
                            <div class="prof-data" ><p id="txtEmail"><?php if($row){ echo $row['email'];} else{ echo "Not Availabale";} ?></p></div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">NIC</div>
                            <div class="prof-data" ><p id="txtNIC"><?php if($row){ echo $row['nic'];} else{ echo "Not Availabale";} ?></p></div>
                        </div>
                        
                        <div class="buttons">
                        <button id="btnEditProfile" class="srcButton" data-inline="true">Update Profile</button>
                        <a href="Password.php"><button type="submit" class="srcButton" data-inline="true">Change Password</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <!-- The Modal -->
    

</main>

</body>