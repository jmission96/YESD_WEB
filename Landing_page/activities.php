<?php
include_once("../connection/landingpage_connection.php");


$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql_activities = "SELECT * FROM activities";

if (!empty($search)) {
  $search_safe = $con->real_escape_string($search);
  $sql_activities .= " WHERE act_name LIKE '%$search_safe%' OR location LIKE '%$search_safe%'";
}

$sql_activities .= " ORDER BY date DESC";
$activities = $con->query($sql_activities) or die($con->error);
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
  <div class="top_element">
    <form method="GET" class="search_form">
      <input type="text" name="search" placeholder="Search by name or location"
        value="<?php echo htmlspecialchars($search); ?>" />
      <button type="submit" class="button">Search</button>
    </form>
    <?php if (isset($_SESSION['Role']) && $_SESSION['Role'] === 'Admin') { ?>
      <div class="add_new_activity">
        <a href="add_activity.php" class="add_activity_button">Add New Activity</a>
      </div>
    <?php } ?>
  </div>

  <div class="activity_container">
    <?php

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
            <p><?php echo date("j F Y", strtotime($row_activity['date'])); ?></p>
          </div>
          <div class="details">
            <h4>Location: </h4>
            <p><?php echo htmlspecialchars($row_activity['location']); ?></p>
          </div>
          <p class="descriptions"><?php echo htmlspecialchars($row_activity['description']); ?></p>


          <div class="act_button">
            <?php
            $today = date("Y-m-d");
            $act_date = $row_activity['date'];


            if ($act_date == $today) {
              echo '<div class="checklist_button">
          <a href="checklist.php?activity_id=' . $row_activity['id'] . '">Open Checklist</a>
        </div>';
            } elseif ($act_date < $today) {
              echo '<div class="facebook_button">
          <a href="' . htmlspecialchars($row_activity['facebook']) . '" target="_blank">View on Facebook</a>
        </div>';
            } elseif ($act_date > $today) {
              echo '<div class="coming_soon_button">
          <a href="#" >Coming Soon</a>
        </div>';
            }
            ?>
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
    position: relative margin: 20px;
    border: 1px solid rgba(0, 122, 0, 0.3);
    border-radius: 16px;
    padding: 20px;
    background: rgba(201, 255, 255, 0.14);
    text-align: left;
    margin: 2rem 1rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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

  .search_form {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0;
  }

  .search_form input {
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #ccc;
    font-size: 16px;
    width: 300px;
  }

  .search_form button {
    background-color: rgb(0, 209, 7);
    padding: 10px;
    margin-left: 10px;
    border: rgb(0, 240, 208);
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    color: white;
  }

  .search_form button:hover {
    background-color: rgb(0, 255, 200);
  }

  .add_new_activity {
    text-align: left;
    padding-top: 10px;
  }

  .add_new_activity a {
    padding: 10px;
    margin-left: 10px;
    border: rgb(0, 209, 7) solid 1px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    color: rgb(0, 209, 7);
    text-decoration: none;
    font-weight: bold;
  }

  .add_new_activity a:hover {
    background-color: rgb(0, 255, 200);
    color: white;
    border: rgb(0, 255, 200) solid 1px;
  }

  .top_element {
    display: flex;
    justify-content: center;
    align-items: flex-start;
  }

  .act_button {
    width: 100%;
    display: flex;
    justify-content: center;
  }

  .checklist_button,
  .facebook_button {
    border-radius: 20px;
    cursor: pointer;
    padding: 15px;
    margin: 2rem 0;
    letter-spacing: 3px;
    width: 40%;
    text-align: center;
    font-weight: bold;
  }

  .coming_soon_button a,
  .facebook_button a {
    color: white;
  }

  .facebook_button {
    padding: 15px 12px;
    background-color: rgb(0, 209, 7);
    border: rgb(0, 240, 208);
    font-size: 18px;
  }

  .facebook_button:hover {
    background-color: rgb(0, 255, 200);
  }

  .checklist_button a {
    color: rgb(0, 209, 7);
  }

  .checklist_button {
    padding: 15px 12px;
    border: rgb(0, 209, 7) solid 3px;
    font-size: 18px;
  }

  .checklist_button:hover,
  .checklist_button:hover a,
  .checklist_button a:hover {
    background-color: rgb(0, 255, 200);
    color: white;
    border:  rgb(0, 255, 200) solid 3px;
  }

  .coming_soon_button {    
    padding: 15px 12px;
    background-color: rgb(0, 209, 7);
    border: rgb(0, 240, 208);
    font-size: 18px;
    pointer-events: none;
    border-radius: 20px;
    margin: 2rem 0;
    letter-spacing: 3px;
    width: 40%;
    text-align: center;
    font-weight: bold;
    opacity: 0.4;
  } 
</style>

</html>