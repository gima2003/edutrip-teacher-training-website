<?php
include 'config.php';

if (isset($_GET['deleteid'])) {
    $c_no = $_GET['deleteid'];
    
    $sql = "DELETE FROM cart WHERE course_id = $c_no";
    
    $result = mysqli_query($con, $sql);

    if ($result) {
        //echo "Deleted successfully";
        header('location:cart.php');
    } else {
        die(mysqli_error($con));
    }
}
?>
