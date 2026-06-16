<?php
    session_start();


    include 'funcions.php';

    $email  = !empty($_POST["emailLogin"])   ? trim(htmlspecialchars($_POST["emailLogin"])) : '';
    $passwd = !empty($_POST["passwdLogin"])  ? trim(htmlspecialchars($_POST["passwdLogin"])) : '';

    if (usuariExisteix($email)) {
        $usuari = getUser($email, $passwd);
        if (isset($usuari['error'])) {
            registreAccions('ACCÉS INCORRECTE', $email, null);
            header('Location: ../index.php?error=connexioBD');
            die();
        } else if ($usuari === null) {
            registreAccions('ACCÉS INCORRECTE', $email, null);
            header('Location: ../index.php?error=contrasenyaLogin');
            die();
        } else {
            $_SESSION['nomUsuari'] = $usuari['nom'];
            $_SESSION['emailUsuari'] = $email;
            registreAccions('ACCÉS CORRECTE', $email, null);
            if ($usuari['id'] == 1) {
                $_SESSION['admin'] = true;
                header('Location: ../index.php?apartat=admin');
                die();
            }
            
            header('Location: ../index.php');
            die();
        }
    } else {
        registreAccions('ACCÉS INCORRECTE', $email, null);
        header('Location: ../index.php?error=correuLogin');
        die();
    }

?>