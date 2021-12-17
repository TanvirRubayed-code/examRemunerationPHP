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


    $course_id = $request->course_id;
    $first_question_setter = $request->first_question_setter;
    $second_question_setter = $request->second_question_setter;
    $time_of_exam = $request->time_of_exam;
    $question_type = $request->question_type;
    $tutorial_question_setter = $request->tutorial_question_setter;
    $number_of_tutorial = $request->number_of_tutorial;
    $tutorial_examiner = $request->tutorial_examiner;
    $total_examinee_tutorial = $request->total_examinee_tutorial;
    $first_theory_examiner = $request->first_theory_examiner;
    $second_theory_examiner = $request->second_theory_examiner;
    $number_of_paper = $request->number_of_paper;
    $question_writer = $request->question_writer;
    $question_photocopier = $request->question_photocopier;



    $sql = "INSERT INTO theory_activities (courseID ,firstTheoQSetter ,secondTheoQSetter , 	timeOfExam, questionType, tutorialQSetter, 	totalTutorial, tutorialExaminer, totalTutorialExaminee, firstTheoExaminer, secondTheoExaminer, numberOfPaper, 	questionWriter, questionPhotocopier, meetingNo)
     VALUES ('$course_id','$first_question_setter','$second_question_setter','$time_of_exam', '$question_type' ,'$tutorial_question_setter', '$number_of_tutorial', '$tutorial_examiner', '$total_examinee_tutorial','$first_theory_examiner', '$second_theory_examiner', '$number_of_paper', '$question_writer', '$question_photocopier', '$meeting_no'  );";

    if(mysqli_query($conn,$sql)){
        http_response_code(201);
    }
    else http_response_code(422);


}