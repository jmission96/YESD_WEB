<?php
if (!isset($_SESSION)) {
  session_start();
}

include_once("../connection/connection.php");
$con = connection();

$username = $_SESSION['UserLogin'];
$sql = "SELECT * FROM accounts WHERE `username` = '$username'";
$profile = $con->query($sql) or die($con->error);
$row = $profile->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
</head>
<body>
  
</body>
</html>