<?php
    session_start();
    ini_set('display_errors', 'on');

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://localhost/as_bretzel/index.php");
    }

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $price = $pdo->getCardInfos($_GET['id'])['price'];

    if($price < 0){
        $price = $price * (-1);
    }

    $balance = $pdo->getBalance($_SESSION['pseudo']);

    if($balance - $price >= 0){

        $new_balance = $balance - $price;
        $pdo->updateBalance($_SESSION['pseudo'], $new_balance);
        $pdo->buy($_SESSION['user'], $_GET['id'], 1);
        header("Location: ../../main/card.php?success=1");
    } else {
        header("Location: ../../main/card.php#modal_deposit");  
    }
?>