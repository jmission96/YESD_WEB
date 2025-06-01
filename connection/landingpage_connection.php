<?php
include_once("connection.php");
$con = connection();
session_start();

if (!isset($_SESSION['UserLogin'])) {
  header("Location: ../login.php");
  exit();
}

$username = $_SESSION['UserLogin'];

$sql = "SELECT * FROM accounts WHERE username = '$username'";
$students = $con->query($sql) or die($con->error);
$row = $students->fetch_assoc();
?>