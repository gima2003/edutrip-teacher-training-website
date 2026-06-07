<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Review Page</title>
  <link rel="stylesheet" href="style/styles5.css">
  <link rel="stylesheet" href="style/header.css">
 
 
  
 
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
                <li><a href="#">Reviews</a></li>
                <li><a href="FAQ.html">FAQs</a></li>
                
            </ul>
        </nav>
        <div class="header-buttons">
           <a href="login3.php"> <button class="login">Login</button></a>
           <a href="signup3.php"> <button class="signin">Sign Up</button></a>
           <a href="cart.php"> <button class="CartBtn"> <i class="fas fa-shopping-cart"></i></button></a>
          
        </div>
    </header>
  <h2 style="text-align:center">Tell Us What You Think About Us</h2>
  <div class="reviewSubmission">
    <form id="reviewForm" method="post" action="insert5.php">
      <fieldset>
        <label for="name">Your Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label for="course">Course:</label><br>
        <select name="course" id="course" required>
          <option value="">Select Course</option>
          <option value="it">Information Technology</option>
          <option value="lit">Literature</option>
          <option value="maths">Mathematics</option>
          <option value="psy">Psychology</option>
          <option value="phy">Physics</option>
        </select><br><br>

        <label for="rating">Rating:</label><br>
        <select id="rating" name="rating" required>
          <option value=""></option>
          <option value="5">⭐⭐⭐⭐⭐</option>
          <option value="4">⭐⭐⭐⭐</option>
          <option value="3">⭐⭐⭐</option>
          <option value="2">⭐⭐</option>
          <option value="1">⭐</option>
        </select><br><br>

        <label for="wordLimitTextarea">Additional Comments (max 50 words):</label><br>
        <textarea id="wordLimitTextarea" name="comments" rows="10" cols="50" oninput="countWords()" required></textarea><br><br>

        <label for="date">Review Date:</label><br>
        <input type="date" name="date" required><br><br>

        <input type="submit" class="subbutn" value="Submit">
      </fieldset>
    </form>
  </div>
	<br>
	
	<!--background image section-->
	<section class="big-review">
	   <div class="image-text">
	      <strong>"Most Popular Educational Website"</strong>
		  <p>-EduAwards 2024</p>
	   </div>
	</section>
	<br>
	
	<h2 style="text-align:center">See What Others Think About Us</h2>
	<br>
	
	
	<section class="image-container">
      <div class="floating-text">
        <strong>"EduTrip Academy is the reason why I became a good tutor."</strong>
        <p>- Amanda,USA</p>
      </div>
    </section>                                                              
	
	<div class="card-slider">
  <div class="review-cards">
    <div class="grid">
      <div class="card1">
        <div class="card-top">
          <div class="profile">
            <div class="profile-img">
              <img src="mj.jpg">
            </div>
          </div>
        </div>
        <div class="name-user">
          <strong>Michael Jackson</strong>
          <span>@m_jackson</span>
        </div>
        <div class="reviews">
          <p>⭐⭐⭐⭐⭐</p>
        </div>
        <div class="comments">
          <p>Took their Literature course and it was really awesome.The teaching methods they use here are now used by me on my students.</p>
        </div>
      </div>

      <div class="card1">
        <div class="card-top">
          <div class="profile">
            <div class="profile-img">
              <img src="akd.jpg">
            </div>
          </div>
        </div>
        <div class="name-user">
          <strong>Anura Kumara Dissanayake</strong>
          <span>@anura_8889</span>
        </div>
        <div class="reviews">
          <p>⭐⭐⭐⭐⭐</p>
        </div>
        <div class="comments">
          <p>Never thought of becoming a tutor,but EduTrip Academy changed that.I love teaching young kids and I have never thought of quitting.</p>
        </div>
      </div>

      <div class="card1">
        <div class="card-top">
          <div class="profile">
            <div class="profile-img">
              <img src="js.jpg">
            </div>
          </div>
        </div>
        <div class="name-user">
          <strong>Jack Sparrow</strong>
          <span>@black_pearl</span>
        </div>
        <div class="reviews">
          <p>⭐⭐⭐⭐⭐</p>
        </div>
        <div class="comments">
          <p>The tutors are very creative.They have their own way of teaching you "How to Teach".After the online lectures,the one-on-one chat option is really useful if you need further clarification.</p>
        </div>
      </div>

	  <!--Initially Hidden Cards-->

      <div class="card1 hidden">
        <div class="card-top">
          <div class="profile">
            <div class="profile-img">
              <img src="../images/sp.jpg">
            </div>
          </div>
        </div>
        <div class="name-user">
          <strong>Sajith Premadasa</strong>
          <span>@prem_puthano</span>
        </div>
        <div class="reviews">
          <p>⭐⭐⭐⭐⭐</p>
        </div>
        <div class="comments">
          <p>EduTrip Academy's flexible study plans made it possible for me to pursue my teaching career whilst doing a part-time job.</p>
        </div>
      </div>

      <div class="card1 hidden">
        <div class="card-top">
          <div class="profile">
            <div class="profile-img">
              <img src="../images/rw.jpg">
            </div>
          </div>
        </div>
        <div class="name-user">
          <strong>Ranil Wickramasinghe</strong>
          <span>@ranil_wick</span>
        </div>
        <div class="reviews">
          <p>⭐⭐⭐⭐</p>
        </div>
        <div class="comments">
          <p>Tutoring has never been more easier.Thank you EduTrip Academy.</p>
        </div>
      </div>

      <div class="card1 hidden">
        <div class="card-top">
          <div class="profile">
            <div class="profile-img">
              <img src="../images/rb.jpg">
            </div>
          </div>
        </div>
        <div class="name-user">
          <strong>Ramani Bartholomeusz</strong>
          <span>@queen_ramani</span>
        </div>
        <div class="reviews">
          <p>⭐⭐⭐</p>
        </div>
        <div class="comments">
          <p>Really loved the staff here and the flexible payment plan really helped me a lot.</p>
        </div>
      </div>
    </div>
	<div class="button-container">
	<button id="see-more-btn"> See More</button>
	</div>
  </div>
</div>



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
    <script src="review3.js"></script>
<script>
	document.getElementById("see-more-btn").addEventListener("click", function() {
    // Get all the hidden cards
    const hiddenCards = document.querySelectorAll(".hidden");
    
    // Loop through each hidden card and make them visible
    hiddenCards.forEach(function(card) {
      card.classList.remove("hidden");
    });
  
    // Optionally, hide the "See More" button after clicking
    this.style.display = 'none'; 
  });
	</script>
  </body>

</html>