<?php 
include('constants.php');
if(isset($_SESSION['user'])){
    include('reg_header.php');
}
else{
    include('unreg_header.php');
}

?>

<body>
    <main  class="event_planner_main font-poppins">
    <div class="event_planners">
            <span class="lbl_evt_planners">
            </span>
            <span class="evt_planner_cards">
                
                
            </span>
        </div>

    </main>
    <script src="javascript/all_event_planners.js"></script>
</body>
<?php 
    include("footer.php");
?>
</html>