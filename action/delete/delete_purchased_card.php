<?php
    session_start();
    ini_set('display_errors', 'on');

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $confirm = $pdo->deletePurchasedCard($_GET["order"]);

    header("location: http://localhost/as_bretzel/main/purchases.php#modale_my_purchases_cards");
?>