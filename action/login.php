<?php
    session_start();

    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    include("../as_bretzel/db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $login = $pdo->login($username, $password);

    if($login == "0"){
        header("Location:  http://localhost/as_bretzel/main/login.php?auth=wrong");
    } else {
        $_SESSION['user'] = $login[0];
        $_SESSION['type'] = $login[1];
        $_SESSION['mail'] = $login[2];
        $_SESSION['pseudo'] = $login[3];
        $_SESSION['logged'] = true;

        header("Location: ../index.php");
    }
?>