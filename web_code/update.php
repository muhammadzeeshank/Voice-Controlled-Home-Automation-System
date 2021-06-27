<?php
include 'connectdb.php';
if (isset($_POST["hidden_status"])) {
    $status = $_POST['hidden_status'];
    $sql = "UPDATE MyGuests SET status='" . $status . "' WHERE id='1'";
    mysqli_query($connection, $sql);
}
if (isset($_POST["hidden_status1"])) {
    $status = $_POST['hidden_status1'];
    $sql = "UPDATE MyGuests SET status='" . $status . "' WHERE id='2'";
    mysqli_query($connection, $sql);
}
if (isset($_POST["hidden_status2"])) {
    $status = $_POST['hidden_status2'];
    $sql = "UPDATE MyGuests SET status='" . $status . "' WHERE id='3'";
    mysqli_query($connection, $sql);
}
if (isset($_POST["hidden_status3"])) {
    $status = $_POST['hidden_status3'];
    $sql = "UPDATE MyGuests SET status='" . $status . "' WHERE id='4'";
    mysqli_query($connection, $sql);
}
