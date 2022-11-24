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
    <!-- <link rel="stylesheet" href="eventPlannerMain.css">
    <link rel="stylesheet" href="profile.css"> -->
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/addps.css">
</head>

<body>
    <div class="container-profile">
        <div class="flex-container-addps">
			<div class="title-search">
                <div class = 'searchSec'>
                    <div class = 'page-title'> Add New Products & Services </div>
                </div>
            </div>
            <div class ='grid-main' id='ps'>
                <div class="ps-title">
                     <div class="ps-title-head">Let's add new Products & Services.</div>
                     <div class="ps-title-sub">Choose any option below</div>
                </div>
                <div class="ps-categories">
                    <div class="products">
                        <ul id='p'>
                            <li class = "header"><div class="ps-cat-desc">
                                    <i class='bx bx-package'></i>
                                    <div class="ps-cat-title">Add a Product</div>
                                </div></li>
                            <a href="form-catering.php" id="btn">
                            <li class = "header" id="ps-item-add">
                                <div class="ps-cat-desc" id='item'>
                                    <div class="ps-cat-item">Catering</div>
                                    <i class='bx bx-chevron-right' id="item"></i>
                                </div>
                            </li></a>
                            <a href="form-transport.php" id="btn">
                            <li class = "header" id="ps-item-add">
                                <div class="ps-cat-desc" id='item'>
                                    <div class="ps-cat-item">Transport</div>
                                    <i class='bx bx-chevron-right' id="item"></i>
                                </div>
                            </li></a>
                            <a href="form-beverage.php" id="btn">
                            <li class = "header" id="ps-item-add">
                                <div class="ps-cat-desc" id='item'>
                                    <div class="ps-cat-item">Beverages</div>
                                    <i class='bx bx-chevron-right' id="item"></i>
                                </div>
                            </li></a>
                            <a href="form-florist.php" id="btn">
                            <li class = "header" id="ps-item-add">
                                <div class="ps-cat-desc" id='item'>
                                    <div class="ps-cat-item">Florists</div>
                                    <i class='bx bx-chevron-right' id="item"></i>
                                </div>
                            </li></a>
                            <a href="form-deco.php" id="btn">
                            <li class = "header" id="ps-item-add" >
                                <div class="ps-cat-desc" id='item'>
                                    <div class="ps-cat-item">Decoration</div>
                                    <i class='bx bx-chevron-right' id="item"></i>
                                </div>
                            </li></a>
                            <a href="form-other.php" id="btn">
                            <li id="ps-item-add">
                                <div class="ps-cat-desc" id='item'>
                                    <div class="ps-cat-item">Other</div>
                                    <i class='bx bx-chevron-right' id="item"></i>
                                </div>
                            </li></a>
                        </ul>
                    </div>
                    <div class="services">
                        <ul id='s'>
                            <li class = "header">
                                <div class="ps-cat-desc">
                                    <i class='bx bxs-user-check'></i>
                                    <div class="ps-cat-title">Add a Service</div>
                                </div>
                            </li>
                            <a href="form-photo.php" id="btn">
                            <li class = "header" id="ps-item-add">
                                <div class="ps-cat-desc" id='item'>
                                    <div class="ps-cat-item">Photography</div>
                                    <i class='bx bx-chevron-right' id="item"></i>
                                </div>
                            </li></a>
                            <a href="form-ent.php" id="btn">
                            <li class = "header" id="ps-item-add">
                                <div class="ps-cat-desc" id='item'>
                                    <div class="ps-cat-item">Entertainment</div>
                                    <i class='bx bx-chevron-right' id="item"></i>
                                </div>
                            </li></a>
                            <a href="form-other.php" id="btn">
                            <li id="ps-item-add">
                                <div class="ps-cat-desc" id='item'>
                                    <div class="ps-cat-item">Other</div>
                                    <i class='bx bx-chevron-right' id="item"></i>
                                </div>
                            </li></a>
                        </ul>
                    </div>
                </div>
            </div>
		</div>
        
	</div>
</body>

</html>
