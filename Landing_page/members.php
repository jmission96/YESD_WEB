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

$sql_members = "SELECT * FROM accounts ORDER BY username ASC";
$members = $con->query($sql_members) or die($con->error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Members: Landing Page</title>
  <link rel="stylesheet" href="../css/landingpage.css">
</head>

<body>
  <?php include_once("header.php"); ?>
  <h1>Members</h1>

  <div class="members_container">
    <?php while ($row_members = $members->fetch_assoc()) { ?>
      <div class="member_card">
        <div class="member_img">
          <img src="<?php echo htmlspecialchars($row_members['image']); ?>" alt="Member Image">
        </div>
        <div class="fullname">
          <h3><?php echo htmlspecialchars($row_members['fullname']); ?></h3>
        </div>
        <div class="details">
          <h4>Course: </h4>
          <p><?php echo htmlspecialchars($row_members['program']); ?></p>
        </div>

        <div class="details">
          <h4>facebook: </h4>
          <a href="<?php echo htmlspecialchars($row_members['link_to_fb']); ?>" target="_blank"><p><?php echo htmlspecialchars($row_members['fullname']); ?></p></a>
        </div>
      </div>
    <?php } ?>
  </div>
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

  .members_container {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 1rem;
    padding: 2rem;
    text-transform: capitalize;
  }

  .member_card {
    justify-content: center;
    margin: 1rem 2rem;
    border: 1px solid rgba(0, 122, 0, 0.3);
    padding: 2rem;
    border-radius: 10px;
    background-color:rgba(201, 255, 255, 0.14);
    text-align: left;
  }

  .member_img {
    height: 260px;
    width: 260px;
    border-radius: 50%;
    border: rgba(0, 255, 157, 0.66) solid 1px;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    margin: 0 auto;
  }

  .member_img img {
    width: 250px;
    height: 250px;
    border-radius: 50%;
    object-fit: cover;
  }

  .fullname h3 {
    font-size: 30px;
    margin: 2rem 0;
    color: green;
    text-align: center;
  }

  .details {
    display: flex;
  }

  .details h4 {
    font-size: 20px;
  }

  .details p {
    font-size: 20px;
    margin-left: 10px;
  }

  .details a {
    color: black;
    font-size: 20px;
    margin-left: 10px;
  }

  .details a:hover{
    color: lightskyblue;
    text-decoration: underline;
  }
</style>

</html>