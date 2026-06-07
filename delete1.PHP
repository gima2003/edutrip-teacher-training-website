<?php

if(isset($_GET["sid"])){
    $id =$_GET["sid"];

    require 'config.php';


    $sql = "DELETE FROM smanagment WHERE sid= $id";
    $con->query($sql);

}



 header("location: insert1.php");
exit;

?>