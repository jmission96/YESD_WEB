<?php
function connection()
{
  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "yesddb";

  $index_con = new mysqli($host, $username, $password, $database);

  if ($index_con->connect_error) {
    die("Connection failed: " . $index_con->connect_error);
  } else {
    return $index_con;
  }

}