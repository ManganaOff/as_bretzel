<?php
    session_start();
    //ini_set('display_errors', 'on');

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://localhost/as_bretzel/index.php");
    } else {

        include("../../db/pdo.php");

        $pdo = databaseConnection::getInstance();

        $decline = $pdo->declineCard($_GET["id"]);

        header("location: http://localhost/as_bretzel/admin/cards.php");
    }
?>