<?php
session_start();
require('config.php');

// Check if session variables are set
if (!isset($_SESSION['username'])) {
    echo "No user data found. Please register first.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Delete user from database
    $sql = "DELETE FROM userdetails WHERE username=?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $_SESSION['username']);

    if ($stmt->execute()) {
        // Destroy the session and redirect to registration page
        session_destroy();
        header('Location: signup3.php');// input here homepage php
        exit();
    } else {
        echo "Error deleting account.";
    }
}

