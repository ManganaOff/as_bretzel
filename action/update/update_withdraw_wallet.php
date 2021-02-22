<?php
    session_start();
    ini_set('display_errors', 'on');

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $update = $pdo->updateWithdrawWallet($_SESSION['user'], $_POST['btc_wallet']);

    header("location: http://144.202.124.151/main/account.php?wallet=success");   
?>