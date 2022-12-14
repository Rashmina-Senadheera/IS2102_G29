<?php
include('eventplanner_sidenav.php');
include('eventplanner_header.php');

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/profileEP.css">
    <link rel="stylesheet" href="../css/more-info.css">
</head>

<body>
    <div class="container-profile">
        <div class="flex-container-profile">
            <div class="about">
                <div class="ps-images">
                    <div class="image">
                        <img class="mySlides" src="../images/Suppliers/supplier01.jpg" alt="">
                        <img class="mySlides" src="../images/Suppliers/supplier01a.jpg" alt="">
                        <img class="mySlides" src="../images/Suppliers/supplier01b.jpg" alt="">
                    </div>
                    <button class="display-left" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="display-right" onclick="plusDivs(1)">&#10095;</button>
                </div>
                <div class="product-title">
                    <div class="product-name">
                        Bravo Event Productions Hall
                    </div>
                    <div class="product-cat">
                        Venue
                    </div>
                </div>
                <div class="product-descript">
                    <div class="sm-all-p">
                        <div class="sm-name">
                            <div class="actionBtn">
                                <form action="./request-quotation.php" method="POST">
                                    <input type="hidden" name="ps-id" value="1">
                                    <input type="hidden" name="ps-title" value="Bravo Event Productions Hall">
                                    <button type="submit" name="quotation-type" value="Venue" class="accepted">Request a Quotation</button>
                                </form>
                            </div>
                            <div class="actionBtn">
                                <button type="button" class="rejected" style="margin-left: 0;">
                                    Message Supplier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="info">
                    <div class="personal-info">
                        <div class="product-info-heading">
                            Product / Service Description
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Location</div>
                            <div class="prof-data">No 35, Wijesekara road, Gampaha.</div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Suitable for</div>
                            <div class="prof-data">Weddings, Birthday Parties, Company Parties </div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Maximum Capacity</div>
                            <div class="prof-data">280 people</div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Budget Range</div>
                            <div class="prof-data">Rs. 99,000 - Rs. 580,000</div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Description</div>
                            <div class="prof-data">Founded in 1987. Bravo Event Productions is an award winning, full-service event planning and production company specializing in designing and staging world-class coporate, association, government, military and non-profit functions nationwide.</div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Other facilities</div>
                            <div class="prof-data">Parking spaces available</div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Reviews & Feedbacks</div>
                            <div class="prof-feedback">I just loved the experience. I'm so happy to share my review.have no second thought and doubt in terms of quality of food ,decor and staff behaviour and management.wonderfull place and services.
                                <span class="fa fa-star startChecked"></span>
                                <span class="fa fa-star startChecked"></span>
                                <span class="fa fa-star startChecked"></span>
                                <span class="fa fa-star startChecked"></span>
                                <span class="fa fa-star startChecked"></span>
                            </div>
                            <div class="prof-feedback">Excellnt wedding hall.Good for raining days.Staff is polite and helpful.Price is very reasonable.reccommend forany function.
                                <span class="fa fa-star startChecked"></span>
                                <span class="fa fa-star startChecked"></span>
                                <span class="fa fa-star startChecked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <!-- <div class="prof-feedback">Nice Hall with 2 Floors. The Concerns are that there are No Lift and Less Parking Facility. Otherwise this is a great place to be.</div> -->
                        </div>
                        <!-- <div class="prof-all-p">
                            <div class="prof-name-p">Reviews & Feedbacks</div>
                            <div class="prof-data">
                                <div id="custom-button-me">Menu #1</div>
                            </div>
                        </div> -->
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
            if (n > x.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = x.length
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex - 1].style.display = "block";
        }
    </script>
</body>

</html>