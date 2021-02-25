<?php
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://144.202.124.151/index.php");
    } else {

        include("../../db/pdo.php");

        $pdo = databaseConnection::getInstance();

        $checkLux = $pdo->checkLuxCard($_GET['numeros'], $_GET['expm'], $_GET['expy'], $_GET['cvv']);

        if(strtoupper($checkLux) == "NONE"){
            $pdo->checkCard($_GET['card']);
            header("location: http://144.202.124.151/main/purchases.php?check=true#modale_my_purchases_cards");
        } else {
            $pdo->uncheckCard($_GET['card']);
            header("location: http://144.202.124.151/main/purchases.php?check=false#modale_my_purchases_cards");
        }
    }
?>

