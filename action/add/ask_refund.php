<?php 
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://localhost/as_bretzel/index.php");
    }

    $titre = $_POST["titre"];
    $contenu = $_POST["contenu"];

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $price = $pdo->getCardInfos($_GET['card'])['price'];

    $ask = $pdo->askRefund($_GET['user'], $_GET['seller'], $price, $_GET['card']);

    header("Location: http://localhost/as_bretzel/main/purchases.php?check=refund#modale_my_purchases_cards");

?>