<?php
require 'config.php';

if (isset($_GET['record'])) {
    $rec_id = $_GET['record'];
    
    // Delete the record from the database
    $sql = "DELETE FROM reviews WHERE rec_id = $rec_id";
    
    if ($con->query($sql)) {
        // After deletion, redirect to read.php
        header("Location: read.php");
        exit();
    } else {
        echo "Error deleting record: " . $con->error;
    }
} else {
    echo "Invalid request.";
}

$con->close();
?>