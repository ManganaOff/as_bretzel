<?php
    session_start();
    ini_set('display_errors', 'on');

    $seller = $_SESSION["user"];
    //$numbers = $_POST["numbers"];
    //$exp = $_POST["exp"];
    //$cvv = $_POST["cvv"];
    $vbv = "";
    //$holder = $_POST["holder"];
    //$address = $_POST["address"];
    //$zip = $_POST["zip"];
    //$city = $_POST["city"];
    $country = "";
    //$infos = $_POST["infos"];

    include("../../db/pdo.php");

    $pdo = databaseConnection::getInstance();

    
    $target_dir = "../../import/";
    $target_file = $target_dir . uniqid(). basename($_FILES["cc_file"]["name"]);

    if (move_uploaded_file($_FILES["cc_file"]["tmp_name"], $target_file)) {
        $myFile = new SplFileObject($target_file);

        while (!$myFile->eof()) {
            //echo $myFile->fgets() . "<br>";

            //var_dump(explode("|", $myFile->fgets())[4]);
            //die();

            $infos_carte = explode("|", $myFile->fgets());

            $numbers = $infos_carte[0];
            $exp = $infos_carte[1];
            $cvv = $infos_carte[2];
            $holder = $infos_carte[3] . " " .  $infos_carte[4];

            $address = $infos_carte[5];
            $city = $infos_carte[6];
            $zip = $infos_carte[7];
            $infos = $infos_carte[8];
            $price = $infos_carte[9];

            if(strlen($numbers) > 5 && strtoupper($_SESSION['type']) == "SELLER"){
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
            } else if(strlen($numbers) > 5 && strtoupper($_SESSION['type']) == "ADMIN"){
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
            } 
        }  
        
        unlink($target_file);
    }
?>