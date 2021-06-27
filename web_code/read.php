<?php
include 'connectdb.php';
$status = array();
$sql = "SELECT * FROM MyGuests";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p style='display:none;'>" . $row["device"] . $row["status"] . "</p>"; //TODO: chande Device to device
        array_push($status, $row["status"]);
    }
}
