<div class="header">
  <div class="profile">
    <div class="logo">
      <img src="../images/yesd_logo.png" alt="Logo">
    </div>
    <h2>YESD - BISU Bilar</h2>
  </div>

  <div class="landing_page_link">
    <div class="links">
      <a href="../Landing_page/landingpage.php">Home</a>
      <a href="../Landing_page/members.php">Members</a>
      <a href="../Landing_page/activities.php">Activities</a>
      <a href="../Landing_page/checklist.php">Cleanup Checklist</a>
    </div>
    <div class="logout">
      <a href="../logout.php">Logout</a>
    </div>
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

  .logout {
    margin-left: 40px;
    display: flex;
    justify-content: right;
    margin-top: 1rem;
  }

  .logout a {
    margin: 0 1rem;
    color: white;
    text-decoration: none;
  }

  .logout a:hover {
    color: lightskyblue;
    text-decoration: underline;
  }
</style>