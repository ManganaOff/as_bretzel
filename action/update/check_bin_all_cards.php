<?php
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://localhost/as_bretzel/index.php");
    } else{
        include("../../db/pdo.php");

        $pdo = databaseConnection::getInstance();

        $confirm = $pdo->checkAllUnconfirmedCards();

        header("location: http://localhost/as_bretzel/admin/cards.php");
    }
?>
