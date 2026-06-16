<?php
    session_start();

    include '../funcions.php';

    $id = !empty($_GET["id"]) ? $_GET["id"] : '';
    $usuariAfectat = getUserById($id);

    if (deleteUser($id)) {
        registreAccions('ELIMINAR USUARI', $_SESSION['emailUsuari'], $usuariAfectat['email']);
        header('Location: ../../index.php?apartat=admin&success=true&user=' . $id);
        die();
    } else {
        header('Location: ../../index.php?apartat=admin&success=false');
        die();
    }

?>