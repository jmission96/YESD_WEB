<div class="header">
  <div class="profile">
    <div class="logo">
      <img src="../images/yesd_logo.png" alt="Logo">
    </div>
    <h2>YESD - BISU Bilar</h2>
  </div>

  <div class="landing_page_link">
    <div class="links">
      <a href="landingpage.php">Home</a>
      <a href="members.php">Members</a>
      <a href="activities.php">Activities</a>
    </div>
    <a href="../profile/profile.php">
      <div class="profile_img">
        <h3><?php echo $row['username']; ?></h3>
        <img src="../images/profile/<?php echo $row['image']; ?>" alt="Logo">
      </div>
    </a>
  </div>
</div>
<style>
  .header {
    background-color: green;
    display: flex;
    justify-content: space-between;
    padding: 1rem 3rem .5rem 3rem;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
  }

  .profile {
    display: flex;
    justify-content: left;
    align-items: center;
  }

  .landing_page_link {
    display: flex;
    justify-content: right;
  }

  a {
    text-decoration: none;
  }

  .profile h2 {
    margin-left: 1rem;
    text-transform: capitalize;
    color: white;
  }
  .logo img {
    width: 3rem;
    height: 3rem;
  }

  .links {
    display: flex;
    justify-content: right;
    margin-top: 1rem;
  }

  .links a {
    margin: 0 1rem;
    color: white;
    text-decoration: none;
  }

  .links a:hover {
    color: lightskyblue;
    text-decoration: underline;
  }

  .profile_img {
    margin-left: 30px;
    display: flex;
  }

  .profile_img:hover h3 {
    color: lightskyblue;
    text-decoration: underline
  }

  .profile_img:hover img {
    position: relative;
    filter: brightness(0.5) sepia(1) hue-rotate(170deg) saturate(5);
  }

  .profile_img h3{
    margin-right: 20px;
    color: white;
    text-transform: capitalize;
    margin-top: .9rem;
  }
  .profile_img img {
    width: 3rem;
    height: 3rem;
    border-radius: 50%;
    object-fit: cover;
  }
</style>