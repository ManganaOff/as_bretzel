<?php
    session_start();

    ini_set('display_errors', 'on');

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    include("../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $login = $pdo->login($username, $password);

    if($login == "0"){
        header("Location:  http://144.202.124.151/main/login.php?auth=wrong");
    } else {
        $_SESSION['user'] = $login[0];
        $_SESSION['type'] = $login[1];
        $_SESSION['mail'] = $login[2];
        $_SESSION['pseudo'] = $login[3];
        $_SESSION['logged'] = true;

        header("Location: ../index.php");
    }
?>