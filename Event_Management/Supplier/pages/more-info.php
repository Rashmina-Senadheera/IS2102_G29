<?php
    include('supplier_sidenav.php');
    include('header.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/more-info.css">
</head>

<body>
    <div class="container-profile">
        <div class="flex-container-profile">
            <div class="about">
                <div class="image">
                    <img class="mySlides" src="../images/profile.jpg" alt="">
                    <img class="mySlides" src="../images/facebook.png" alt="">
                    <img class="mySlides" src="../images/instagram.png" alt="">
                    <button class="display-left" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="display-right" onclick="plusDivs(1)">&#10095;</button>
                </div>
                <div class="product-title">
                    <div class="product-name">
                        Eclairs for Cheap
                    </div>    
                    <div class="product-cat">
                        Catering
                    </div> 
                </div>
                <div class="product-descript">
                    <div class="sm-all-p">
                        <div class="sm-name">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sollicitudin nisl velit, ut suscipit</div>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="info">
                    <div class="personal-info">
                        <div class="personal-info-heading">
                            Product Description
                        </div> 
                        <div class="prof-all-p">
                            <div class="prof-name-p">Catered For</div>
                            <div class="prof-data">Indoor Events</div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Transport provided</div>
                            <div class="prof-data">Provided</div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Available as</div>
                            <div class="prof-data">Packets</div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Available Provinces</div>
                            <div class="prof-data">Western,Southern</div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Menu</div>
                            <div class="prof-data">
                                <div id="custom-button-me">Menu #1</div>
                            </div>
                        </div>

                         <div class="prof-all-e">
                                <button type="button" class="custom-button-e" id="ed">Edit</button>
                                <button type="button" class="custom-button-e" id="del">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
    showDivs(slideIndex += n);
    }

    function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    x[slideIndex-1].style.display = "block";  
    }
    </script>
</body>

</html>
