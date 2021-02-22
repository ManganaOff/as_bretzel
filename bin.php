<?php
    //echo "Test api bins.";

    /*
    $json = file_get_contents('https://api.bincodes.com/bin/?format=json&api_key=8d5fdde0d467a1d7c5a92a5df6f5d23b&bin=497355');
    $obj = json_decode($json);
    echo $obj->bank;
    var_dump($obj);
    */

    //$json = file_get_contents('https://blockchain.info/rawaddr/18phJ3NpC3FGnjK4QSx8htgHWKVF1444z7');
    //$obj = json_decode($json);
    //echo $obj->bank;
    //var_dump($obj);

    //echo $obj->total_received/100000000;


    $json = file_get_contents('https://blockchain.info/q/getblockcount');
    $obj = json_decode($json);
    //echo $obj->bank;
    var_dump($obj);
?>