<?php 
    include('constants.php');
    $role = $_SESSION['role'];
?>
<html>
    <body>
    <script>              
             var role = <?php echo json_encode($role); ?>;
            if(role==='admin'){
                location.replace('admin/dashboard.php');
            }
            else if(role === 'customer'){
                location.replace('landing_page.php');
                }
            </script>
    </body>
</html>