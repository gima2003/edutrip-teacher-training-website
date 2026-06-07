<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Websitesupport</title>
    <link rel="stylesheet" href="style/style44.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    
<!-- Font Awesome for Social Media Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <!-- Navigation Bar -->
    <header>
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
           <a href="login3.php"> <button class="login">Login</button></a>
           <a href="signup3.php"> <button class="signin">Sign Up</button></a>
           <a href="cart.php"> <button class="CartBtn"> <i class="fas fa-shopping-cart"></i></button></a>
          
        </div>
    </header><br><br>



    <section class="container">
        <h2>How can we help you today</h2>
        <a class="btn btn-primary" href="create4.php" role="button">Raise A Ticket</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "studentms";

                // Create connection
                $con = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($con->connect_error) {
                    die("Connection Failed: " . $con->connect_error);
                }

                // Read all rows from the database table
                $sql = "SELECT * FROM client_info";
                $result = $con->query($sql);

                if (!$result) {
                    die("Invalid query: " . $con->error);
                }

                // Display data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['contact']}</td>
                        <td>{$row['subject']}</td>
                        <td>{$row['description']}</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='edit4.php?id={$row['id']}'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='delete4.php?id={$row['id']}'>Delete</a>
                        </td>
                    </tr>";
                }

                ?>
            </tbody>
        </table>
            </section><br><br>


    <footer>
    <div class="footer-container">
        <!-- Website Pages -->
        <div class="footer-pages">
            <h3>Pages</h3>
            <ul>
             
                <li><a href="aboutus101.html">About Us</a></li>
                <li><a href="/courses">Courses</a></li>
                <li><a href="/cart">Cart</a></li>
                <li><a href="/reviews">Reviews</a></li>
                <li><a href="/blogs">Blogs</a></li>
                <li><a href="/faq">FAQ</a></li>
                <li><a href="/support">Support</a></li>
               
            </ul>
        </div>

        <!-- Social Media -->
        <div class="footer-social">
            <h3>Follow Us</h3>
            <a href="https://twitter.com/YourProfile" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://facebook.com/YourProfile" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://youtube.com/YourChannel" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="https://linkedin.com/in/YourProfile" target="_blank"><i class="fab fa-linkedin-in"></i></a>
        </div>

        <!-- Partnerships -->
        <div class="footer-partnerships">
            <h3>Our Partners</h3>
            <div class="partner-logos">
                <a href="https://partner1.com" target="_blank"><img src="images101/udemy.jpeg" alt="Partner 1"></a>
                <a href="https://partner2.com" target="_blank"><img src="images101/R.png" alt="Partner 2"></a>
                <a href="https://partner3.com" target="_blank"><img src="images101/cisco-512.webp" alt="Partner 3"></a>
            </div>
        </div>

        <!-- Contact Us -->
        <div class="footer-contact">
            <h3>Contact Us</h3>
            <p>Email: <a href="mailto:EduTrip@edu.com">info@edutripacademy.com</a></p>
            <p>Phone: +123 456 7890</p>
            <p>Phone: +987 654 3210</p>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2024 Edutrip Academy. All rights reserved.</p>
    </div>
</footer>


</body>
</html>
