<?php
    session_start();
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
    if(isset($_SESSION['user_name'])){
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = 'stylesheet' href = '../../css/supplierMain.css'>
    <link rel="stylesheet" href="../../css/profile.css">
</head>

<body>
    <div class="container-profile">
        <div class="flex-container-profile">
            <div class="about">
                <div class="image"></div>
                <div class="profile-bio">
                    <div class="profile-name">
                        Shamin Fernando
                    </div>    
                    <div class="profile-role">
                        Supplier
                    </div> 
                </div>
                <div class="social-media">
                    <div class="sm-all">
                        <div class="sm-logo">
                            <img src="images/world-wide-web.png" alt="">
                        </div>
                        <div class="sm-name">Website</div>
                        <div class="sm-link">udarisevents.com</div>
                    </div>
                    <div class="sm-all">
                        <div class="sm-logo">
                            <img src="images/instagram.png" alt="">
                        </div>
                        <div class="sm-name">Instagram</div>
                        <div class="sm-link">udari_event</div>
                    </div>
                    <div class="sm-all">
                        <div class="sm-logo">
                            <img src="images/facebook.png" alt="">
                        </div>
                        <div class="sm-name">Facebook</div>
                        <div class="sm-link">udari_event</div>
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
                            <div class="prof-data">Shamin Fernando</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Email</div>
                            <div class="prof-data">hhshaminf@gmail.com</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Phone</div>
                            <div class="prof-data">0762008919</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Mobile</div>
                            <div class="prof-data">0777931062</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Address</div>
                            <div class="prof-data">38 B wewala Horana</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Based In</div>
                            <div class="prof-data">Colombo 7</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Experience</div>
                            <div class="prof-data">4 Years</div>
                        </div>
                        <div class="prof-all">
                            <div class="prof-name">Bio</div>
                            <div class="prof-data">We are committed in providing our customers with an exceptional service
while offering our employees the best training.</div>
                        </div>
                    </div>
                </div>
                <div class="p-s-info">
                    <main role="main">
                        <div class="personal-info-heading">
                            Products & Services
                        </div> 
                        <a href="/tags/javascript/"><span class="tag tag-javascript tag-lg">#wedding</span></a>
                        <a href="/tags/security/"><span class="tag tag-security tag-lg">#anniversary</span></a>
                        <a href="/tags/firebase/"><span class="tag tag-firebase tag-lg">#birthday</span></a>
                        <a href="/tags/firestore/"><span class="tag tag-firestore tag-lg">#corporate events</span></a>
                        <a href="/tags/auth/"><span class="tag tag-auth tag-lg">#surprise parties</span></a>
                        <a href="/tags/firebase/"><span class="tag tag-firebase tag-lg">#farewells</span></a>
                    </main>       
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php
 }else{
    header("Location:sign_in.php?");
    exit();
 }
?>