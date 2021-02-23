<?php
    session_start();
    ini_set('display_errors', 'on');

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://localhost/as_bretzel/index.php");
    }

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $balance = $pdo->getUserInfos($_SESSION['user'])['balance'];
    $wallet = $pdo->getUserInfos($_SESSION['user'])['wallet'];

    $amount = $_POST["amount"];

    if(!is_numeric($amount) || strlen($amount) <= 0 ){
        header("Location: ../../index.php?amount=false#modal_deposit");
    } else {
        header("Location: ../../index.php?deposit=success#modal_deposit");
    }
?>