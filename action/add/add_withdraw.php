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

    if(is_null($wallet)){
        header("Location: ../../index.php?amount=nowallet#modal_withdraw");
    } else {
        if(!is_numeric($_POST['amount'])){
            header("Location: ../../index.php?amount=mustbenumeric#modal_withdraw");
        } else {
            if($_POST['amount'] > $balance){
                header("Location: ../../index.php?amount=lowbalance#modal_withdraw");
            } else {
                header("Location: ../../index.php?withdraw=success#modal_withdraw");
            }
        }
    }
?>