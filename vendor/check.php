<?php

use function PHPSTORM_META\type;

session_start();
require_once 'connect.php';


$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$confpass = filter_var(trim($_POST['confpass']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$check_login = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");
$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");

if (mysqli_num_rows($check_login) > 0 || mysqli_num_rows($check_email) > 0) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Такой логин или email уже существует в базе",
        "fields" => ['login'],
    ];

    echo json_encode($response);
    die();
}

$error_fields = [];

if (mb_strlen($login) != 6 || $login === '') {
    
    $error_fields[] = 'Недопустимая длина логина';

 }
 if ($password === '' || ($password == !preg_match('/[A-Za-zА-Яа-я]+/', $password) || $password == !preg_match('/[0-9]+/', $password))) {
    $error_fields[] = 'Пароль состоит не из 6 символов, наличие букв и цифр обязательно';
}
if ($confpass === '' || $confpass != $password) {
    $error_fields[] = 'Пароли не совпадают';
} 
if ($email === '' || !filter_var($email, FILTER_SANITIZE_EMAIL)) {
    $error_fields[] = 'Проверьте правильность email';
}
if (mb_strlen($name) != 2 || mb_strlen($name) != ctype_alpha($name)) {
    $error_fields[] = 'Поле должно состоять из двух символов, только буквы';
}
if (!empty($error_fields)) {
    
    
    $response = [
        "status" => false,
        "message" => $error_fields,
    ];

    echo json_encode($response);
    die();
}
else {
    $password = md5($password . "ghjju6hb6778");
    
    mysqli_query($connect, "INSERT INTO `users`(`login`, `password`, `email`, `name`) VALUES('$login', '$password', '$email', '$name')");
    $response = [
        "status" => true,
        "message" => "Регистрация прошла успешно!",
    ];
    echo json_encode($response);
}


