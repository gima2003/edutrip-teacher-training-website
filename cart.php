<?php
    include 'config.php';
    
    if (isset($_POST['add_to_cart'])){
        $c_no = $_POST["course_id"];
        $c_name = $_POST["course_name"];
        $c_price = $_POST["course_price"];

        $sql = "INSERT INTO cart VALUES ('$c_no', '$c_name', '$c_price')";

        $result = mysqli_query($con, $sql);

        if($result) {
            //echo "Data inserted successfully";
            header('location:cart.php');
        }
        else {
            die(mysqli_error($con));
        }
    }

    $total_price = 0;
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Edutrip Academy</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel='stylesheet' href='style/courses.css'>

    

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
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
        <a href="login3.php"> <button class="login">Login</button></a>
        <a href="signup3.php"> <button class="signin">Sign Up</button></a>
            <a href="cart.php"><button class="CartBtn"> <i class="fas fa-shopping-cart"></i></button></a>
            
        </div>
    </header>



    <section id="courses-home">
        <h2>#Cart</h2>
        <h3>Home | Cart</h3><br>
        <p>"Don't forget to add your favorite courses to the cart and start learning today!"</p>
    </section>
    <br>
    

<!--add to cart form-->
    <section id="form">
    <div class="cart">
            <form method="post" id="addCourses">
                <h3>Add Your Courses</h3>
                <input type="hidden" placeholder="Enter Course Number" class="box" name="course_no"><br>
                <select name="course_name" class="box">
                    <option class="box" value="">Select Course Name</option>
                    <option>Introduction To Online Teaching</option>
                    <option>Technology Tools for Teachers</option>
                    <option>AI and Chatbots in Education</option>
                    <option>Designing Interactive Lessons</option>
                    <option>Assessment and Feedback</option>
                    <option>Classroom Management Essentials</option>
                    <option>Using Technology in the Classroom</option>
                    <option>Culturally Responsive Teaching</option>
                </select><br>
                <select name="course_price" class="box">
                    <option class="box" value="">Select Course Price</option>
                    <option>62.00</option>
                    <option>48.50</option>
                    <option>36.00</option>
                    <option>42.00</option>
                    <option>65.99</option>
                    <option>60.00</option>
                    <option>48.00</option>
                    <option>56.00</option>
                </select><br>
        
                <button type="submit" class="btn" name="add_to_cart">Add To Cart</button>
                
            </form>
            
    </div>
    
    </section>

<!--add to cart table-->
    <section class="cart_table">
        <table>
            <thead id="row1">
                <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Price(USD)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT course_id, course_name, price FROM cart";
                    $result = $con->query($sql);

                    if($result->num_rows > 0){   
                    while($row = $result->fetch_assoc()){
                        $total_price += (float)$row["price"];

                        echo "<tr id='row1'>";
                        echo "<td>"."<b>".$row["course_id"]."</b>"."</td>"."<td>".$row["course_name"]."</td>"."<td>".$row["price"]."</td>";
                        echo "<td>
                        <button class='btn1'><a href='update2.php?updateid=".$row["course_id"]."'><i class='fa-solid fa-pen-to-square'></i></a></button>
                        <button class='btn2'><a href='delete2.php?deleteid=".$row["course_id"]."'><i class='fa-solid fa-trash'></i></a></button>
                        </td>";
                        echo "</tr>";
                    }
                        
                    }
                    else {
                        echo "<tr style='background-color: #F9F9FF;'><td colspan='4'>No items in the cart</td></tr>";
                    }

                    $con->close();
                
                ?>
                

            </tbody>
        </table><br>

        <!-- Display the total price -->
        <div class="total">
            <h3 class="tprice">Total Price: <?php echo $total_price; ?> USD</h3>
            <form action="checkout.php" method="post">
                <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
                <button type="submit" class="checkout"><b>Proceed To Checkout</b></button>
            </form>

            
        </div>
    </section>


    <!--Footer section-->
    <footer>
        <div class="footer-container">
            <!-- Website Pages -->
            <div class="footer-pages">
                <h3>Pages</h3>
                <ul>
                 
                    <li><a href="homepage.html">About Us</a></li>
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
                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
    
            <!-- Partnerships -->
            <div class="footer-partnerships">
                <h3>Our Partners</h3>
                <div class="partner-logos">
                    <a href="https://www.udemy.com/topic/teacher-training/" target="_blank"><img src="images101/udemy.jpeg" alt="Partner 1"></a>
                    <a href="#" target="_blank"><img src="images101/R.png" alt="Partner 2"></a>
                    <a href="#" target="_blank"><img src="images101/cisco-512.webp" alt="Partner 3"></a>
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




   
<script src='js/courses.js'></script>
   
</body>
</html>