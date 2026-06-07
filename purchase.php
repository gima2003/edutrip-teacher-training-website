<?php
    include 'config.php';
    
    $cus_name = $_POST["fname"];
    $cus_email = $_POST["email"];
    $cus_mobile = $_POST["mobile"];
    $cus_pay = $_POST["pay"];
    $cus_id = $_POST["customerID"];

    $sql = "INSERT INTO checkout VALUES ('$cus_name', '$cus_email', '$cus_mobile', '$cus_pay', '$cus_id')";

    if($con->query($sql)){
        //echo "Insert successful";
        header("Location: cart.php");
    }
    else {
        echo "Error".$con->error;
    }

    $con->close();
?>