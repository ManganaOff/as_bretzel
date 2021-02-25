<?php
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://144.202.124.151/index.php");
    } else {

        include("../../db/pdo.php");

        $pdo = databaseConnection::getInstance();

        $confirm = $pdo->acceptRefund($_GET['card']);

        $price = $pdo->getCardInfos($_GET['card'])['price'];
    
        $balance = $pdo->getUserInfosByUsername($_GET['user'])['balance']; 

        $new_balance = $balance + $price;

        $refund_user = $pdo->updateBalance($_GET['user'], $new_balance);

        header("location: http://144.202.124.151/admin/refunds.php");
    }
?>