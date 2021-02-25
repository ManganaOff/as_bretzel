<?php
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://localhost/as_bretzel/index.php");
    }

    ini_set('display_errors', 'on');

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $confirm = $pdo->closeTicket($_GET["ticket"]);

    header("location: http://localhost/as_bretzel/admin/tickets.php");
?>