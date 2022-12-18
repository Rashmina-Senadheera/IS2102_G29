<?php
include('constants.php');
session_start();
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
} else { ?>
    <script>
        location.replace('index.php');
    </script>
<?php
}
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
            location.replace('Event_Planner/Requests.php');
        }
    </script>
</body>

</html>