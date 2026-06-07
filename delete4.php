<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "studentms";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    // Check for connection errors
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Prepare and execute the delete query
    $sql = "DELETE FROM client_info WHERE id=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $connection->close();
}

header("location: index4.php");
exit;
