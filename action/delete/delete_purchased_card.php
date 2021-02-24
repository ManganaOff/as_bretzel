<?php
    session_start();
    ini_set('display_errors', 'on');

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $confirm = $pdo->deletePurchasedCard($_GET["order"]);

    header("location: http://144.202.124.151/main/purchases.php#modale_my_purchases_cards");
?>