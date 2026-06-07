<?php
    include 'config.php';

    $c_no = $_GET['updateid'];

    $sql = "SELECT * FROM cart WHERE course_id = $c_no";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $current_course_name = $row['course_name'];
        $current_price = $row['price'];
    } else {
        die(mysqli_error($con));
    }

    if (isset($_POST['add_to_cart'])){
        $c_no = $_GET['updateid'];
        $c_name = $_POST["course_name"];
        $c_price = $_POST["course_price"];

        $sql = "UPDATE cart SET course_name = '$c_name', price = '$c_price' WHERE course_id = $c_no";


        $result = mysqli_query($con, $sql);

        if($result) {
            //echo "Data updated successfully";
            header('location:cart.php');
        }
        else {
            die(mysqli_error($con));
        }
    }
    
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
    <section id="courses-home">
        <h2>#Cart</h2>
        <h3>Home | Cart</h3><br>
        <p>"Don't forget to add your favorite courses to the cart and start learning today!"</p>
    </section>
    <br>

<!--update form-->
    <section id="form">
    <div class="cart">
            <form method="post">
                <h3>Add Your Courses</h3>
                <input type="hidden" placeholder="Enter Course Number" class="box" name="course_no"><br>
                
                 <select name="course_name" class="box">
                    <option class="box">Select Course Name</option>
                    <option <?php if ($current_course_name == 'Introduction To Online Teaching') echo 'selected'; ?>>Introduction To Online Teaching</option>
                    <option <?php if ($current_course_name == 'Technology Tools for Teachers') echo 'selected'; ?>>Technology Tools for Teachers</option>
                    <option <?php if ($current_course_name == 'AI and Chatbots in Education') echo 'selected'; ?>>AI and Chatbots in Education</option>
                    <option <?php if ($current_course_name == 'Designing Interactive Lessons') echo 'selected'; ?>>Designing Interactive Lessons</option>
                    <option <?php if ($current_course_name == 'Assessment and Feedback') echo 'selected'; ?>>Assessment and Feedback</option>
                    <option <?php if ($current_course_name == 'Classroom Management Essentials') echo 'selected'; ?>>Classroom Management Essentials</option>
                    <option <?php if ($current_course_name == 'Using Technology in the Classroom') echo 'selected'; ?>>Using Technology in the Classroom</option>
                    <option <?php if ($current_course_name == 'Culturally Responsive Teaching') echo 'selected'; ?>>Culturally Responsive Teaching</option>
                </select><br>

                <select name="course_price" class="box">
                    <option class="box">Select Course Price</option>
                    <option <?php if ($current_price == '62.00') echo 'selected'; ?>>62.00</option>
                    <option <?php if ($current_price == '48.50') echo 'selected'; ?>>48.50</option>
                    <option <?php if ($current_price == '36.00') echo 'selected'; ?>>36.00</option>
                    <option <?php if ($current_price == '42.00') echo 'selected'; ?>>42.00</option>
                    <option <?php if ($current_price == '65.99') echo 'selected'; ?>>65.99</option>
                    <option <?php if ($current_price == '60.00') echo 'selected'; ?>>60.00</option>
                    <option <?php if ($current_price == '48.00') echo 'selected'; ?>>48.00</option>
                    <option <?php if ($current_price == '56.00') echo 'selected'; ?>>56.00</option>
                </select><br>
                <input type="submit" class="btn" name="add_to_cart" value="Update">
            </form>
    </div>
    </section>
     
    <script src='js/courses.js'></script>

   
</body>
</html>