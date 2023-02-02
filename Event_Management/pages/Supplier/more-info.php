<?php
    include('../constants.php');
    include( 'supplier_sidenav.php' );
    include( 'header.php' );
    $id = $_GET['id'];
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
    <link rel="stylesheet" href="../../css/more-info.css">
</head>

<body>
    <?php
        $sql = "SELECT *
                FROM supplier_venue V , images I
                where V.item_ID = I.item_ID
                AND V.item_ID = $id";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { ?> 

    <div class="container-profile">
        <div class="flex-container-profile">
            <div class="about">
                <div class="image">
                    <img class="mySlides" src="../images/<?php echo $row["file_name"];?>" alt="">
                    <img class="mySlides" src="../images/facebook.png" alt="">
                    <img class="mySlides" src="../images/instagram.png" alt="">
                    <button class="display-left" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="display-right" onclick="plusDivs(1)">&#10095;</button>
                </div>
                <div class="product-title">
                    <div class="product-name">
                        <?php echo $row["title"];?>
                    </div>    
                    <div class="product-cat">
                        <?php echo $row["title"];?>
                    </div> 
                </div>
                <div class="product-descript">
                    <div class="sm-all-p">
                        <div class="sm-name">
                            <?php echo $row["descript"];?>
                        </div>
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
                            <div class="prof-data"><?php echo $row["venloc"];?></div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Venue Location</div>
                            <div class="prof-data"><?php echo $row["venlocation"];?></div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Venue Type</div>
                            <div class="prof-data"><?php echo $row["ventype"];?></div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Maximum Capacity</div>
                            <div class="prof-data"><?php echo $row["maxCap"];?></div>
                        </div>
                        <div class="prof-all-p">
                            <div class="prof-name-p">Minimum Capacity</div>
                            <div class="prof-data"><?php echo $row["minCap"];?></div>
                        </div>
                       

                         <div class="prof-all-e">
                                <a href="form-venue_edit.php?id=<?php echo $id;?>" id="ed">
                                    Edit
                                </a>
                                <button type="button" class="custom-button-e" id="del">Delete</button>
                            </div>
                        </div>
                         <?php ;}
                        }?>
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
<?php
 }else{
    header("Location:sign_in.php?");
    exit();
 }
?>