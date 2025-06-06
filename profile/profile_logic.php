<?php

if (isset($_POST['save_changes'])) {

  $image = $_FILES['image']['name'];
  $target = "../images/profile/" . basename($image);
  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $program = $_POST['program'];
  $role = $_POST['role'];
  $password = $_POST['password'];
  $admin_password = $_POST['admin_password'];
  $fb_link = $_POST['fb_link'];
  $admin_password_curent_value = "admin123";

  if ($role === "Admin" && $admin_password_curent_value !== $admin_password) {
    echo "<script>alert('Invalid admin password. Please try again.');</script>";
  } else {
    $sql = "UPDATE accounts SET `password`='$password', `fullname`='$fullname', `username`='$username', `program`='$program', `role`='$role', `link_to_fb`='$fb_link'";

    if (!empty($image)) {
      $sql .= ", `image`='$image'";
    }

    $sql .= " WHERE `id`='" . $_SESSION['id'] . "'";

    if ($con->query($sql) === TRUE) {
      if (!empty($image) && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo "<script>alert('Profile updated successfully!');</script>";
      } else {
        echo "<script>alert('Profile updated successfully, but failed to upload image.');</script>";
      }      

      header("Location: ../logout.php");
    } else {
      echo "<script>alert('Error updating profile: " . $con->error . "');</script>";
    }
  }
}
?>