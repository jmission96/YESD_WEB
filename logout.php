<?php
session_start();
unset($_SESSION['UserLogin']);
unset($_SESSION['Role']);
echo header("Location:index.php");
?>