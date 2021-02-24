<?php
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://144.202.124.151/index.php");
    }

    $wallet = $_POST["wallet"];

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $add_news = $pdo->addWallet($wallet);

    header("Location: ../../admin/wallets.php");
?>