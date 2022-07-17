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
        <?php
            if($_COOKIE['user'] == ''):
        ?>
        <div class="container-section">
            <h1 class="form-title"> Авторизация</h1>
            <form action="validation-form/aut.php" method="POST" class="form-fields">
                <div class="form-field">
                    <input type="text" placeholder="Логин" name="login">
                </div>
                <div class="form-field">
                    <input type="password" placeholder="Пароль" name="pass">
                </div>
                <div class="form-button">
                    <button class="button" type="submit">Войти</button>
                </div>
            </form>
        </div>
        <?php else: ?>
                <p>Hello, <?=$_COOKIE['user']?>. Чтобы выйти нажмите <a href="/exit.php">здесь</a>. </p>
        
        <?php endif;   ?>
    </div>
</body>

</html>