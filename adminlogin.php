<?php

require 'config.php';

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username = $_POST["username"];
    $password = $_POST["password"];


    $sql="select * from admin where username= '".$username."' AND password='".$password."' ";


    $result=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($result);

    if($row["role"]=="admin")
    {
        $_SESSION["username"]=$usernamme;
        header("location:insert1.php");
    }

    else{
        echo"Username or Password incorrect";
    }

}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style/adminlogin.css">
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
                <li><a href="cart.php">Cart</a></li>
                <li><a href="review3.php">Reviews</a></li>
                <li><a href="blogK.html">Blogs</a></li>
                <li><a href="FAQ.html">FAQ</a></li>
                <li><a href="index4.php">Support</a></li>
                
            </ul>
        </nav>
        <div class="header-buttons">
            <a href="login3.php"> <button class="login">Login</button></a>
           <a href="signup3.php"> <button class="signin">Sign Up</button></a>
        </div>
    </header>

<center>
    <h1 class="header_h1">Admin Login</h1>

    <div class="form_login">

    <form  action="#" method="post">
        <div>
            <label><i class="fas fa-user"></i>     Username:</label><br>
            
            <input type="text" name="username" required><br><br>
        </div>

        <div>
            <label> <i class="fas fa-lock"></i>   Password:</label><br>
            <input type="password" name="password" required><br><br>
        </div>


        <div>
            <input type="submit" value="Login" class="login-btn">
        </div>
    </form> 

    </div>


</center>
    </body>
</html>