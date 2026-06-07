<?php

 require 'config.php';
 
 $userName=$_POST["name"];
 $userCourse=$_POST["course"];
 $userRating=$_POST["rating"];
 $userComments=$_POST["comments"];
 $userDate=$_POST["date"];
 
 
 $sql="INSERT INTO reviews (Name, Course, Rating, Comments, Date)  VALUES('$userName','$userCourse','$userRating','$userComments','$userDate')";
 
 if($con->query($sql))
   {
	  //Redirect to read.php after succesful insertion
	  header("Location: read.php");
	  exit();//Make sure the script stops after redirection
      
   }
    
	else
	{
		echo "Error".$con->error;
	}
	
	$con->close();

//select max rec_id from reviews
?>