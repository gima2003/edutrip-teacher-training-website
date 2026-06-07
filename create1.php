<?php

require 'config.php';

$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMsg = "";
$successMsg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $id = $_POST["sid"];
    $name = $_POST["sname"];
    $email = $_POST["semail"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
        // Validate required fields
        if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMsg = "All fields are required";
            break;
        }

        // Insert new student into the database
        $sql = "INSERT INTO smanagment (sid, sname, semail, phone, address) 
                VALUES ('$id', '$name', '$email', '$phone', '$address')";

        $result = $con->query($sql);

        // Check for query success
        if (!$result) {
            $errorMsg = "Error inserting data: " . $con->error;
            break;
        }

        // Reset form values after successful insertion
        $id = "";
        $name = "";
        $email = "";
        $phone = "";
        $address = "";

        $successMsg = "Student added successfully!";
        
        // Redirect back to the admin dashboard (not insert.php)
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
    <title>Create New Instructor</title>
    <link rel="stylesheet" href="style/create1.css">
</head>
<body>
    <div class="new_student">
        <h2>New Instructor</h2>

        <?php
        if (!empty($errorMsg)) {
            echo "<div class='alert' role='alert'>
                    <strong>$errorMsg</strong>
                  </div>";
        }
        ?>

        <form method="post">
            <div class="row">
                <label class="name_row">Instructor ID:</label>
                <div>
                    <input type="text" class="form-control" name="sid" value="<?php echo $id; ?>">
                </div>
            </div>

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
                <button type="submit"  class="submit-btn" >Submit</button>
                <a class="cancel_btn" href="insert13.php" role="button">Cancel</a>
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
