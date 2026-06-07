<?php
session_start();
require('config.php');

// Check if session is active and 'userid' exists
if (!isset($_SESSION['userid'])) {
    echo "No user data found. Please register or log in first.";
    exit;
}

// Fetch the current user's data using the session's 'userid'
$userid = $_SESSION['userid'];
$sql = "SELECT * FROM userdetails WHERE userid = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "User data not found in the database.";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get updated data from the form
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];
    $newUsername = $_POST['username'];
    $newGender = $_POST['gender'];
    $newBirthday = $_POST['birthday'];

    // If password fields are filled and match, update the password
    if (!empty($_POST['password']) && $_POST['password'] === $_POST['re-password']) {
        $newPassword = $_POST['password'];
        $sql = "UPDATE userdetails SET name=?, email=?, username=?, gender=?, birthday=?, password=? WHERE userid=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ssssssi", $newName, $newEmail, $newUsername, $newGender, $newBirthday, $newPassword, $userid);
    } else {
        // Update fields without password
        $sql = "UPDATE userdetails SET name=?, email=?, username=?, gender=?, birthday=? WHERE userid=?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssi", $newName, $newEmail, $newUsername, $newGender, $newBirthday, $userid);
    }

    if ($stmt->execute()) {
        // Update session variables
        $_SESSION['name'] = $newName;
        $_SESSION['email'] = $newEmail;
        $_SESSION['username'] = $newUsername;
        $_SESSION['gender'] = $newGender;
        $_SESSION['birthday'] = $newBirthday;

        // Redirect to the dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Details</title>
    <link rel="stylesheet" href="style/signupstyle.css">
</head>
<body>
    <div class="container">
        <h2>Update Your Information</h2>
        <!-- Update Form -->
        <form method="POST" action="">
            <input type="text" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required><br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>
            <input type="password" name="password" placeholder="New Password"><br>
            <input type="password" name="re-password" placeholder="Confirm New Password"><br>
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required><br>
            <label>Gender: <br><br>
                <input type="radio" id="male" name="gender" value="Male" <?php if ($user['gender'] == 'Male') echo 'checked'; ?> required> Male
                <input type="radio" id="female" name="gender" value="Female" <?php if ($user['gender'] == 'Female') echo 'checked'; ?> required> Female
            </label><br>
            <input type="date" name="birthday" value="<?php echo htmlspecialchars($user['birthday']); ?>" required><br>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
