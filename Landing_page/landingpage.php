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

$sql_recent_activity = "SELECT * FROM activities WHERE `date` <= CURDATE() ORDER BY `date` DESC LIMIT 1";
$recent_activity = $con->query($sql_recent_activity) or die($con->error);
$row_recent_activity = $recent_activity->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YESD</title>
  <link rel="stylesheet" href="../css/landingpage.css">
  <link rel="stylesheet" href="../css/image_slide.css">
  <script src="landingpage.js"></script>
</head>

<body>
  <?php include("header.php"); ?>
  <section class="landingpage_img">
    <div class="slide_wrapper" id="slide_wrapper">
      <div class="slide" id="slide">
        <img src="/YESD_Web/images/nature_background.jpg" alt="Nature Image" id="slide1">
        <img src="/YESD_Web/images/coastal_cleanup.jpg" alt="Coastal Cleanup Image" id="slide2">
        <img src="/YESD_Web/images/mangrove-restoration.jpg" alt="Mangrove Restoration Image" id="slide3">
        <img src="/YESD_Web/images/reforestacion.jpg" alt="Reforestacion Image" id="slide4">
      </div>
      <div class="slide_nav">
        <a href="#slide1"></a>
        <a href="#slide2"></a>
        <a href="#slide3"></a>
        <a href="#slide4"></a>
      </div>
      <button class="arrow left" id="arrow_left">&#10094;</button>
      <button class="arrow right" id="arrow_right">&#10095;</button>
    </div>
  </section>
  <div class="page_devider">
    <h1>Check out Our Recent Activity</h1>
    <div class="landingpage_content">
      <div class="act_name">
        <h2><?php echo $row_recent_activity['act_name'] ?></h2>
      </div>

      <div class="activity_image">
        <img src="../images/activities/<?php echo $row_recent_activity['act_image'] ?>" alt="Recent Activity Image">
      </div>

      <div class="details">
        <h4>Date: </h4>
        <p><?php echo date("j F Y", strtotime($row_recent_activity['date'])); ?></p>
      </div>
      <div class="details">
        <h4>Location: </h4>
        <p><?php echo htmlspecialchars($row_recent_activity['location']); ?></p>
      </div>
      <div class="descriptions">
        <p class="descriptions"><?php echo htmlspecialchars($row_recent_activity['description']); ?></p>
      </div>

      
      <div class="act_button">
            <?php
            $today = date("Y-m-d");
            $act_date = $row_recent_activity['date'];


            if ($act_date == $today) {
              echo '<div class="checklist_button">
          <a href="checklist.php?activity_id=' . $row_recent_activity['id'] . '">Open Checklist</a>
        </div>';
            } elseif ($act_date < $today) {
              echo '<div class="facebook_button">
          <a href="' . htmlspecialchars($row_recent_activity['facebook']) . '" target="_blank">View on Facebook</a>
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
</body>

<style>
  h1 {
    margin: 32px 0;
    text-align: center;
    color: green;
    text-transform: uppercase;
  }

  .page_devider {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 4rem 0;
  }

  .landingpage_content {
    width: 50%;
    justify-content: center;
    margin: 0 auto;
    border: 1px solid rgba(0, 122, 0, 0.3);
    padding: 4rem;
    border-radius: 10px;
    background-color: rgba(201, 255, 255, 0.14);
    text-align: left;
  }

  .activity_image {
    width: 80%;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding-bottom: 2rem;
  }

  .activity_image img {
    margin: 0 auto;
    width: 100%;
    height: auto;
    border-radius: 8px;
  }

  .descriptions {
    margin-top: 1rem;
    line-height: 1.25;
    text-indent: 2em;
  }

  .act_name {
    text-align: center;
    margin-bottom: 1rem;
  }

  .act_name h2 {
    font-size: 2rem;
    text-transform: capitalize;
    color: green;
  }

  .details {
    display: flex;
    justify-content: left;
  }

  .details h4 {
    margin-right: 0.5rem;
  }

   .act_button {
    width: 100%;
    display: flex;
    justify-content: center;
  }

  .checklist_button,
  .facebook_button,
  .coming_soon_button {
    position: relative;
    overflow: hidden;
  }

  .checklist_button a,
  .facebook_button a,
  .coming_soon_button a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    text-decoration: none;
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
    border: rgb(0, 255, 200) solid 3px;
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