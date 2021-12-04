<?php

header("Access-Control-Allow-Origin: *");

$dbServername = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "exambillmanagement";

$conn = mysqli_connect($dbServername,$dbUserName,$dbPassword, $dbName );




// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully";

// define('DB_HOST','localhost');
// define('DB_USER','root');
// define('DB_PASS','');
// define('DB_NAME','exambillmanagement');

// function connect(){
//     $connect = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

//     if(mysqli_connect_errno($connect)){
//         die('Failed to connect' . mysqli_connect_error());

//     }
//     mysqli_set_charset($connect,"utf8");
//     return $connect;
// }

// $con = connect();


?>


