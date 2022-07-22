<?php

    $connect = mysqli_connect( 'localhost', 'root', 'root', 'manao');

    if (!$connect) {
        die('Error connect to DataBase');
    }
?>