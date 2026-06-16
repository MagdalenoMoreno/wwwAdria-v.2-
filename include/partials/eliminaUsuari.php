<?php
    session_start();

    include '../funcions.php';

    $id = !empty($_GET["id"]) ? $_GET["id"] : '';

    if (deleteUser($id)) {
        var_dump(deleteUser($id));
        header('Location: ../../index.php?apartat=admin&success=true&user=' . $id);
        die();
    } else {
        header('Location: ../../index.php?apartat=admin&success=false');
        die();
    }

?>