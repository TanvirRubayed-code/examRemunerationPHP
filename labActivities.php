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


    $cID = $request->course_id;
    $practical_question_setter =$request->practical_question_setter;
    $practical_paper_examiner = $request->practical_paper_examiner;
    $practical_examinee = $request->practical_examinee;
    $question_writer = $request->question_writer;
    $question_photocopier = $request->question_photocopier;
    $viva_examiner1 = $request->viva_examiner1;
    $viva_examiner2 = $request->viva_examiner2;
    $viva_examiner3 = $request->viva_examiner3;
    $viva_examiner4 = $request->viva_examiner4;
    $viva_examiner5 = $request->viva_examiner5;
    $viva_examiner6 = $request->viva_examiner6;
    $practical_notebook_examiner = $request->practical_notebook_examiner;
    $total_notebook = $request->total_notebook;
    $project_examiner1 = $request->project_examiner1;
    $project_examiner2 = $request->project_examiner2;
    $total_examinee_project = $request->total_examinee_project;

    print_r($cID);
    print_r($practical_question_setter);
    print_r($practical_paper_examiner);
    print_r($practical_examinee);
    print_r($question_writer);
    print_r($question_photocopier);
    print_r($viva_examiner1);
    print_r($viva_examiner2);
    print_r($viva_examiner3);
    print_r($viva_examiner4);
    print_r($viva_examiner5);
    print_r($viva_examiner6);
    print_r($practical_notebook_examiner);
    print_r($total_notebook);
    print_r($project_examiner1);
    print_r($project_examiner2);
    print_r($total_examinee_project);


    $sql = "INSERT INTO lab_activities (course_id, pracQsetter, pracPaperExaminer, totalPracExaminee, questionWriter, questionPhotocopier, vivaExaminer1, vivaExaminer2, vivaExaminer3, vivaExaminer4, vivaExaminer5, vivaExaminer6, pracNotebookExaminer, totalNotebook, projectExaminer1, projectExaminer2, totalExamineeProject, meetingNo)
      VALUES ('$cID','$practical_question_setter','$practical_paper_examiner', '$practical_examinee', '$question_writer', '$question_photocopier', '$viva_examiner1', '$viva_examiner2', '$viva_examiner3', '$viva_examiner4', '$viva_examiner5', '$viva_examiner6', '$practical_notebook_examiner', '$total_notebook', '$project_examiner1', '$project_examiner2', '$total_examinee_project', '$meeting_no');";

    if(mysqli_query($conn,$sql)){
        http_response_code(201);
    }
    else http_response_code(422);
}