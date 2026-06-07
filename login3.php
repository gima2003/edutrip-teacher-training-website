<?php
require("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user inputs
    $userName = $_POST["username"];
    $Password = $_POST["password"];

    // SQL to check if the username and password exist
    $sql = "SELECT * FROM userdetails WHERE username = ? AND password = ?";

    // Prepare the statement
    $stmt = $con->prepare($sql);
    
    // Bind the parameters (username, password)
    $stmt->bind_param("ss", $userName, $Password);

    // Execute the query
    $stmt->execute();
    
    // Get the result of the query
    $result = $stmt->get_result();

    // Check if we found a matching user
    if ($result->num_rows > 0) {
        // Fetch user details from the result
        $user = $result->fetch_assoc();

        // Store user information in session
        $_SESSION['userid'] = $user['userid'];  // Store the userid in session
        $_SESSION['username'] = $user['username'];  // Store the username in session

        // Use JavaScript to display an alert and then redirect to the dashboard
        echo "<script>
                alert('Login successful!');
                window.location.href = 'dashboard.php';
              </script>";
        exit(); // Stop further script execution after redirection
    }
    
    
    else {
        // Incorrect login
        echo "<script>
                alert('Incorrect username or password!');
                window.location.href = 'login3.php'; // Redirect to the login page again
              </script>";
    }

    // Close statement and connection
    $stmt->close();
    $con->close();
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Sign Up Page</title>
    <link rel="stylesheet" href="style/loginstyle.css">
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
                <li><a href="#">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Blogs</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#">FAQs</a></li>
            </ul>
        </nav>
        <div class="header-buttons">
        <a href="signup3.php" class="btn">Sign Up</a>
            <button class="CartBtn"> <i class="fas fa-shopping-cart"></i></button>
           
        </div>
    </header>
    <div class="container">
	        <div class="form-container sign-in">
            <form action="" method="post">
                <h1>Log In</h1>
                <span>Use your User Id and password</span>
                <input type="text" name="username" placeholder="Useranme">
                <input type="password" name="password" placeholder="Password">
                <a href="#">Forgot your password?</a>
                <button type="submit">Sign In</button>
                <a href="adminlogin.php">Log as a Admin</a><br>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
			    <div class="toggle-panel toggle-right">
                    <h1>Welcome Back</h1>
                    <p>Use your personal credentials for log in
                    </p><br><br>
                    <p>Don't have an account? <br> <a href="signup3.php" class="create-account-link">Create account here</a></p>
                </div>
            </div>
        </div>
    </div> <!-- Closing the main container div -->
    
    <script src="js/scriptchanuka.js"></script>
</body>
</html>



