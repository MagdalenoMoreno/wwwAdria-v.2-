<?php

    /* FITXERS */

    function registreApartat($apartat): void 
    {
        comprobarEstructuraCarpetas();
        chdir($_SERVER['DOCUMENT_ROOT'] . '/log');
        $nomFitxer = 'navegacio.log';
        if (!is_file($nomFitxer)) {
            file_put_contents($nomFitxer, '');
        }

        $dia = date('d/m/Y');
        $hora = date('H:i:s');
        $numeroLineas = count(file($nomFitxer)) + 1;
        $missatge = $numeroLineas . " :: Accés a l'apartat " . strtoupper($apartat) . " el dia " . $dia . " a l'hora " . $hora . PHP_EOL;

        file_put_contents($nomFitxer, $missatge, FILE_APPEND);
        if ($numeroLineas % 10 == 0 && $numeroLineas > 1) {
            ferBackup($_SERVER['DOCUMENT_ROOT'] . '/log/backup', $_SERVER['DOCUMENT_ROOT'] . '/log/navegacio.log');
        }
    }

    function registreAccions($accio, $usuari): void 
    {
        comprobarEstructuraCarpetas();
        chdir($_SERVER['DOCUMENT_ROOT'] . '/log');
        $nomFitxer = 'accionsUsuari.log';
        if (!is_file($nomFitxer)) {
            file_put_contents($nomFitxer, '');
        }

        $dia = date('d/m/Y');
        $hora = date('H:i:s');
        $numeroLineas = count(file($nomFitxer)) + 1;
        $missatge = $numeroLineas . " :: L'usuari " . $usuari . " ha realitzat l'acció " . strtoupper($accio) . " el dia " . $dia . " a l'hora " . $hora . PHP_EOL;

        file_put_contents($nomFitxer, $missatge, FILE_APPEND);
        if ($numeroLineas % 10 == 0 && $numeroLineas > 1) {
            ferBackup($_SERVER['DOCUMENT_ROOT'] . '/log/backup', $_SERVER['DOCUMENT_ROOT'] . '/log/accionsUsuari.log');
        }
    }


    function comprobarEstructuraCarpetas(): void 
    {
        chdir($_SERVER['DOCUMENT_ROOT']);
        if (!is_dir('log')) {
            mkdir('log/backup', 0777, true);
        } else {
            chdir('log');
            if (!is_dir('backup')) {
                mkdir('backup', 0777, true);
            }
        }
    }

    function ferBackup($directori, $rutaFitxer): void 
    {
        $ruta_backup = "$directori/backup_".date("dmY_His").".log";
        copy($rutaFitxer, $ruta_backup);
    }


    /* BBDD */

    function insereixUsuari($nom, $cognoms, $email, $contrasenya): string 
    {
        $ruta = 'localhost';
        $usuari = 'adria';
        $passwd = '1234';
        $bbdd = 'projectePHP';

        if (usuariExisteix($email)) {
            return 'Error: Usuari ' . $email . ' ja existeix en la base de dades';
        }

        try {
            $conexion = mysqli_connect($ruta, $usuari, $passwd, $bbdd);
            mysqli_query($conexion, "INSERT INTO usuari (nom, cognoms, email, contrasenya) VALUES('$nom', '$cognoms', '$email', '$contrasenya')");
            return "Usuari " . $email . " inserit correctament en la base de dades";
        } catch (Exception $e) {
            return "Error: Usuari " . $email . " no s'ha pogut inserir correctament en la base de dades. " . $e;
        }
        
    }

    function usuariExisteix($email): bool 
    {   
        $ruta = 'localhost';
        $usuari = 'adria';
        $passwd = '1234';
        $bbdd = 'projectePHP';

        $conexion = mysqli_connect($ruta, $usuari, $passwd, $bbdd);
        $result = mysqli_query($conexion, "SELECT * FROM usuari WHERE email LIKE '$email'");

        return mysqli_num_rows($result) > 0 ? true : false;
    }


?>