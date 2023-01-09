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
    <link rel="stylesheet" href="../css/eventPlannerMain.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable();
            $('#example tbody').on('click', 'tr', function () {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
        });
    </script>
<style>
th,
td {
    padding: 10px 5px;
    border-radius: .5rem;
    position: relative;
}

tr {
    cursor: pointer;
}

.tCenter {
    text-align: center;
}

    table tr td ul {
    position: absolute;
    display: none;
    width: 75px;
    top: 20px;
    right: 10px;
    margin: 0;
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    border-radius: .5rem;
    z-index: 100;
    list-style-type: none;
}

table tr td ul li a,
table tr td ul li button {
    padding: 5px;
    display: block;
    text-decoration: none;
    border-radius: .5rem;
    color: #555;
    font-size: 12px;
    background-color: #fff;
    border: none;
    width: 100%;
}


table tr td ul li a:hover,
table tr td ul li button:hover {
    background-color: #b6b4b8;
    color: white;
}

table tr td.menu:hover ul,
table tr td.menu:focus ul {
    display: block;
}

</style>
</head>

<body>
 <div class="grid-container-payments">
        <div class="gridSearch">
            <div class="searchSec">
            <div class="page-title"> Feedbacks Given </div>
                <div class="input-container">                   
                </div>            
            </div>
        </div>
        <div class="gridMain">
            <table  id="example" class="display">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Event Planner Name</th>
                        <th>Feedback</th>
                        <th>Rate</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sName = "localhost";
                    $uName = "root";
                    $pass = "";
                    $db_name = "eventra";

                    // Create connection
                    $conn = mysqli_connect($sName, $uName, $pass, $db_name);
                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // include "./db_conn.php";
                    $sql = "SELECT * FROM `Feedback`";
                    $result = $conn->query($sql);

                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                        <tr>
                            <td><?php echo $row['date'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['text'] ?></td>
                            <td><?php $rate= $row['rate'];
                                for($i =0 ; $i < $rate; $i++){
                                    ?>
                                    <i class="fa-solid fa-star"></i>
                                    <?php
                                    
                                }  
                                for($x=$rate; $x<5 ;$x++){
                                    ?>
                                    <i class="fa-regular fa-star"></i>
                                    <?php
                                } 
                            ?></td>
                            <td class="tCenter menu">&#10247
                            <ul>
                                <li>
                                    <a href="#">Edit</a>
                                </li>
                                <li>
                                    <a href="#">Delete</a>
                                </li>
                            </ul>
                        </td>
                        <?php
                    }
                        ?>

                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>