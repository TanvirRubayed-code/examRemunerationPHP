<?php

require './connect.php';

header("Access-Control-Allow-Origin: *");

$postdata = file_get_contents("php://input");



if(isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);


    $name = $request->teacher_name;
    $title = $request->teacher_title;
    $meeting_no = $request->meeting_no;


    $sql = "INSERT INTO exam_committee (committeeName ,title ,meetingNo)
     VALUES ('$name','$title',$meeting_no);";

    if(mysqli_query($conn,$sql)){
        http_response_code(201);
    }
    else http_response_code(422);


}


