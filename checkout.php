<?php
    include 'config.php';

    if (isset($_POST['total_price'])) {
        $total_price = $_POST['total_price'];
    }
    else {
        $total_price = 0; 
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
    <script src='js/courses.js'></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>
<body id="checkout_bg">
    <br><br>
    <!-- Checkout form -->
    <section id="form2">
    
        <form method="post" class="Checkout_form" action="purchase.php">
            <h3 class="order">Review Your Order</h3>
            <p>Total Price: <strong><?php echo $total_price; ?> USD</strong></p>

        <div>
            <input type="hidden" class="box1" name="customerID">
        </div>
        <div>
            <label>Full Name: </label><br>
            <input type="text" placeholder="Enter your name" class="box1" name="fname" id="username" required>
        </div>
        <div>
            <label>Email: </label><br>
            <input type="email" placeholder="Enter your email" class="box1" name="email" id="email" required>
        </div>
        <div>
            <label>Contact Number: </label><br>
            <input type="text" placeholder="Enter your contact number" class="box1" name="mobile" id="contact">
        </div>
        <div>
            <label>Payment Method: </label><br><br>
                <div class="payment_options">
                    <input type="radio" required name="pay" value="visa">
                    <label for="visa"><i class="fa-brands fa-cc-visa"></i></label><br>
    
                    <input type="radio" required name="pay" value="master">
                    <label for="master"><i class="fa-brands fa-cc-mastercard"></i></i></label><br>

                    <input type="radio" required name="pay" value="paypal">
                    <label for="paypal"><i class="fa-brands fa-cc-paypal"></i></label><br>

                    <input type="radio" required name="pay" value="googlepay">
                    <label for="googlepay"><i class="fa-brands fa-google-pay"></i></label><br>

                    
                </div>
                <br>
                <input type="checkbox" id="agreeTerms" name="agreeTerms">
                <label for="agreeTerms">I agree to the <a href="#">terms and conditions</a></label>
                <button type="submit" class="btn" id="sbtn"><b>Complete Purchase</b></button>
        </div>
        </form>
    </section>

    
</body>
</html>
