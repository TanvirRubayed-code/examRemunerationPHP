
<?php

require './connect.php';

header("Access-Control-Allow-Origin: *");

$teacherInfo = file_get_contents("php://input");

if(isset($teacherInfo) && !empty($teacherInfo))
{
    $request = json_decode($teacherInfo);


    $tID = $request->tID;
    $teacherB_name = $request->teacherB_name;
    $teacherE_name = $request->teacherE_name;
    $department = $request->department;
    $title = $request->title;
    $university = $request->university;
    $mobile_no = $request->mobile_no;
    $email = $request->email;
    $password = $request->password;

    $hash_password = password_hash($password,
		PASSWORD_DEFAULT);

    print_r($request);

    $sql = "INSERT INTO teacher_info (tid,teacherB_name,teacherE_name,department,title,universityName, 	mobileNo, email,password)
     VALUES ('$tID','$teacherB_name','$teacherE_name','$department','$title','$university','$mobile_no','$email','$hash_password');";

    if(mysqli_query($conn,$sql)){
        http_response_code(201);
    }
    else http_response_code(422);


}



