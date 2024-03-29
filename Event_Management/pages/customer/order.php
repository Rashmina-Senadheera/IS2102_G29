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
    <link rel="stylesheet" href="../../css/eventPlannerMain.css">
    <link rel="stylesheet" href="../../css/Custcss3.css">
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
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventra";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<body>
<div class="grid-container-payments">
    <div class="gridSearch">
        <div class="searchSec">
            <div class="page-title"> Order Requests</div>
            <div class="input-container">
                <input class="input-field" type="text" id="myInput" onkeyup="searchFilter()" placeholder="Search by names" name="search">
                <i class="fa fa-search icon"></i>
            </div>
            <button type="submit" class="srcButton">Search</button>
        </div>
    </div>
    <div class="gridMain">
        <table id="example" class="display">
            <thead>
            <tr>
                <th>Reqest Date</th>
                <th>Event Planner Name</th>
                <th>Event Planner Email</th>
                <th>Event Type</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $sql = "select * 
                    from cust_req_general 
                    JOIN request_ep_quotation 
                    ON cust_req_general.request_id = request_ep_quotation.request_id 
                    JOIN user 
                    ON request_ep_quotation.EP_id = user.user_id";
            $result = $conn->query($sql);


            // output data of each row
            while ($row = $result->fetch_assoc()) {

                ?>

                <tr data-href="order-view.php?id=<?php echo $row['request_id'] ?>">
                    <td><?php echo $row['req_date'] ?></td>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['event_type'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['request_id']  ?></td>

                    <script>
                    function myFunction() {
                    location.replace("order-view.php?id=<?php echo $row['request_id'] ?>")
                    }
                    </script>

                    <td class="tCenter menu">
                        <ul>                           
                        </ul>
                    </td>
                </tr>

                <?php
            }

            $conn->close();
            ?>
            </tbody>
        </table>
    </div>
</div>
<script>
function searchFilter() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("example");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}



        document.addEventListener("DOMContentLoaded", () => {
            const rows = document.querySelectorAll("tr[data-href]");
            rows.forEach( row => {
                row.addEventListener("click", ()=>{
                    window.location.href = row.dataset.href;
                });
            });
        });
    
</script>

</body>

</html>
