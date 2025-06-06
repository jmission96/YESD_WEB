<?php
include_once("../connection/landingpage_connection.php");
$con = connection();

if (isset($_POST['submit'])) {
  // Sanitize inputs
  $act_name = $con->real_escape_string($_POST['act_name']);
  $location = $con->real_escape_string($_POST['location']);
  $date = $con->real_escape_string($_POST['date']);
  $description = $con->real_escape_string($_POST['description']);
  $facebook = $con->real_escape_string($_POST['facebook']);

  // File upload handling
  $target_dir = "../images/activities/";
  $act_image = basename($_FILES["act_image"]["name"]);
  $target_file = $target_dir . $act_image;

  // Check file upload success
  if ($_FILES["act_image"]["error"] !== UPLOAD_ERR_OK) {
    die("Upload error: " . $_FILES["act_image"]["error"]);
  }

  // Check if folder is writable
  if (!is_dir($target_dir) || !is_writable($target_dir)) {
    die("Error: Upload folder missing or not writable.");
  }

  // Upload and insert
  if (move_uploaded_file($_FILES["act_image"]["tmp_name"], $target_file)) {
    $query = "INSERT INTO activities (act_name, location, date, description, act_image, facebook) 
              VALUES ('$act_name', '$location', '$date', '$description', '$act_image', '$facebook')";
    if ($con->query($query)) {
      header("Location: activities.php");
      exit();
    } else {
      die("DB error: " . $con->error);
    }
  } else {
    die("Failed to move uploaded file.");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Activity</title>
  <link rel="stylesheet" href="../css/form.css">
  <link rel="stylesheet" href="../css/landingpage.css">
</head>

<body>
  <?php include_once("header.php"); ?>
  <div class="form_container">
    <h1>Add New Activity</h1>
    <form method="POST" action="add_activity.php" enctype="multipart/form-data">
      <label for="act_name">Activity Name</label>
      <input type="text" name="act_name" placeholder="Name of Activity" required>
      <label for="location">Location</label>
      <input type="text" name="location" placeholder="Location" required>
      <label for="date">Date</label>
      <input type="date" name="date" required>
      <label for="description">Description</label>
      <textarea name="description" placeholder="Write your description here..." required></textarea>
      <label for="act_image">Activity Image</label>
      <input type="file" name="act_image" accept="image/*" required>
      <label for="facebook">Facebook Link</label>
      <input type="url" name="facebook" placeholder="Link to facebook post..." required>
      <button type="submit" name="submit">Add Activity</button>
    </form>
  </div>

</body>

<style>
  body {
    padding: 120px 20px 80px 20px;
    color: black;
  }

  .form_container {
    width: 40%;
    margin: auto;
    padding: 20px;
    background-color: rgba(201, 255, 255, 0.14);
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }

  h1 {
    text-align: center;
    color: green;
    margin-bottom: 20px;
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }

  input[type="text"],
  input[type="date"],
  input[type="url"],
  textarea {
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    font-size: 16px;
  }

  button {
    padding: 10px;
    background-color: green;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }
</style>
</html>