<?php
    session_start();

    $seller = $_SESSION["user"];
    $numbers = $_POST["numbers"];
    $exp = $_POST["exp"];
    $cvv = $_POST["cvv"];
    $vbv = $_POST["vbv"];
    $holder = $_POST["holder"];
    $address = $_POST["address"];
    $zip = $_POST["zip"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $price = $_POST["price"];
    $infos = $_POST["infos"];

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $add_card = $pdo->addCard($numbers, 
                              $exp, 
                              $cvv,
                              $vbv,
                              $holder,
                              $address,
                              $zip,
                              $city,
                              $price,
                              $infos,
                              $seller);

    header("Location: ../../main/card.php?send=success");
?>