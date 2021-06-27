<?php
//insert.php
$serverName = "";
$userName = "";
$password = "";
$dbname = "";

$connection = mysqli_connect($serverName, $userName, $password, $dbname);
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}
