<?php

    include 'entity/CredencialsBD.php';
    /* FITXERS */

    function registreApartat(string $apartat): void 
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

    function registreAccions(string $accio, string $usuari, ?string $usuariAfectat): void 
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
        $missatge = '';
        if ($usuariAfectat == null) {
            $missatge = $numeroLineas . " :: L'usuari " . $usuari . " ha realitzat l'acció " . strtoupper($accio) . " el dia " . $dia . " a l'hora " . $hora . PHP_EOL;
        } else {
            $missatge = $numeroLineas . " :: L'usuari " . $usuari . " ha realitzat l'acció " . strtoupper($accio . ' ' . $usuariAfectat) . " el dia " . $dia . " a l'hora " . $hora . PHP_EOL;
        }

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

    function ferBackup(string $directori, string $rutaFitxer): void 
    {
        $ruta_backup = "$directori/backup_".date("dmY_His").".log";
        copy($rutaFitxer, $ruta_backup);
    }


    /* BBDD */

    function insereixUsuari(string $nom, string $cognoms, string $email, string $contrasenya): string 
    {
        if (usuariExisteix($email)) {
            return 'Error: Usuari ' . $email . ' ja existeix en la base de dades';
        }

        try {
            $conexion = mysqli_connect(CredencialsBD::RUTA, CredencialsBD::USUARI, CredencialsBD::PASSWD, CredencialsBD::BBDD);
            $contrasenyaXifrada = password_hash($contrasenya, PASSWORD_ARGON2I);
            mysqli_query($conexion, "INSERT INTO usuari (nom, cognoms, email, contrasenya) VALUES('$nom', '$cognoms', '$email', '$contrasenyaXifrada')");
            return "Usuari " . $email . " inserit correctament en la base de dades";
        } catch (Exception $e) {
            return "Error: Usuari " . $email . " no s'ha pogut inserir correctament en la base de dades. " . $e;
        }
        
    }

    function usuariExisteix(string $email): bool 
    {   
        try {
            $conexion = mysqli_connect(CredencialsBD::RUTA, CredencialsBD::USUARI, CredencialsBD::PASSWD, CredencialsBD::BBDD);
            $result = mysqli_query($conexion, "SELECT * FROM usuari WHERE email LIKE '$email'");
        } catch (Exception $e) {
            return "Error: Usuari " . $email . " no s'ha pogut inserir correctament en la base de dades. " . $e;
        }

        return mysqli_num_rows($result) > 0 ? true : false;
    }

    function getUserById(string $id): ?array
    {
        try {
            $conexion = mysqli_connect(CredencialsBD::RUTA, CredencialsBD::USUARI, CredencialsBD::PASSWD, CredencialsBD::BBDD);
            $idConvertido = (int) $id;
            $result = mysqli_query($conexion, "SELECT * FROM usuari WHERE id = $idConvertido");
            return mysqli_fetch_assoc($result);
        } catch (Exception $e) {
            return ['error' => 'Error interno del servidor'];
        }
    }

    function getUser(string $email, string $contrasenya): ?array 
    {
        try {
            $conexion = mysqli_connect(CredencialsBD::RUTA, CredencialsBD::USUARI, CredencialsBD::PASSWD, CredencialsBD::BBDD);
            $result = mysqli_query($conexion, "SELECT * FROM usuari WHERE email LIKE '$email'");
            $user = mysqli_fetch_assoc($result);
            if (password_verify($contrasenya, $user['contrasenya'])) {
                return $user;
            }
            return null;
        } catch (Exception $e) {
            return ['error' => 'Error interno del servidor'];
        }
    }

    function getAllUsers(): ?array
    {
        try {
            $conexion = mysqli_connect(CredencialsBD::RUTA, CredencialsBD::USUARI, CredencialsBD::PASSWD, CredencialsBD::BBDD);
            $result = mysqli_query($conexion, "SELECT * FROM usuari");
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } catch (Exception $e) {
            return ['error' => 'Error interno del servidor'];
        }
    }

    function deleteUser(string $id): bool 
    {
        try {
            $conexion = mysqli_connect(CredencialsBD::RUTA, CredencialsBD::USUARI, CredencialsBD::PASSWD, CredencialsBD::BBDD);
            $idNumero = (int) $id;
            mysqli_query($conexion, "DELETE FROM usuari WHERE id = $idNumero");
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function mostrarError(string $error) : void {
        $missatgeError = "";
        switch ($error) {
            case 'contrasenya':
                $missatgeError = "Les contrasenyes no coincideixen";
                break;
            case 'contrasenyaLogin':
                $missatgeError = "Error en la contrasenya";
                break;
            case 'correuLogin':
                $missatgeError = "No existeix cap usuari amb aquest correu";
                break;
            case 'connexioBD':
                $missatgeError = "Error en la connexió a la base de dades";
                break;
        }
        echo "<span class='contenidorError'>".$missatgeError."</span>";
    }

    
    /* ANIMALS */
    
    function getAllAnimals(): ?array 
    {   
        try {
            $conexion = mysqli_connect(CredencialsBD::RUTA, CredencialsBD::USUARI, CredencialsBD::PASSWD, CredencialsBD::BBDD);
            $result = mysqli_query($conexion, "SELECT * FROM animal");
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } catch (Exception $e) {
            return ['error' => 'Error interno del servidor'];
        }
    }

    function getAnimalById(string $id): ?array
    {
        try {
            $conexion = mysqli_connect(CredencialsBD::RUTA, CredencialsBD::USUARI, CredencialsBD::PASSWD, CredencialsBD::BBDD);
            $idNumeric = (int) $id;
            $result = mysqli_query($conexion, "SELECT * FROM animal WHERE id = $idNumeric");
            return mysqli_fetch_assoc($result);
        } catch (Exception $e) {
            return ['error' => 'Error interno del servidor'];
        }
    }


?>