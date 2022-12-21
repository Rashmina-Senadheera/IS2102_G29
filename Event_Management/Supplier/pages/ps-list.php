<?php
    include('../constants.php');
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
    if(isset($_SESSION['user_name'])){
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset = 'UTF-8'>
        <meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
        <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <link rel = 'stylesheet' href = '../css/eventPlannerMain.css'>
        <link rel = 'stylesheet' href = '../css/ps-list.css'>
    </head>
        
    <body>
        <div class = 'container-main'>
            <div class = 'flex-container-main'>
                <div class="title-search">
                    <div class = 'searchSec'>
                        <div class = 'page-title'> My Products & Services </div>
                        <div class="search" id='add'>
                            <button type = 'submit' class = 'srcButton' id='add'><i class='bx bx-plus-circle'></i>
                            <a href="addps.php" id="btn">
                                <div class="btn-title">Add Product & Services</div></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <div class="ps-list">
            <div class ='grid-main' id='ps-list'>
                <div class="cards">
          <?php
              $sql = "SELECT V.item_ID,V.title,V.descript,I.file_name
                      FROM supplier_venue V , images I
                      where V.item_ID = I.item_ID";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {?>
                    <a href='more-info.php?id=<?php echo $row["item_ID"];?>' id='a-card'>
                            <div class='ps-card'>
                                <div class='ps-card-img'>
                                    <img src= "../images/<?php echo $row["file_name"];?>" alt="">
                                </div>
                                <div class='ps-card-desc'>
                                    <div class='ps-title'><?php echo $row["title"];?></div>
                                    <div class='ps-type'><?php echo $row["descript"];?></div>
                                </div>
                            </div></a> <?php ;}
                    }
                    ?> 
                </div>
            </div>
            <div class="filter">
                <div class="search">
                    <div class = 'input-container'>
                        <input class = 'input-field-filter' type = 'text' placeholder = 'Search payments' name = 'search'>
                        <i class = 'fa fa-search icon'></i>
                    </div>
                </div>
                <div class="status">
                    <div class="filter-heading">Filter by Status</div>
                    <div class="status-list">
                        <ul>
                            <li><a href="#">
                                <div class="status-list-icon" id="in"><i class='bx bx-play-circle'></i></div>
                                <div class="li-heading" id="in">Active</div>
                            </a></li>
                            <li><a href="#">
                                <div class="status-list-icon" id="out"><i class='bx bx-pause-circle'></i></i></div>
                                <div class="li-heading" id="out">Suspended</div>
                            </a></li>
                        </ul>
                    </div>
                </div>
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
    </body>

</html>

<?php
 }else{
    header("Location:sign_in.php?");
    exit();
 }
?>
