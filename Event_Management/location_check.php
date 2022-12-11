<?php
include('constants.php');
$role = $_SESSION['role'];
?>
<html>

<body>
    <script>
        var role = <?php echo json_encode($role); ?>;
        if (role === 'admin') {
            location.replace('admin/dashboard.php');
        } else if (role === 'customer') {
            location.replace('landing_page.php');
        } else if (role === 'event_planner') {
            location.replace('Event_Planner/Suppliers.php');
        }
    </script>
</body>

</html>