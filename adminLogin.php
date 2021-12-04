
<?php
header("Access-Control-Allow-Origin: *");

require_once './connect.php';



$loginInfo = file_get_contents("php://input");


$jsonData = json_decode($loginInfo);

// print_r($jsonData);

$adminName = $jsonData->admin_name;
$adminPassword = $jsonData->admin_password;

// // print_r($adminName);

// print_r($adminPassword);

$userInfo = [];

$sql = "SELECT * from admin WHERE admin_username='$adminName';";


$result = mysqli_query($conn, $sql);

$failed = true;

if ($result->num_rows == 1) {
    // output data of each row
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $userInfo[$i]['username'] = $row['admin_username'];
        $hash_pass = $row['admin_password'];
        $i++;
    }
    if(password_verify($adminPassword,$hash_pass)){
        echo json_encode($userInfo);
    }
    else {
        echo $failed;
    }

} else {
    echo $failed;
}
