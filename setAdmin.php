
<?php

require './connect.php';

header("Access-Control-Allow-Origin: *");

$adminInfo = file_get_contents("php://input");

if (isset($adminInfo) && !empty($adminInfo)) {
    $request = json_decode($adminInfo);

    $admin_name = $request->admin_name;
    $admin_username = $request->username;
    $email = $request->email;
    $password = $request->password;

    $hash_password = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    $sql = "INSERT INTO admin (admin_username,admin_name,admin_email,admin_password)
     VALUES ('$admin_username','$admin_name','$email','$hash_password');";

    if (mysqli_query($conn, $sql)) {
        http_response_code(201);
    } else http_response_code(422);
}
