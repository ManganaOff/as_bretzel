<?php
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://144.202.124.151/index.php");
    } else {

        include("../../db/pdo.php");

        $pdo = databaseConnection::getInstance();

        $price = str_replace("$", "", $_POST['price']);

        $update = $pdo->updateCard($_POST['numbers'], 
                                $_POST['exp'], 
                                $_POST['cvv'],
                                $_POST['vbv'],
                                $_POST['holder'],
                                $_POST['address'],
                                $_POST['zip'],
                                $_POST['city'],
                                $_POST['country'],
                                $price,
                                $_POST['infos'],
                                $_POST['banque'],
                                $_POST['level'],
                                $_POST['id_card']);
    

        header("location: http://144.202.124.151/admin/cards.php");  
    } 
?>