<?php

session_start();
require_once 'connect.php';
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$password = md5($password . "ghjju6hb6778");

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
$user = mysqli_fetch_assoc($check_user);
if (count($user) == 0) {

    $response = [
        "status" => false,
        "message" => 'Не верный логин или пароль!'
    ];
    echo json_encode($response);
} else {
    setcookie('user', $user['name'], time() + 3600 * 24, "/");
    $response = [
        "status" => true
    ];
    echo json_encode($response);
}
