<?php
    session_start();

    if(strtoupper($_SESSION['type']) != "ADMIN"){
        header("location: http://localhost/as_bretzel/index.php");
    }

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    $pay = $pdo->payWithdraw($_GET['id']);

    header("location: http://localhost/as_bretzel/admin/withdrawals.php");
?>