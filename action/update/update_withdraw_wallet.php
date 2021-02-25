<?php
    session_start();
    ini_set('display_errors', 'on');

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $update = $pdo->updateWithdrawWallet($_SESSION['user'], $_POST['btc_wallet']);

    header("location: http://localhost/as_bretzel/main/account.php?wallet=success");   
?>