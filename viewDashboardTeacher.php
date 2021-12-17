<?php
header("Access-Control-Allow-Origin: *");

require_once './connect.php';

$sql = "SELECT * from teacher_info ;";

$result = mysqli_query($conn, $sql);
$teacher = [];

if ($result->num_rows > 0) {
    // output data of each row
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $teacher[$i]['tid'] = $row['tid'];
        $teacher[$i]['name'] = $row['teacherE_name'];
        $teacher[$i]['department'] = $row['department'];
        $teacher[$i]['title'] = $row['title'];
        $i++;
    }

    echo json_encode($teacher);

} else {
    echo $failed;
}
