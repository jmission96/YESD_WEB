<?php
include_once("../connection/checklist_connection.php");
$user_id = $_SESSION['id'];
$activity_id = 1;

// $sql_insert_checklist = "INSERT INTO checklist (`user_id`, `activity_id`) VALUES ('$user_id', '$activity_id')";
// if ($con->query($sql_insert_checklist) === TRUE) {
//     echo "Checklist created successfully.";
// } else {
//     echo "Error: " . $sql_insert_checklist . "<br>" . $con->error;
// }

// $sql_checklist = "SELECT * FROM checklist WHERE `user_id` = '$user_id'";
// $result = $con->query($sql_checklist) or die($con->error);
// $row_checklist = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cleanup Checklist: Landing page</title>
  <link rel="stylesheet" href="../css/landingpage.css">
</head>

<body>
  <?php include_once("header.php"); ?>
  <H1>Cleanup Checklist page</H1>
  <form action="" method="POST">
    <input type="text" name="checklist_item" placeholder="Add checklist item">
    <button type="submit">Add</button>
  </form>
</body>

<style>
  body {
    padding: 84px 20px 80px 20px;
    color: black;
  }

  h1 {
    text-align: center;
    margin-top: 2rem;
    color: green;
    text-transform: uppercase;
  }

</style>

</html>