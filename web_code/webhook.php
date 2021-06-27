<?php
include 'connectdb.php';
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $requestbody = file_get_contents("php://input");
    $json = json_decode($requestbody);
    $dname = $json->queryResult->parameters->devicename;
    $dstatus = $json->queryResult->parameters->devicestatus;
    if ($dname == "orange light") {
        $sql = "UPDATE MyGuests SET status='" . $dstatus . "' WHERE id='1'";
        mysqli_query($connection, $sql);
        $speech = "Ok, orange light turned " . $dstatus;
    } else if ($dname == "white light") {
        $sql = "UPDATE MyGuests SET status='" . $dstatus . "' WHERE id='2'";
        mysqli_query($connection, $sql);
        $speech = "Ok, white light turned " . $dstatus;
    } else if ($dname == "blue light") {
        $sql = "UPDATE MyGuests SET status='" . $dstatus . "' WHERE id='3'";
        mysqli_query($connection, $sql);
        $speech = "Ok, blue light turned " . $dstatus;
    } else if ($dname == "green light") {
        $sql = "UPDATE MyGuests SET status='" . $dstatus . "' WHERE id='4'";
        mysqli_query($connection, $sql);
        $speech = "Ok, Green light turned " . $dstatus;
    } else if ($dname == "all lights") {
        $sql = "UPDATE MyGuests SET status='" . $dstatus . "' WHERE id IN (1, 2, 3, 4)";
        mysqli_query($connection, $sql);
        $speech = "Ok, all lights turned " . $dstatus;
    } else {
        $speech = "Sorry, I didnt get that.";
    }
    $response = new \stdClass();
    $response->speech = $speech;
    $response->displayText = $speech;
    $response->source = "webhook";
    echo json_encode($response);
} else {
    echo "Method not allowed";
}
