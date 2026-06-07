<?php
session_start();
require('config.php');

// Check if user is signed up or logged in
if (!isset($_SESSION['userid'])) {
    // If user is not logged in or signed up, guide them to the appropriate action
    echo "<script>alert('No user data found. Please register or log in first.');</script>";
    
    // Redirect to login page if they need to log in
    header("Location: login3.php");
    exit;
}

// Fetch the current user data from the database
$userid = $_SESSION['userid'];
$sql = "SELECT * FROM userdetails WHERE userid = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo "User not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" type="text/css" href="style/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for Social Media Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>


<!-- Navigation Bar -->
<header >
        <div class="logo"> 
            <img src="images101/edutrip.png" alt="Website Logo" class="logo">
        </div>
        <nav>
            <ul>
                <li><a href="homepage.html">Home</a></li>
                <li><a href="courses.html">Courses</a></li>
                <li><a href="aboutus.html">About us</a></li>
                <li><a href="index4.php">Support</a></li>
                <li><a href="blogK.html">Blogs</a></li>
                <li><a href="review3.php">Reviews</a></li>
                <li><a href="FAQ.html">FAQs</a></li>
                
            </ul>
        </nav>
        <div class="header-buttons">
           
           <a href="signup3.php"> <button class="signin">Sign Up</button></a>
           <a href="cart.php"> <button class="CartBtn"> <i class="fas fa-shopping-cart"></i></button></a>
          
        </div>
    </header><br><br><br>



    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?> </h2>
        <div class="details">
            <li>Name: <?php echo htmlspecialchars($user['name']); ?></li><br>
            <li>Email: <?php echo htmlspecialchars($user['email']); ?></li><br>
            <li>Username: <?php echo htmlspecialchars($user['username']); ?></li><br>
            <li>Gender: <?php echo htmlspecialchars($user['gender']); ?></li><br>
            <li>Date of Birth: <?php echo htmlspecialchars($user['birthday']); ?></li><br>
        </div>

        <!-- Update and Delete Buttons -->
        <div class="buttons">
            <div class="update">
                <form method="GET" action="update3.php">
                    <button type="submit">Update Account</button>
                </form>
            </div>
            <div class="delete">
                <form method="POST" action="delete3.php" onsubmit="return confirm('Are you sure you want to delete your account?');">
                    <button type="submit">Delete Account</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
