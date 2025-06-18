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

include_once("profile_logic.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="../css/landingpage.css">
  <script src="edit_profile.js" defer></script>
</head>

<body>
  <?php
  include_once("../profile/header.php");
  ?>

  <form action="" method="post" enctype="multipart/form-data" id="edit_profile">
    <div class="profile_card">
      <div class="profile_img">
        <img src="../images/profile/<?php echo $row['image'] ?>">
      </div>
      <div class="change_image">
        <input type="file" name="image" id="image" onchange="previewImage(event)">
      </div>
      <div class="profile_name">
        <label>Full Name:</label>
        <input type="text" name="fullname" value="<?php echo $row['fullname'] ?>">
      </div>
      <div class="profile_details">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $row['username'] ?>">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo $row['password'] ?>"
          placeholder="ex. 12345678">
        <label for="program">Program:</label>
        <input type="text" name="program" value="<?php echo $row['program'] ?>">
        <label for="role">Access Type:</label>
        <select name="role" id="role">
          <option value="Member" <?php echo ($row['role'] == 'Member') ? 'selected' : ''; ?>>Member</option>
          <option value="Admin" <?php echo ($row['role'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
        </select>
        <input type="hidden" name="role-value" id="role-value">
        <div class="admin_pass_container" id="admin_pass_container" style="display:none">
          <label for="admin_password" id="admin_pass_label">Admin Password</label>
          <input type="password" name="admin_password" id="admin_password" placeholder="ex. 12345678">
        </div>

        <div class="fb_link">
          <label for="fb_link">Facebook Profile Link</label>
          <input type="link" name="fb_link" id="fb_link" placeholder="Facebook Profile Link"
            value="<?php echo $row['link_to_fb'] ?>">
        </div>
      </div>
      <div class="edit">
        <button type="submit" name="save_changes">Save Changes</button>
      </div>

      <div class="note">
        <p>Note: After making changes, you must relog-in your account</p>
      </div>
  </form>

</body>

<style>
  body {
    padding-top: 84px;
    text-align: center;
  }

  .note {
    margin-top: 1rem;
    font-size: 16px;
    color: red;
    width: 350px;
  }

  .note p {
    font-style: italic;
    max-width: 100%;
    word-wrap: break-word;
    white-space: normal;
    font-size: 12px;
  }

  input {
    width: 350px;
    height: 30px;
    padding: 10px;
    font-size: 16px;
  }

  select {
    width: 350px;
    height: 30px;
    padding: 5px 10px;
    font-size: 16px;
  }

  input[type="text"],
  select {
    border: gray solid 1px;
    border-radius: 5px;
  }

  label {
    margin-top: 1rem;
    font-size: 18px;
  }

  .profile_card {
    margin-top: 50px;
    border: 1px solid rgba(0, 122, 0, 0.3);
    border-radius: 16px;
    padding: 2rem 3rem;
    display: inline-block;
    background: rgba(201, 255, 255, 0.14);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
  }

  .profile_img {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    border: rgba(0, 255, 157, 0.66) solid 1px;
    margin: 0 auto;
  }

  .profile_img img {
    width: 95%;
    height: 95%;
    border-radius: 50%;
    object-fit: cover;
  }

  .profile_name {
    margin-top: 1rem;
    display: flex;
    flex-direction: column;
    text-align: left;
    margin-bottom: 1rem;
  }

  .profile_name h2 {
    text-transform: capitalize;
    margin-top: 10px;
    color: green;
  }

  .profile_details {
    margin-top: 1rem;
    display: flex;
    flex-direction: column;
    text-align: left;
  }

  .profile_details div {
    display: flex;
    flex-direction: column;
    text-align: left;
  }

  .edit {
    margin: 2rem 0;
    
  }

  .edit button {
    width: 80%;
    background-color: rgb(0, 255, 8);
    border-radius: 20px;
    border: rgb(0, 240, 208);
    color: white;
    cursor: pointer;
    padding: 10px;
    letter-spacing: 3px;
    font-size: 22px;
  }

  .edit button:hover {
    background-color: rgb(0, 255, 200);
  }

</style>

</html>