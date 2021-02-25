<?php
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://144.202.124.151/index.php");
    }

    $titre = $_POST["titre"];
    $contenu = $_POST["contenu"];

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $add_news = $pdo->addNews($titre, $contenu);

    header("Location: ../../admin/news.php");
?>