<?php
include('eventplanner_sidenav.php');
include('eventplanner_header.php');
include('./controllers/commonFunctions.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../css/viewSuppliersEP.css">
    <link rel="stylesheet" href="../css/filterEP.css">
</head>

<body>
    <!-- Show success message -->
    <div class="success-message">
        <?php echo showSessionMessage('success'); ?>
    </div>
    <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
                <div class="page-title"> Supplier Products & Services </div>
                <div class="input-container">
                    <input class="input-field" type="text" placeholder="Search suppliers" name="search">
                    <i class="fa fa-search icon"></i>
                </div>
                <button type="submit" class="srcButton">Search</button>
            </div>
        </div>
        <div class="gridMain">
            <div class="suppliers-cards-container">

                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../images/Suppliers/supplier01.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Bravo Event Productions Hall</h3>
                            <span>
                                Founded in 1987. Bravo Event Productions is an award winning, full-service event planning and production company specializing in designing and staging world-class coporate, association, government, military and non-profit functions nationwide.
                            </span>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <!-- <a href="" class="view-supplier">View</a> -->
                            <a href="./Supplier-more-info.php" class="view-supplier">View</a>
                        </li>
                        <li>
                            <form action="./request-quotation.php" method="POST">
                                <input type="hidden" name="ps-id" value="1">
                                <input type="hidden" name="ps-title" value="Bravo Event Productions Hall">
                                <button type="submit" name="quotation-type" value="Venue" class="request">Request a Quotation</button>
                            </form>
                            <!-- <a href="./request-quotation-venue.php" class="request">Request a Quotation</a> -->
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../images/Suppliers/supplier02.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Fruit & Chocolate sensations</h3>
                            <span>
                                Our Company was the first in years to start Chocolate Fountains when nobody knew what it was? Year later we are skill here today for all types of events. We cater from 25 guests 800 guests we can make it happend.
                            </span>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <a href="" class="view-supplier">View</a>
                            <!-- <a href="./Supplier-more-info.php" class="view-supplier">View</a> -->
                        </li>
                        <li>
                            <form action="./request-quotation.php" method="POST">
                                <input type="hidden" name="ps-id" value="1">
                                <input type="hidden" name="ps-title" value="Fruit & Chocolate sensations">
                                <button type="submit" name="quotation-type" value="Catering" class="request">Request a Quotation</button>
                            </form>
                            <!-- <a href="./request-quotation-catering.php" class="request">Request a Quotation</a> -->
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../images/Suppliers/supplier03.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Decorento Party Supplies</h3>
                            <span>
                                Decorento Party Supplies is a leading party supplies company in Sri Lanka. We are the pioneers in the party supplies industry in Sri Lanka. We have been in the industry for over 20 years and have been providing our services to the public for over 10 years.
                            </span>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <a href="" class="view-supplier">View</a>
                            <!-- <a href="./Supplier-more-info.php" class="view-supplier">View</a> -->
                        </li>
                        <li>
                            <form action="./request-quotation.php" method="POST">
                                <input type="hidden" name="ps-id" value="1">
                                <input type="hidden" name="ps-title" value="Decorento Party Supplies">
                                <button type="submit" name="quotation-type" value="Decoration" class="request">Request a Quotation</button>
                            </form>
                            <!-- <a href="./request-quotation-decoration.php" class="request">Request a Quotation</a> -->
                        </li>
                    </ul>
                </div>


                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../images/Suppliers/supplier01.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Bravo Event Productions Hall</h3>
                            <span>
                                Founded in 1987. Bravo Event Productions is an award winning, full-service event planning and production company specializing in designing and staging world-class coporate, association, government, military and non-profit functions nationwide.
                            </span>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <a href="" class="view-supplier">View</a>
                        </li>
                        <li>
                            <a href="" class="request">Request a Quotation</a>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../images/Suppliers/supplier02.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Fruit & Chocolate sensations</h3>
                            <span>
                                Our Company was the first in years to start Chocolate Fountains when nobody knew what it was? Year later we are skill here today for all types of events. We cater from 25 guests 800 guests we can make it happend.
                            </span>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <a href="" class="view-supplier">View</a>
                        </li>
                        <li>
                            <a href="" class="request">Request a Quotation</a>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../images/Suppliers/supplier03.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Decorento Party Supplies</h3>
                            <span>
                                Decorento Party Supplies is a leading party supplies company in Sri Lanka. We are the pioneers in the party supplies industry in Sri Lanka. We have been in the industry for over 20 years and have been providing our services to the public for over 10 years.
                            </span>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <a href="" class="view-supplier">View</a>
                        </li>
                        <li>
                            <a href="" class="request">Request a Quotation</a>
                        </li>
                    </ul>
                </div>


                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../images/Suppliers/supplier01.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Bravo Event Productions Hall</h3>
                            <span>
                                Founded in 1987. Bravo Event Productions is an award winning, full-service event planning and production company specializing in designing and staging world-class coporate, association, government, military and non-profit functions nationwide.
                            </span>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <a href="" class="view-supplier">View</a>
                        </li>
                        <li>
                            <a href="" class="request">Request a Quotation</a>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../images/Suppliers/supplier02.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Fruit & Chocolate sensations</h3>
                            <span>
                                Our Company was the first in years to start Chocolate Fountains when nobody knew what it was? Year later we are skill here today for all types of events. We cater from 25 guests 800 guests we can make it happend.
                            </span>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <a href="" class="view-supplier">View</a>
                        </li>
                        <li>
                            <a href="" class="request">Request a Quotation</a>
                        </li>
                    </ul>
                </div>
                <div class="card">
                    <div class="content">
                        <div class="imgBx">
                            <img src="../images/Suppliers/supplier03.jpg">
                        </div>
                        <div class="contentBx">
                            <h3>Decorento Party Supplies</h3>
                            <span>
                                Decorento Party Supplies is a leading party supplies company in Sri Lanka. We are the pioneers in the party supplies industry in Sri Lanka. We have been in the industry for over 20 years and have been providing our services to the public for over 10 years.
                            </span>
                        </div>
                    </div>
                    <ul class="sci">
                        <li>
                            <a href="" class="view-supplier">View</a>
                        </li>
                        <li>
                            <a href="" class="request">Request a Quotation</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="filter">
                <!-- <div class="search">
                    <div class='input-container'>
                        <input class='input-field-filter' type='text' placeholder='Search payments' name='search'>
                        <i class='fa fa-search icon'></i>
                    </div>
                </div> -->
                <div class="category">
                    <div class="filter-heading">Filter by Category</div>
                    <div class="category-list">
                        <ul>
                            <li><input type="checkbox">All</li>
                            <li><input type="checkbox">Venue</li>
                            <li><input type="checkbox">Entertainment</li>
                            <li><input type="checkbox">Catering</li>
                            <li><input type="checkbox">Photography</li>
                            <li><input type="checkbox">Transport</li>
                            <li><input type="checkbox">Beverages</li>
                            <li><input type="checkbox">Florists</li>
                            <li><input type="checkbox">Decoration</li>
                            <li><input type="checkbox">Lighting</li>
                            <li><input type="checkbox">Audio/Vedio</li>
                        </ul>
                    </div>
                    <div class="sort">
                        <div class="filter-heading">Filter by Date</div>
                        <div class="sort-list">
                            <ul>
                                <li>
                                    <select name="date" id="date-sort">
                                        <option value="oldest">Oldest on Top</option>
                                        <option value="newest">Newest on Top</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>