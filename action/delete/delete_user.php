<?php
    session_start();
    //ini_set('display_errors', 'on');

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://144.202.124.151/index.php");
    } else {

        include("../../db/pdo.php");

        $pdo = databaseConnection::getInstance();

        $delete = $pdo->deleteUser($_GET["user"]);

        header("location: http://144.202.124.151/admin/users.php");
    }
?>