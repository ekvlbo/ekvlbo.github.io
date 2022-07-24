<?php

session_start();
require_once 'connect.php';
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$error_fields = [];

if ($login === '') {
    $error_fields[] = 'Логин должен состоять из 6 символов';
 }
 if ($password === '' ) {
    $error_fields[] = 'Пароль должен состоять из 6 символов, наличие букв и цифр';
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => $error_fields,
        "fields" => $error_fields
    ];

    echo json_encode($response);
    die();
}
$password = md5($password . "ghjju6hb6778");

 
$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
$user = mysqli_fetch_assoc($check_user);
if (count($user) != 0) {
 
    setcookie('user', $user['name'], time() + 3600 * 24, "/");
    $response = [
        "status" => true
    ];
    echo json_encode($response);
  
} else {
     $response = [
        "status" => false,
        "message" => 'Не верный логин или пароль!'
    ];
    echo json_encode($response);
}
