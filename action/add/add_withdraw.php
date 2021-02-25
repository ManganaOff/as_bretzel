<?php
    session_start();
    ini_set('display_errors', 'on');

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://144.202.124.151/index.php");
    }

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $balance = $pdo->getUserInfos($_SESSION['user'])['balance'];
    $wallet = $pdo->getUserInfos($_SESSION['user'])['wallet'];


    if(is_null($wallet)){
        header("Location: ../../index.php?amount=nowallet#modal_withdraw");
    } else {
        if(!is_numeric($_POST['amount']) || $_POST['amount'] <= 0){
            header("Location: ../../index.php?amount=mustbenumeric#modal_withdraw");
        } else {
            if($_POST['amount'] > $balance){
                header("Location: ../../index.php?amount=lowbalance#modal_withdraw");
            } else {
                $new_balance = $balance - $_POST['amount'];
                $pdo->updateBalance($_SESSION['pseudo'], $new_balance);
                $pdo->sendWithdrawRequest($_SESSION['user'], $_POST['amount'], $wallet);
                header("Location: ../../index.php?withdraw=success#modal_withdraw");
            }
        }
    }
?>