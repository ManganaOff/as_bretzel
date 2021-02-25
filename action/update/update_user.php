<?php
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://localhost/as_bretzel/index.php");
    } else {

        include("../../db/pdo.php");

        $pdo = databaseConnection::getInstance();

        if($_POST['type_user'] == 0){
            $type = "Customer";
        } else if ($_POST['type_user'] == 1){
            $type = "Seller";
        } else if ($_POST['type_user'] == 2){
            $type = "Admin";
        }

        $update = $pdo->updateUser($type, $_POST['balance'], $_POST['username']);

        header("location: http://localhost/as_bretzel/admin/users.php");   
    }
?>