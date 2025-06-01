<?php
include_once("connection/connection.php");
$con = connection();
session_start();

if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
} else {
  echo "Connected successfully.";
}

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";
  $result = $con->query($sql);
  $total = $result->num_rows;

  if ($total > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['UserLogin'] = $row['username'];
    $_SESSION['Role'] = $row['role'];
    header("Location: Landing_page/landingpage.php");
  } else {
    echo "<script>alert('Invalid username or password. Please try again.');</script>";
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
</head>

<body>
  <div class="wrapper">
    <div class="container">
      <h1>Login</h1>
      <br>
      <div class="login_logo">
        <img src="images/yesd_logo.png" alt="" id="logo">
      </div>
      <form action="" method="post" id="login">
        <div class="form-element">
          <label>Username</label>
          <input type="text" name="username" id="username" placeholder="Enter Username" required>
        </div>

        <div class="form-element">
          <label>Password</label>
          <input type="password" name="password" id="password" placeholder="Enter Password" required>
        </div>

        <div class="form-element">
          <button type="submit" name="login" id="login">Login</button>
        </div>

        <div class="form-link">
          <p>Do not have an account?</p>
          <a href="register.php">Register</a>
        </div>
      </form>
    </div>
  </div>

</body>
<style>
  .container {
    width: 25%;
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
    width: 50%;
    margin-bottom: 1rem;
  }

  @media (max-width: 768px) {
    h1 {
      font-size: 36px;
    }

    img {
      width: 70%;
    }
  }
</style>

</html>