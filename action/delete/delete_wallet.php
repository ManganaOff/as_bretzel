<?php
    session_start();
    ini_set('display_errors', 'on');

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://144.202.124.151/index.php");
    }

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $delete = $pdo->deleteWallet($_GET["wallet"]);

    header("location: http://144.202.124.151/admin/wallets.php");
?>