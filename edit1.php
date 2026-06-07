<?php

require 'config.php';

$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMsg = "";
$successMsg = "";

// Check if request method is GET (initial page load)
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Ensure 'sid' is provided in the URL
    if (!isset($_GET["sid"])) {
        header("Location: insert1.php");
        exit;
    }

    $id = $_GET["sid"];

    // Fetch the student data from the database based on ID
    $sql = "SELECT * FROM smanagment WHERE sid = $id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $name = $row["sname"];
        $email = $row["semail"];
        $phone = $row["phone"];
        $address = $row["address"];
    } else {
        // Redirect back if student ID is invalid
        header("Location: insert1.php");
        exit;
    }
} else {
    // POST request: Update the student data in the database
    $id = $_POST["sid"];
    $name = $_POST["sname"];
    $email = $_POST["semail"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
        if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMsg = "All fields are required";
            break;
        }

        // Update the student data in the database
        $sql = "UPDATE smanagment 
                SET sname = '$name', semail = '$email', phone = '$phone', address = '$address' 
                WHERE sid = $id";

        $result = $con->query($sql);

        if (!$result) {
            $errorMsg = "Invalid query: " . $con->error;
            break;
        }

        $successMsg = "Student updated successfully.";

        // Redirect to the admin dashboard after successful update
        header("Location: insert1.php");
        exit;
    } while (false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Instructor</title>
    <link rel="stylesheet" href="style/edit1.css">
</head>
<body>
    <div class="edit_student">
        <h2>Edit Instructor</h2>

        <?php
        if (!empty($errorMsg)) {
            echo "<div class='alert' role='alert'>
                    <strong>$errorMsg</strong>
                  </div>";
        }
        ?>

        <form method="post">
            <!-- Hidden field for Student ID -->
            <input type="hidden" name="sid" value="<?php echo $id; ?>">

            <div class="row">
                <label class="name_row">Instructor Name:</label>
                <div>
                    <input type="text" class="form-control" name="sname" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row">
                <label class="name_row">Instructor Email:</label>
                <div>
                    <input type="email" class="form-control" name="semail" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="row">
                <label class="name_row">Instructor Phone:</label>
                <div>
                    <input type="tel" class="form-control" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>

            <div class="row">
                <label class="name_row">Instructor Address:</label>
                <div>
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>

            <div class="row">
                <button type="submit" class="submit-btn">Update</button>
                <a class="cancel_btn" href="insert1.php" role="button">Cancel</a>
            </div>
        </form>

        <?php
        if (!empty($successMsg)) {
            echo "<div class='success_alert' role='alert'>
                    <strong>$successMsg</strong>
                  </div>";
        }
        ?>
    </div>
</body>
</html>
