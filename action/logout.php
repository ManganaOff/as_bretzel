<?php
    session_start();
    session_destroy();
    
    ini_set('display_errors', 'on');

    header("Location: http://localhost/as_bretzel/index.php");
?>