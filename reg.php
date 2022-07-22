<?php
    session_start();
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
                <form action="vendor/check.php" method="POST">
                    <div class="form-field">
                        <input type="text" id="login" name="login" placeholder="Логин">
                        
                    </div>
                    <div class="form-field">
                        <input type="password" id="password" name="password" placeholder="Пароль">
                    </div>
                    <div class="form-field">
                        <input type="password" id="confpass" name="confpass" placeholder="Подтвердите пароль">
                    </div>
                    <div class="form-field">
                        <input type="email" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-field">
                        <input type="text" id="name" name="name" placeholder="Name">
                    </div>

                    <button class="button" id="send" type="submit">Регистрация</button>
                   <p> У вас есть аккаунт? <a href="index.php"> Авторизируйтесь!</a></p>
                   <p class="msg">
                        <?= $_SESSION['message'] ?>
                   </p>  
                </form>
                
            </div>
            
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/reg.js"></script>
</body>

</html>