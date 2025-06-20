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

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql_members = "SELECT * FROM accounts";
if (!empty($search)) {
  $search_safe = $con->real_escape_string($search);
  $sql_members .= " WHERE fullname LIKE '%$search_safe%' OR program LIKE '%$search_safe%'";
}
$sql_members .= " ORDER BY username ASC";
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

  <form method="GET" style="text-align:center; margin-top: 1rem;">
    <input type="text" name="search" placeholder="Search name or course"
      value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
      style="padding: 8px; width: 300px;">
    <button type="submit" class="button">Search</button>
  </form>

  <div class="members_container">
    <?php while ($row_members = $members->fetch_assoc()) { ?>
      <div class="member_card">
        <div class="member_img">
          <img src="../images/profile/<?php echo htmlspecialchars($row_members['image']); ?>" alt="Member Image">
        </div>
        <div class="fullname">
          <h3><?php echo htmlspecialchars($row_members['fullname']); ?></h3>
          <p><?php echo htmlspecialchars($row_members['username']); ?></p>
        </div>
        <div class="details">
          <h4>Course: </h4>
          <p><?php echo htmlspecialchars($row_members['program']); ?></p>
        </div>

        <div class="details">
          <h4>facebook: </h4>

          <p><?php if (!empty($row_members['link_to_fb'])) { ?>
              <a href="<?php echo htmlspecialchars($row_members['link_to_fb']); ?>"
                target="_blank"><?php echo htmlspecialchars($row_members['fullname']); ?></a>
            <?php } else {
            echo "No Facebook link";
          } ?>
          </p>

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

  .button {
    padding: 8px 12px;
    background-color: rgb(0, 209, 7);
    border: rgb(0, 240, 208);
    color: white;
  }

  .button:hover {
    background-color: rgb(0, 255, 200);
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
    background-color: rgba(201, 255, 255, 0.14);
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

  .fullname {
    margin: 2rem 0;
    text-align: center;
  }

  .fullname h3 {
    font-size: 30px;
    color: green;
  }

  .fullname p {
    font-size: 15px;
    font-style: italic;
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

  .details a:hover {
    color: lightskyblue;
    text-decoration: underline;
  }
</style>

</html>