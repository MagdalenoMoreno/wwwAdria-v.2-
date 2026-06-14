<?php

    function registreApartat($apartat) {
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

    function registreAccions($accio, $usuari) {
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


    function comprobarEstructuraCarpetas() {
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

    function ferBackup($directori, $rutaFitxer) {
        $ruta_backup = "$directori/backup_".date("dmY_His").".log";
        copy($rutaFitxer, $ruta_backup);
    }






?>