<?php
    session_start();
//    ini_set('display_errors', 'on');


    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $price = $pdo->getCardInfos($_GET['id'])['price'];
    $id_seller = $pdo->getCardInfos($_GET['id'])['seller'];

    $pseudo_seller = $pdo->getUserInfos($id_seller)['username'];

    if($price < 0){
        $price = $price * (-1);
    }

    $balance = $pdo->getBalance($_SESSION['pseudo']);
    $balance_seller = $pdo->getBalance($pseudo_seller);

    if($balance - $price >= 0){

        $new_balance = $balance - $price;
        $new_balance_seller = $balance_seller + $price;

        $pdo->updateBalance($_SESSION['pseudo'], $new_balance);
        $pdo->updateBalance($pseudo_seller, $new_balance_seller);
        $pdo->buy($_SESSION['user'], $_GET['id'], 1);
        header("Location: ../../main/card.php?success=1");
    } else {
        header("Location: ../../main/card.php#modal_deposit");  
    }
?>