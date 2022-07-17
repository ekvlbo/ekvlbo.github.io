<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $pass = md5($pass."ghjju6hb6778");

    $mysql = new mysqli('localhost', 'root', 'root', 'manao');
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
    $user = $result->fetch_assoc();
    if(count($user) == 0) {
        echo "Такой пользователь не найден";
        exit();
    }

    print_r($user);
    exit();
    $mysql->close();

    header('Location: /');
?>