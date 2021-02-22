<?php
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://144.202.124.151/index.php");
    }

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $confirm = $pdo->checkLuxCard($_GET['numeros'], $_GET['expm'], $_GET['expy'], $_GET['cvv']);

    header("location: http://144.202.124.151/main/purchases.php#modale_my_purchases_cards");
?>

