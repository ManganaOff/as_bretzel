<?php
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://144.202.124.151/index.php");
    }

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $confirm = $pdo->declineRefund($_GET['id']);

    header("location: http://144.202.124.151/admin/reports.php");
?>