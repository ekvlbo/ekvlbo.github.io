<?php
 session_start();

 if ($_COOKIE['user']) {
    header('Location: ../profile.php');
 }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Веб приложение</title>
</head>

<body>
    <div class="container">
        <div class="container-section">
            <h1 class="form-title"> Авторизация</h1>
            <form>
                <div class="form-field">
                    <input type="text" id="login" name="login" placeholder="Логин">
                </div>
                <div class="form-field">
                    <input type="password" id="password" name="password" placeholder="Пароль">
                </div>
                <div class="form-button">
                    <button class="button" id="send" type="submit">Войти</button>
                </div>
                <p> У вас нет аккаунта? <a href="reg.php"> Зарегистрируйтесь!</a></p>
                <p class="msg none"> </p>
            </form>

        </div>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>