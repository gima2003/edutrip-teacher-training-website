<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "studentms";

// Create connection
$con = new mysqli($servername, $username, $password, $database);

$name = "";
$email = "";
$address = "";
$contact = "";
$subject = "";
$description = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $subject = $_POST["subject"];
    $description = $_POST["description"];

    do {
        if (empty($name) || empty($email) || empty($address) || empty($contact) || empty($subject) || empty($description)) {
            $errorMessage = "All the fields are required";
            break;
        }

        // Add new client to the database
        $sql = "INSERT INTO client_info (name, email, address, contact, subject, description) " .
               "VALUES ('$name', '$email', '$address', '$contact', '$subject', '$description')";
        $result = $con->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $con->error;
            break;
        }

        $name = "";
        $email = "";
        $address = "";
        $contact = "";
        $subject = "";
        $description = "";

        $successMessage = "Client added successfully";

        header("location: index4.php");
        exit;

    } while (false);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Websitesupport</title>
    <link rel="stylesheet" href="style/style44.css">
</head>
<body>
    <div class="container">
        <h2>Raise a Ticket</h2>

        <!-- Display error message -->
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }
        ?>

        <center>
        <form method="POST">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="contact" value="<?php echo $contact; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Subject</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="subject" value="<?php echo $subject; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-6">
                    <textarea class="form-control" name="description"><?php echo $description; ?></textarea>
                </div>
            </div>

            <!-- Display success message -->
            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>";
            }
            ?>

            <br>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="index4.php" role="button">Cancel</a>
                </div>
            </div>

        </form>
        </center>
    </div>
</body>
</html>
