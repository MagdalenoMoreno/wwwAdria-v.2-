<?php

    $nom         = (isset($_POST["nom"]) && !empty($_POST["nom"])) ? trim(htmlspecialchars($_POST["nom"])) : 'Valor Buit'; 
    $cognom      = (isset($_POST["cognom"]) && !empty($_POST["cognom"])) ? trim(htmlspecialchars($_POST["cognom"])) : 'Valor Buit';
    $direccion   = (isset($_POST["direccion"]) && !empty($_POST["direccion"])) ? trim(htmlspecialchars($_POST["direccion"])) : 'Valor Buit';
    $correu      = (isset($_POST["correu"]) && !empty($_POST["correu"])) ? trim(htmlspecialchars($_POST["correu"])) : 'Valor Buit';
    $contrasenya = (isset($_POST["contrasenya"]) && !empty($_POST["contrasenya"])) ? trim(htmlspecialchars($_POST["contrasenya"])) : 'Valor Buit';
    $telefon     = (isset($_POST["telefon"]) && !empty($_POST["telefon"])) ? trim(htmlspecialchars($_POST["telefon"])) : 'Valor Buit';
    $donacio     = (isset($_POST["donacio"]) && !empty($_POST["donacio"])) ? trim(htmlspecialchars($_POST["donacio"])) : 'Valor Buit';
    $continent   = (isset($_POST["continent"]) && !empty($_POST["continent"])) ? trim(htmlspecialchars($_POST["continent"])) : 'Valor Buit';

?>
<html>
    <head>
        <link rel="stylesheet" href="/css/estils.css">
        <link rel="stylesheet" href="/css/processats.css">
    </head>
    <body>
        <?= include 'partials/cap.partial.php' ?>
        <main id="contenidoPrincipal">
            <div>
                <h2 class="titolApartat">Dades de Registre d'Usuari</h2>
                <div class="resposta">
                    <span>Nom:  </span>
                    <?php echo ucfirst($nom) ?>
                </div>
                <div class="resposta">
                    <span>Cognom: </span>
                    <?php echo ucwords($cognom, "\s")?>
                </div>
                <div class="resposta">
                    <span>Adreça: </span>
                    <?php echo ucfirst($direccion) ?>
                </div>
                <div class="resposta">
                    <span>Correu Electrònic: </span>
                    <?php echo $correu ?>
                </div>
                <div class="resposta">
                    <span>Contrasenya: </span>
                    <?php echo $contrasenya ?>
                </div>
                <div class="resposta">
                    <span>Telefon: </span>
                    <?php echo $telefon ?>
                </div>
                <div class="resposta">
                    <span>Donació: </span>
                    <?php echo $donacio ?>
                </div>
                <div class="resposta">
                    <span>Continent: </span>
                    <?php echo ucfirst($continent) ?>
                </div>
            </div>
        </main>
        <?= include 'partials/peu.partial.php' ?>
    </body>
</html>