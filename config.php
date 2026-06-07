<?php

$con=new mysqli("localhost","root","","studentms");




if($con->connect_error){
    die("connection failed!".$con->connect_error);
}


?>