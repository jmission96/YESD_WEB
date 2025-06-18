<?php
include_once("connection/connection.php");
$con = connection();
session_start();

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo "Connected successfully.";
}

if (isset($_POST['submit'])) {
  $admin_password_value = "admin123";
  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $program = $_POST['program'];
  $role = $_POST['role'];
  $confirm_password = $_POST['confirm-password'];
  $admin_password = $_POST['admin-password'];
  $facebook_profile = $_POST['facebook-profile'];
  $image = $_FILES['image']['name'];
  $target = "images/profile/" . basename($image);


  if ($password !== $confirm_password) {
    echo "<script>alert('Passwords do not match. Please try again.');</script>";
  } else {
    if ($role === "Admin" && $admin_password !== $admin_password_value) {
      echo "<script>alert('Invalid admin password. Please try again.');</script>";
    } else {
      $sql = "INSERT INTO accounts (`fullname`, `username`, `password`, `program`, `role`, `link_to_fb`, `image`) VALUES ('$fullname', '$username', '$password', '$program', '$role', '$facebook_profile', '$image')";
      if ($con->query($sql) === TRUE) {

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
          header("Location: login.php");
        } else {
          echo "Failed to upload image.";
        }

        echo "<script>alert('Registration successful!');</script>";

      } else {
        echo "<script>alert('Error: " . $sql . "<br>" . $con->error . "');</script>";
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YESD - BISU Bilar</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/form.css">
  <script src="register.js" defer></script>
</head>

<body>
  <div class="wrapper">
    <div class="container">
      <div class="back">
        <a href="index.php"><img src="images/back.png" class="back_button"></a>
      </div> 
      <h1>Register</h1>
      <form action="" method="post" enctype="multipart/form-data" id="register">

        <div class="form-element">
          <label>Full Name:</label>
          <input type="text" name="fullname" id="fullname" placeholder="Enter Your Full Name" required>
        </div>
        <div class="form-row">
          <div class="form-element">
            <label>Program:</label>
            <input type="text" name="program" id="program" placeholder="Enter Your Program" required>
          </div>

          <div class="form-element">
            <label>Access type:</label>
            <select name="role" id="role">
              <option value="Member">Member</option>
              <option value="Admin">Admin</option>
            </select>
            <input type="hidden" name="role-value" id="role-value">
          </div>
        </div>

        <div class="form-element">
          <label>Username:</label>
          <input type="text" name="username" id="username" placeholder="Enter Username" required>
        </div>

        <div class="form-row" style="display: flex; align-items: flex-end;">
          <div class="form-element">
            <label>Password:</label>
            <input type="password" name="password" id="password" placeholder="Enter Password" required>
          </div>

          <div class="form-element">
            <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password"
              required>
          </div>
        </div>

        <div class="form-element" id="admin-password-container" style="display:none">
          <label>Admin Password:</label>
          <input type="password" name="admin-password" id="admin-password" placeholder="Admin Password">
        </div>

        <div class="form-element">
          <label>Facebook Profile Link:</label>
          <input type="text" name="facebook-profile" id="facebook-profile" placeholder="Optional">
        </div>

        <div class="form-element" id="image-container">
          <label>2x2 ID PICTURE:</label>
          <input type="file" name="image" id="image" required>
        </div>

        <div class="form-button">
          <button type="submit" name="submit" id="submit">Submit</button>
        </div>

        <div class="form-link">
          <p>Already have an account?</p>
          <a href="login.php">Login</a>
        </div>
      </form>
    </div>
  </div>

</body>
<style>
  body {
    padding: 3rem;
  }

  .container {
    width: 50%;
  }

  h1 {
    font-size: 50px;
    margin-top: 1rem;
    color: green;
  }

  .login_logo {
    display: flex;
    justify-content: center;
  }

  img {
    width: 25%;
    margin-bottom: 1rem;
  }



  @media (max-width: 768px) {
    h1 {
      font-size: 36px;
    }

    img {
      width: 70%;
    }

    .container {
      width: 80%;
    }
  }

  .back a {
    display: flex;
    align-items: left;
    width: 5rem;
  }

  .back_button {
    width: 30px;
  }

  .back_button:hover {
    filter: brightness(0) saturate(100%) invert(64%) sepia(30%) saturate(1200%) hue-rotate(175deg) brightness(100%) contrast(105%);
  }
</style>

</html>