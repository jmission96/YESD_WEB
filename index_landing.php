<?php
include_once("connection/index_connection.php");
$index_con = connection();
session_start();

if (!$index_con) {
  die("Connection Failed:" . mysqli_connect_error());
}

$index_landing_sql = "SELECT * FROM activities WHERE `date` <= CURDATE() ORDER BY `date` DESC LIMIT 1";
$index_landing = $index_con->query($index_landing_sql) or die($index_con->error);
$row_landing_activity = $index_landing->fetch_assoc();

?>


<div class="page_devider">
  <h1>Check out Our Recent Activity</h1>
  <div class="landingpage_content">
    <div class="act_name">
      <h2><?php echo $row_landing_activity['act_name'] ?></h2>
    </div>

    <div class="activity_image">
      <img src="../images/activities/<?php echo $row_landing_activity['act_image'] ?>" alt="Recent Activity Image">
    </div>

    <div class="details">
      <h4>Date: </h4>
      <p><?php echo date("j F Y", strtotime($row_landing_activity['date'])); ?></p>
    </div>
    <div class="details">
      <h4>Location: </h4>
      <p><?php echo htmlspecialchars($row_landing_activity['location']); ?></p>
    </div>
    <div class="descriptions">
      <p class="descriptions"><?php echo htmlspecialchars($row_landing_activity['description']); ?></p>
    </div>

    <?php
    $today = date("Y-m-d");
    $act_date = $row_landing_activity['date'];

    if ($act_date == $today) {
      echo '<div class="checklist_button">
          <a href="checklist.php?activity_id=' . $row_landing_activity['id'] . '" class="checklist_button">Open Checklist</a>
        </div>';
    } elseif ($act_date < $today) {
      echo '<div class="facebook_button">
          <a href="' . htmlspecialchars($row_landing_activity['facebook']) . '" target="_blank">View on Facebook</a>
        </div>';
    }
    ?>
  </div>
</div>