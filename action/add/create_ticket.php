<?php
    session_start();

    $user = $_SESSION["user"];
    $object = $_POST["object"];
    $message = $_POST["message"];

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $register = $pdo->createTicket($user, $object, $message);

    header("Location: ../../main/tickets.php");
?>