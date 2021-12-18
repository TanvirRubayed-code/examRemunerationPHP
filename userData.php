<?php

require './connect.php';

header("Access-Control-Allow-Origin: *");

$postdata = file_get_contents("php://input");

$userID = json_decode(json_decode($postdata))->username;
print_r($userID);

$sql = "SELECT * FROM teacher_info where tid='$userID';";

$res = mysqli_query($conn,$sql);


print_r($res);

$userInfo = [];
if ($res->num_rows > 0 ) {
    $i = 0;
    while ($row = $res->fetch_assoc()) {
        $userInfo[$i]['username'] = $row['tid'];
        $i++;
    }
    echo json_encode($userInfo);
} 