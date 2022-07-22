<?php

session_start();
require_once 'connect.php';


$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$confpass = filter_var(trim($_POST['confpass']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

if (mb_strlen($login) < 6 || mb_strlen($login) > 6) {
    $_SESSION['message'] = 'Недопустимая длина логина';
    header('Location: ../reg.php');
} else if (mb_strlen($pass) != 6 || (mb_strlen($pass) == !preg_match('/[A-Za-zА-Яа-я]+/', $pass) || mb_strlen($pass) == !preg_match('/[0-9]+/', $pass))) {
    echo "Пароль должен состоять из 6 символов, наличие букв и цифр";
    exit();
} else if (mb_strlen($confpass) != mb_strlen($pass)) {
    echo "Пароли не совпадают!";
    exit();
} else if (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
    echo "Проверьте email!";
    exit();
} else if (mb_strlen($name) != 2 || mb_strlen($name) != ctype_alpha($name)) {
    echo "Name должен состоять из 2 букв";
    exit();
}

$pass = md5($pass . "ghjju6hb6778");

$mysql = new mysqli('localhost', 'root', 'root', 'manao');
$mysql->query("INSERT INTO `users`(`login`, `password`, `email`, `name`) VALUES('$login', '$pass', '$email', '$name')");

$mysql->close();

header('Location: /');
