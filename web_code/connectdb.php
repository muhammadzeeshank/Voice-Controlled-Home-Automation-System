<?php
//insert.php
$serverName = "localhost";
$userName = "id15881303_autohomeuser";
$password = "rrGvr/=V\}uH>!f5";
$dbname = "id15881303_autohome";

$connection = mysqli_connect($serverName, $userName, $password, $dbname);
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}
