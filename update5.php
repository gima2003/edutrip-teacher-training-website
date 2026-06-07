<?php
require 'config.php';

if (isset($_GET['record'])) {
    $rec_id = htmlspecialchars($_GET['record']);

    $sql = "SELECT * FROM reviews WHERE rec_id = $rec_id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST["name"];
    $userCourse = $_POST["course"];
    $userRating = $_POST["rating"];
    $userComments = $_POST["comments"];
    $userDate = $_POST["date"];
    $rec_id = $_POST["rec_id"];

    $sql = "UPDATE reviews SET Name='$userName', Course='$userCourse', Rating='$userRating', Comments='$userComments', Date='$userDate' WHERE rec_id=$rec_id";

    if ($con->query($sql)) {
        echo "Review updated successfully!";
        header("Location: read.php"); // Redirect back to the list
    } else {
        echo "Error: " . $con->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Review</title>
  <link rel="stylesheet" href="style/styles5.css">
  <script src="js/review3.js"></script>
</head>
<body>
  <h2 style="text-align:center">Update Your Review</h2>
  <div class="reviewSubmission">
    <form id="reviewForm" method="post" action="update5.php">
      <fieldset>
        <input type="hidden" name="rec_id" value="<?php echo $row['rec_id']; ?>" />

        <label for="name">Your Name:</label><br>
        <input type="text" name="name" value="<?php echo $row['Name']; ?>" required><br><br>

        <label for="course">Course:</label><br>
        <select name="course" required>
          <option value="<?php echo $row['Course']; ?>" selected><?php echo $row['Course']; ?></option>
          <option value="it">Information Technology</option>
          <option value="lit">Literature</option>
          <option value="maths">Mathematics</option>
          <option value="psy">Psychology</option>
          <option value="phy">Physics</option>
        </select><br><br>

        <label for="rating">Rating:</label><br>
        <select id="rating" name="rating" required>
          <option value="5" <?php if ($row['Rating'] == 5) echo 'selected'; ?>>⭐⭐⭐⭐⭐</option>
          <option value="4" <?php if ($row['Rating'] == 4) echo 'selected'; ?>>⭐⭐⭐⭐</option>
          <option value="3" <?php if ($row['Rating'] == 3) echo 'selected'; ?>>⭐⭐⭐</option>
          <option value="2" <?php if ($row['Rating'] == 2) echo 'selected'; ?>>⭐⭐</option>
          <option value="1" <?php if ($row['Rating'] == 1) echo 'selected'; ?>>⭐</option>
        </select><br><br>

        <label for="wordLimitTextarea">Additional Comments (max 50 words):</label><br>
        <textarea id="wordLimitTextarea" name="comments" rows="10" cols="50" oninput="countWords()" required><?php echo $row['Comments']; ?></textarea><br><br>

        <label for="date">Review Date:</label><br>
        <input type="date" name="date" value="<?php echo $row['Date']; ?>" required><br><br>

        <input type="submit" class="subbutn" value="Update">
      </fieldset>
    </form>
  </div>
</body>
</html>