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
                <h1 class="form-title"> Регистрация</h1>
                <form>
                        <input type="text" class="form-field error" id="login" name="login" placeholder="Логин">
                        <input type="password"  class="form-field error" id="password" name="password" placeholder="Пароль">
                        <input type="password" class="form-field error" id="confpass" name="confpass" placeholder="Подтвердите пароль">
                        <input type="email" class="form-field error" id="email" name="email" placeholder="Email">
                        <input type="text" class="form-field error" id="name" name="name" placeholder="Name">                  
                        <button class="reg-button" type="submit">Регистрация</button>
                    <p> У вас есть аккаунт? <a href="index.php"> Авторизируйтесь!</a></p>
                    <p class="msg none"></p>

                </form>
                
            </div>
            
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>