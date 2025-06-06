<?php
include_once("../connection/landingpage_connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Activities: Landing page</title>
  <link rel="stylesheet" href="../css/landingpage.css">
</head>

<body>
  <?php include_once("header.php"); ?>
  <H1>Activity page</H1>

  <div class="activity_container">
    <?php
    $sql_activities = "SELECT * FROM activities ORDER BY date DESC";
    $activities = $con->query($sql_activities) or die($con->error);

    while ($row_activity = $activities->fetch_assoc()) {
      ?>
      <div class="activity_card">
        <div class="activity_img">
          <img src="../images/activities/<?php echo htmlspecialchars($row_activity['act_image']); ?>"
            alt="Activity Image">
        </div>
        <div class="activity_details">
          <h3><?php echo htmlspecialchars($row_activity['act_name']); ?></h3>
          <div class="details">
            <h4>Date: </h4>
            <p><?php echo htmlspecialchars($row_activity['date']); ?></p>
          </div>
          <div class="details">
            <h4>Location: </h4>
            <p><?php echo htmlspecialchars($row_activity['location']); ?></p>
          </div>
          <p class="descriptions"><?php echo htmlspecialchars($row_activity['description']); ?></p>
          <div class="facebook_button">
            <a href="<?php echo htmlspecialchars($row_activity['facebook']); ?>">View on Facebook</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

</body>
<style>
  body {
    padding: 84px 20px 80px 20px;
  }

  h1 {
    margin: 32px 0;
    text-align: center;
    color: green;
    text-transform: uppercase;
  }

  .activity_container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    padding: 20px;
  }

  .activity_card {
    margin: 20px;
    border: 1px solid rgba(0, 122, 0, 0.3);
    border-radius: 16px;
    padding: 20px;
    background: rgba(201, 255, 255, 0.14);
    text-align: left;
  }

  .activity_img img {
    width: 100%;
    height: auto;
    border-radius: 8px;
  }

  .activity_details {
    margin-top: 10px;
  }

  .activity_details h3 {
    text-transform: capitalize;
    color: green;
    margin-bottom: 10px;
  }

  .details {
    display: flex;
  }

  .details h4 {
    margin-right: 5px;
  }

  .descriptions {
    margin-top: 20px;
  }
  .facebook_button{
    text-align: center;
    margin: 30px 0 20px 0;
  }

  .facebook_button a {
    color: white;
    font-size: 20px;
    text-decoration: none;
    padding: 5px 15px;
    border-radius:1rem;
    border: grey solid 1px;
    background-color: rgb(0, 255, 64);
    font-weight: bold;
  }

  .facebook_button a:hover{
    background-color: rgb(0, 255, 200);
  }


</style>

</html>