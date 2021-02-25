<?php
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://144.202.124.151/index.php");
    } else {

        //ini_set('display_errors', 'on');

        include("../../db/pdo.php");

        $pdo = databaseConnection::getInstance();

        $confirm = $pdo->closeTicket($_GET["ticket"]);

        header("location: http://144.202.124.151/admin/tickets.php");
    }
?>