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
  <title>YESD</title>
  <link rel="stylesheet" href="../css/landingpage.css">
  <link rel="stylesheet" href="../css/image_slide.css">
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
  
  <div class="landingpage_content">
    <h1>Check out Our Recent Activity</h1>
    <h2 id="recent_act_post">Recent Activity</h2>
    <div class="activity_image">
      <img src="../images/recent_activity.jpg" alt="Recent Activity Image">
    </div>
    <a href="https://www.facebook.com/share/p/1CF81Zurvx/" target="_blank">See in facebook</a>
  </div>
</body>
<script>
  const slideContainer = document.getElementById('slide');
  const slides = slideContainer.querySelectorAll('img');
  const slideCount = slides.length;
  let currentIndex = 0;

  const updateSlide = () => {
    slideContainer.scrollTo({
      left: currentIndex * slideContainer.clientWidth,
      behavior: 'smooth'
    });
  };

  document.getElementById('arrow_left').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + slideCount) % slideCount;
    updateSlide();
  });

  document.getElementById('arrow_right').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % slideCount;
    updateSlide();
  });
</script>

</html>