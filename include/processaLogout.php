<?php
    
    session_start();

    include 'funcions.php';
    registreAccions('LOGOUT', $_SESSION['emailUsuari'], null);
    
    session_destroy();
    unset($_SESSION);
    header("Location: ../index.php");
    die();
?>