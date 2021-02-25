<?php
    session_start();
    //ini_set('display_errors', 'on');

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://144.202.124.151/index.php");
    } else {

        include("../../db/pdo.php");

        $pdo = databaseConnection::getInstance();

        $decline = $pdo->declineCard($_GET["id"]);

        header("location: http://144.202.124.151/admin/cards.php");
    }
?>