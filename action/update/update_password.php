<?php
    session_start();
    ini_set('display_errors', 'on');

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $true_old_pwd = $pdo->getUserPassword($_SESSION['user']);
    $oldPwd = $_POST['old'];

    $newPwd = $_POST['new'];
    $confirmPwd = $_POST['confirm'];

    if($true_old_pwd == md5($oldPwd)){
        if($newPwd == $confirmPwd){
            $update = $pdo->updatePassword($_SESSION['user'], md5($newPwd));
            header("location: http://localhost/as_bretzel/main/account.php?password=success");   
        } else {
            header("location: http://localhost/as_bretzel/main/account.php?error=confirm");   
        }
    } else {
        header("location: http://localhost/as_bretzel/main/account.php?error=wrong");
    }
?>