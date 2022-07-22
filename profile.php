<?php
 session_start();

 if (!$_COOKIE['user']) {
    header('Location: ../index.php');
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
            <h1 class="form-title"> Профиль </h1>
            <div  class="form-field">
            
            <p>Hello, <?= $_COOKIE['user'] ?>. Чтобы выйти нажмите <a href="vendor/exit.php">здесь</a>. </p>

        </div>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>