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

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: Show the data of the client
    if (!isset($_GET["id"])) {
        header("location: index4.php");
        exit;
    }

    $id = $_GET["id"];
    // Read the row of the selected client from the database table
    $sql = "SELECT * FROM client_info WHERE id=$id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: index4.php");
        exit;
    }

    $name = $row["name"];
    $email = $row["email"];
    $address = $row["address"];
    $contact = $row["contact"];
    $subject = $row["subject"];
    $description = $row["description"];
} else {
    // POST method: Update the data of the client
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $subject = $_POST["subject"];
    $description = $_POST["description"];

    do {
        if (empty($id) || empty($name) || empty($email) || empty($address) || empty($contact) || empty($subject) || empty($description)) {
            $errorMessage = "All fields are required.";
            break;
        }

        // Update the record
        $sql = "UPDATE client_info " .
            "SET name = '$name', email = '$email', address = '$address', contact = '$contact', subject = '$subject', description = '$description' " .
            "WHERE id = $id";

        $result = $con->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $con->error;
            break;
        }

        $successMessage = "Client updated successfully.";

        header("location: index4.php");
        exit;
    } while (true);
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
        <h2>Edit Client Information</h2>

        <!-- Display error message -->
        <?php if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        } ?>

        <center>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

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
            <?php if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>";
            } ?>

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
