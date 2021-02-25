<?php
    session_start();
    ini_set('display_errors', 'on');

    include("../../db/pdo.php");
    $pdo = databaseConnection::getInstance();

    $is_card_seller = $pdo->checkCardSeller($_SESSION['user'], $_GET['id']);

    if(!$is_card_seller){
        header("location: http://144.202.124.151/index.php");
    } else {
        $delete = $pdo->deleteCard($_GET["id"]);
        header("location: http://144.202.124.151/main/store.php#modale_seller_cards");
    }
?>