<?php
session_start();
require("config.php");  // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data from the user input
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rePassword = $_POST["re-password"];
    $userName = $_POST["username"];
    $gender = $_POST["gender"];
    $birthday = $_POST["birthday"];

    // Check if password and re-password match
    if ($password !== $rePassword) {
        echo "<script>alert('Passwords do not match!');</script>";
        exit;
    }

    // Check if the email or username already exists in the database
    $check_sql = "SELECT * FROM userdetails WHERE email = ? OR username = ?";
    $check_stmt = $con->prepare($check_sql);
    $check_stmt->bind_param("ss", $email, $userName);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Email or Username already exists!');</script>";
        exit;
    }

    // Insert the user data into the database
    $sql = "INSERT INTO userdetails (name, email, password, username, gender, birthday) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssssss", $name, $email, $password, $userName, $gender, $birthday);

    if ($stmt->execute()) {
        // Get the inserted user ID
        $userId = $con->insert_id;

        // Set session variables
        $_SESSION['userid'] = $userId;
        $_SESSION['username'] = $userName;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['gender'] = $gender;
        $_SESSION['birthday'] = $birthday;

        echo "<script>
                alert('Signup successful!');
                window.location.href = 'dashboard.php';
              </script>";
    } else {
        echo "<script>alert('Error: Could not register. Try again!');</script>";
    }

    // Close connections
    $stmt->close();
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="style/signupstyle.css">
    <script src="js/scriptchanuka.js"></script>
    <!-- Font Awesome for Social Media Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header>
        <div class="logo">
        <img src="images101/edutrip.png" alt="Website Logo" class="logo">
        </div>
        <nav>
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="aboutus.html">About us</a></li>
                <li><a href="index4.php">Support</a></li>
                <li><a href="blogK.html">Blogs</a></li>
                <li><a href="review3.php">Reviews</a></li>
                <li><a href="FAQ.html">FAQs</a></li>
            </ul>
        </nav>
        <div class="header-buttons">
        <a href="login3.php" class="btn">Log In</a>
            <button class="CartBtn"> <i class="fas fa-shopping-cart"></i></button>
           
        </div>
    </header>
    <div class="container">
        <h2>Sign Up</h2>
        <form method="POST" action="signup3.php">
            <input type="text" name="name" placeholder="Enter Name" required><br>
            <input type="email" name="email" placeholder="Enter Email" required><br>
            <input type="password" name="password" placeholder="Enter Password" required><br>
            <input type="password" name="re-password" placeholder="Re-enter Password" required><br>
            <input type="text" name="username" placeholder="Enter Username" required><br>
            <label>Gender: <br><br>
                <input type="radio" id="male" name="gender" value="Male" required> Male
                <input type="radio" id="female" name="gender" value="Female" required> Female
            </label><br>
            <input type="date" name="birthday" required><br>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
