<?php
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://144.202.124.151/index.php");
    } else {

        include("../../db/pdo.php");

        $pdo = databaseConnection::getInstance();

        $confirm = $pdo->declineRefund($_GET['card']);

        header("location: http://144.202.124.151/admin/refunds.php");
    }
?>