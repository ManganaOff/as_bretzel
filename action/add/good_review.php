<?php
    session_start();
    ini_set('display_errors', 'on');
    
    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $pdo->goodReview($_GET['seller'], 1 , $_GET['type_product'], $_GET['id_product'], $_SESSION['user']);
    $pdo->reviewOrder($_GET['id_order']);
    header("Location: ../../main/purchases.php#modale_my_purchases_cards");
?>