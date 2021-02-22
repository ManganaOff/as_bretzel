<?php
    session_start();

    //ini_set('display_errors', 'on');

    $message = $_POST["message"];
    $id_ticket = $_POST["id_ticket"];

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $register = $pdo->sendTicketMessage($_SESSION['user'], $message, $id_ticket);

    header("Location: ../../main/tickets.php?id={$id_ticket}");
?>