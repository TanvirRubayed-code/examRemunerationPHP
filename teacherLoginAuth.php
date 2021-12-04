<?php
header("Access-Control-Allow-Origin: *");

require_once './connect.php';



$teacherInfo = file_get_contents("php://input");

$jsonData = json_decode($teacherInfo);

// print_r($jsonData);

$userName = $jsonData->user_name;
$userPassword = $jsonData->user_password;

$userInfo = [];

$sql = "SELECT * from teacher_info WHERE tid ='$userName';";

$result = mysqli_query($conn, $sql);

$failed = true;


if ($result->num_rows == 1) {
    // output data of each row
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $userInfo[$i]['username'] = $row['tid'];
        $hash_pass = $row['password'];
        $i++;
    }
    if(password_verify($userPassword,$hash_pass)){
        echo json_encode($userInfo);
    }
    else {
        echo $failed;
    }

} else {
    echo $failed;
}
