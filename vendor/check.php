<?php

session_start();
require_once 'connect.php';


$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$confpass = filter_var(trim($_POST['confpass']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);


if (mb_strlen($login) != 6) {
    $_SESSION['message'] = 'Недопустимая длина логина';
    header('Location: ../reg.php');
} else if (mb_strlen($password) != 6 || (mb_strlen($password) == !preg_match('/[A-Za-zА-Яа-я]+/', $password) || mb_strlen($password) == !preg_match('/[0-9]+/', $password))) {
    $_SESSION['message'] = 'Пароль должен состоять из 6 символов, наличие букв и цифр обязательно';
    header('Location: ../reg.php');
} else if (mb_strlen($confpass) != mb_strlen($password)) {
    $_SESSION['message'] = 'Пароли не совпадают!';
    header('Location: ../reg.php');
} else if (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
    $_SESSION['message'] = 'Проверьте email!';
    header('Location: ../reg.php');
} else if (mb_strlen($name) != 2 || mb_strlen($name) != ctype_alpha($name)) {
    $_SESSION['message'] = 'Name должен состоять из 2 букв';
    header('Location: ../reg.php');
} else {
    $password = md5($password . "ghjju6hb6778");
    
    mysqli_query($connect, "INSERT INTO `users`(`login`, `password`, `email`, `name`) VALUES('$login', '$password', '$email', '$name')");
    $_SESSION['message'] = 'Регистрация прошла успешно!';
    header('Location: ../index.php');
}

$mysql->close();
