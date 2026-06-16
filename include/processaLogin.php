<?php
    session_start();


    include 'funcions.php';

    $email  = !empty($_POST["emailLogin"])   ? trim(htmlspecialchars($_POST["emailLogin"])) : '';
    $passwd = !empty($_POST["passwdLogin"])  ? trim(htmlspecialchars($_POST["passwdLogin"])) : '';

    if (usuariExisteix($email)) {
        $usuari = getUser($email, $passwd);
        if (isset($usuari['error'])) {
            header('Location: ../index.php?error=connexioBD');
            die();
        } else if ($usuari === null) {
            header('Location: ../index.php?error=contrasenyaLogin');
            die();
        } else {
            $_SESSION['nomUsuari'] = $usuari['nom'];
            if ($usuari['id'] == 1) {
                $_SESSION['admin'] = true;
                header('Location: ../index.php?apartat=admin');
                die();
            }
            header('Location: ../index.php');
            die();
        }
    } else {
        header('Location: ../index.php?error=correuLogin');
        die();
    }

?>