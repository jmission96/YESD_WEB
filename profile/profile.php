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
  <title>Profile</title>
  <link rel="stylesheet" href="../css/landingpage.css">
</head>

<body>
<?php
include_once("../profile/header.php");
?>
  <div class="profile_card">
    <div class="profile_img">
      <img src="../images/profile/<?php echo $row['image'] ?>">
    </div>
    <div class="profile_name">
    <h2><?php echo $row['fullname'] ?></h2>
    </div>
    <div class="profile_details">
      <p>Username: <?php echo $row['username'] ?></p>
      <p>Program: <?php echo $row['program'] ?></p>
      <p>Role: <?php echo $row['role'] ?></p>
    </div>
    <div class="edit">
      <a href="edit_profile.php" class="edit_button">Edit Profile</a>
    </div>
  </div>

</body>

<style>
  body {
    padding-top: 84px;
    text-align: center;
  }

  .profile_card{
    margin-top: 50px;
    border: 1px solid rgba(0, 122, 0, 0.3);
    border-radius: 16px;
    padding: 2rem 5rem;
    display: inline-block;
    background: rgba(201, 255, 255, 0.14);
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  }

  .profile_img {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 310px;
    height: 310px;
    border-radius: 50%;
    border: rgba(0, 255, 157, 0.66) solid 1px;
  }
  .profile_img img {
    width: 300px;
    height: 300px;
    border-radius: 50%;
    object-fit: cover;
  }

  .profile_name h2 {
    text-transform: capitalize;
    margin-top: 10px;
    color: green;
  }

  .profile_details {}

  .profile_details p {
    font-size: 18px;
    margin: 5px 0;
  }

  .edit{
    margin-top: 2rem;

  }
  .edit a{
    background-color: rgb(0, 255, 64);
    padding: 5px 10px;
    border-radius: 10px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    font-weight: bold;
  }

  .edit a:hover{
    background-color: rgb(0, 255, 200);
  }
</style>

</html>