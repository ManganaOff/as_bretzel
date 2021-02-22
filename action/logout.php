<?php
    session_start();
    session_destroy();
    
    ini_set('display_errors', 'on');

    header("Location: http://144.202.124.151/index.php");
?>