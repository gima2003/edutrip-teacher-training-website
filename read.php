<?php
require 'config.php';

$sql = "SELECT Name, Course, Rating, Comments, Date, rec_id FROM reviews";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews Table</title>
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" href="style/table.css">
</head>
<body>

<?php
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Course</th><th>Rating</th><th>Comments</th><th>Date</th><th>Update</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Name"] . "</td>";
        echo "<td>" . $row["Course"] . "</td>";
        echo "<td>" . $row["Rating"] . "</td>";
        echo "<td>" . $row["Comments"] . "</td>";
        echo "<td>" . $row["Date"] . "</td>";
        echo "<td><a href='update5.php?record=" . $row["rec_id"] . "'><button>Update</button></a>";
		echo "<a href='delete5.php?record=".$row['rec_id']."'><button>Delete</button></a>";
        echo"</td>";
		echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No reviews found.";
}

$con->close();
?>

<!-- Button to redirect to review3.php -->
<br>
<div style="text-align: center;">
    <a href="review3.php"><button>Submit a New Review</button></a>
</div>

</body>
</html>