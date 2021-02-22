<?php
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://localhost/as_bretzel/index.php");
    }

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $checkLux = $pdo->checkLuxCard($_GET['numeros'], $_GET['expm'], $_GET['expy'], $_GET['cvv']);

    var_dump($checkLux);
    die();

    header("location: http://localhost/as_bretzel/main/purchases.php#modale_my_purchases_cards");
?>

