<?php
    $username = $_POST["username"];
    $email = $_POST["email"];
    $clear_pwd = $_POST["password"];
    $password = md5($_POST["password"]);

    include("../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $is_username_used = $pdo->isUserNameUsed($username);

    if(strlen($clear_pwd) < 5){
        header("Location: ../main/register.php?error=length");
    } else {
        if(strlen($username) <= 0){
            header("Location: ../main/register.php?error=lengthusername");        
        } else {
            if($is_username_used){
                header("Location: ../main/register.php?error=taken");        
            } else {
                $id_user = $pdo->register($username, $password, $email);

                $available_wallet = $pdo->getAvailableWallet();
            
                $hash_wallet = $available_wallet['wallet'];
                $id_wallet = $available_wallet['id'];
            
                $update_wallet = $pdo->setDepositWallet($hash_wallet, $id_wallet, $id_user);
            
                header("Location: ../main/login.php?register=success");
            }
        }
    }
?>