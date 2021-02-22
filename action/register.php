<?php
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    include("../as_bretzel/db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $register = $pdo->register($username, $password, $email);
    header("Location: ../main/login.php?register=success");
?>