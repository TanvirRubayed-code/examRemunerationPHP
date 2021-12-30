<?php

require './connect.php';

header("Access-Control-Allow-Origin: *");

$postdata = file_get_contents("php://input");



$userID = json_decode($postdata);



$sql = "SELECT * FROM teacher_info where tid='$userID';";

$res = mysqli_query($conn,$sql);


$userInfo = [];
if ($res->num_rows > 0 ) {
    $i = 0;
    while ($row = $res->fetch_assoc()) {
        $userInfo[$i]['username'] = $row['tid'];
        $userInfo[$i]['name'] = $row['teacherE_name'];
        $userInfo[$i]['title'] = $row['title'];
        $userInfo[$i]['department'] = $row['department'];
        $userInfo[$i]['university'] = $row['universityName'];
        $i++;
    }
    echo json_encode($userInfo);
} 