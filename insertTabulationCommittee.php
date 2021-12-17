<?php

require './connect.php';

header("Access-Control-Allow-Origin: *");

$postdata = file_get_contents("php://input");


$metSql = "SELECT meetingNo from semexam ORDER BY meetingNo DESC LIMIT 1";
$res = mysqli_query($conn,$metSql);
if ($res->num_rows > 0 ) {
    $i = 0;
    while ($row = $res->fetch_assoc()) {
        $meeting_no = $row['meetingNo'];
        
        $i++;
    }
} 




if(isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);


    $tabulationMem1 = $request->tabulation_mem_1;
    $tabulationMem2 = $request->tabulation_mem_2;
    $tabulationMem3 = $request->tabulation_mem_3;
    $gradesheetWriter = $request->gradesheet_writer;
    $gradesheet_examiner_1 = $request->gradesheet_examiner_1;
    $gradesheet_examiner_2 = $request->gradesheet_examiner_2;
    $scrutiny = $request->scrutiny;
    $totalExaminee = $request->total_examinee;


    $sql = "INSERT INTO tabulation_committee (tabMember1 ,tabMember2 ,tabMember3 , gradesheetWriter, gradesheetExaminer1, gradesheetExaminer2, scrutiny, totalExaminee, meetingNo)
     VALUES ('$tabulationMem1','$tabulationMem2','$tabulationMem3','$gradesheetWriter', '$gradesheet_examiner_1' ,'$gradesheet_examiner_2', '$scrutiny', '$totalExaminee', '$meeting_no');";

    if(mysqli_query($conn,$sql)){
        http_response_code(201);
    }
    else http_response_code(422);


}


