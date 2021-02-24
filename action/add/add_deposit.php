<?php
    session_start();
    ini_set('display_errors', 'on');

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $balance = $pdo->getUserInfos($_SESSION['user'])['balance'];
    $wallet = $pdo->getUserInfos($_SESSION['user'])['wallet'];

    $amount = $_POST["amount"];

    $is_pending_deposit = $pdo->is_deposit_pending($_SESSION['user']);

    if(!is_numeric($amount) || strlen($amount) <= 0 || $amount <= 0){
        header("Location: ../../index.php?amount=false#modal_deposit");
    } else {
        if(!$is_pending_deposit){
            $jsnsrc = "https://blockchain.info/ticker";
            $json = file_get_contents($jsnsrc);
            $json = json_decode($json);
            $eur_btc = $json->EUR->last;

            $amount_crypto = number_format($amount / $eur_btc, 8);

            $pdo->addDeposit($_SESSION['user'], $_POST['amount'], $wallet, $amount_crypto);

            header("Location: ../../index.php?deposit=success#modal_deposit");
        } else {
            header("Location: ../../index.php?amount=pending#modal_deposit");
        }
    }
?>