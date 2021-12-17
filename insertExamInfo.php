<?php

require './connect.php';

header("Access-Control-Allow-Origin: *");

$postdata = file_get_contents("php://input");


if (isset($postdata) && !empty($postdata)) {
    $request = json_decode($postdata);

    $sem = [];
    $start = [];
    $end = [];

    $meetingNo = $request->meeting_no;
    $meetingDate = $request->meeting_date;
    $yearOfSem = $request->year_of_semester;

    $sem[0] = $request->sem_1_5;
    $sem[1] = $request->sem_2_6;
    $sem[2] = $request->sem_3_7;
    $sem[3] = $request->sem_4_8;

    $start[0] = $request->start_date_1;
    $start[1] = $request->start_date_2;
    $start[2] = $request->start_date_3;
    $start[3] = $request->start_date_4;

    $end[0] = $request->end_date_1;
    $end[1] = $request->end_date_2;
    $end[2] = $request->end_date_3;
    $end[3] = $request->end_date_4;



    $sql = "INSERT INTO semexam (meetingNo,meetingDate,yearOfExam)
     VALUES ('$meetingNo','$meetingDate',$yearOfSem);";

    if (mysqli_query($conn, $sql)) {
        http_response_code(201);
    } else http_response_code(422);
    for ($i = 0; $i <= 3; $i++) {
        $sql2 = "INSERT INTO exam_info (semesterNo, startDate, endDate, meetingNo) VALUES ('$sem[$i]','$start[$i]','$end[$i]','$meetingNo');";
        mysqli_query($conn, $sql2);
    }
}
