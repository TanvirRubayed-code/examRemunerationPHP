
<?php

require './connect.php';

header("Access-Control-Allow-Origin: *");

$postdata = file_get_contents("php://input");


if(isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);


    $cId = $request->course_id;
    $cName = $request->course_name;
    $cCredit = $request->course_credit;
    $cSemester = $request->course_semester;

    $sql = "INSERT INTO course (courseId,courseName,courseCredit,courseSemester)
     VALUES ('$cId','$cName',$cCredit,'$cSemester');";

    if(mysqli_query($conn,$sql)){
        http_response_code(201);
    }
    else http_response_code(422);


}






