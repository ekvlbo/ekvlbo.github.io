<?php
      session_start();
      require_once 'connect.php';
      
      setcookie('user', $user['name'], time() - 3600 * 24, "/");
      header('Location: ../index.php');
?>