<?php

    include "dadesAnimals.php";
    /** @var array $dadesAnimals */

    $nom              = isset($_POST["nom"]) && !empty($_POST["nom"])                   ? trim(htmlspecialchars($_POST["nom"]))         : 'Valor Buit'; 
    $cognom           = isset($_POST["cognom"]) && !empty($_POST["cognom"])             ? trim(htmlspecialchars($_POST["cognom"]))      : 'Valor Buit';
    $direccion        = isset($_POST["direccion"]) && !empty($_POST["direccion"])       ? trim(htmlspecialchars($_POST["direccion"]))   : 'Valor Buit';
    $correu           = isset($_POST["correu"]) && !empty($_POST["correu"])             ? trim(htmlspecialchars($_POST["correu"]))      : 'Valor Buit';
    $contrasenya      = isset($_POST["contrasenya"]) && !empty($_POST["contrasenya"])   ? trim(htmlspecialchars($_POST["contrasenya"])) : 'Valor Buit';
    $telefon          = isset($_POST["telefon"]) && !empty($_POST["telefon"])           ? trim(htmlspecialchars($_POST["telefon"]))     : 'Valor Buit';
    $donacio          = isset($_POST["donacio"]) && !empty($_POST["donacio"])           ? $_POST["donacio"]                             : 'Valor Buit';
    $animalApadrinat  = isset($_POST["apadrinar"]) && !empty($_POST["apadrinar"])       ? ($_POST["apadrinar"])                         : '';
    $continent        = isset($_POST["continent"]) && !empty($_POST["continent"])       ? $_POST["continent"]                           : 'Valor Buit';
    $estil            = isset($_POST["estils"]) && !empty($_POST["estils"])             ? ($_POST["estils"] . '.css')                   : 'estils.css';
    $numero           = isset($_POST["numero"]) && !empty($_POST["numero"])             ? $_POST["numero"]                              : 1;
    $rango            = isset($_POST["rango"]) && !empty($_POST["rango"])               ? $_POST["rango"]                               : 1;
    $animalsDelMes    = isset($_POST["animalMes"])                                      ? $_POST["animalMes"]                           : [];     

?>
<html>
    <head>
        <link rel="stylesheet" href="/css/estils.css">
        <link rel="stylesheet" href="/css/partials/registre.partial.css">
        <link rel="stylesheet" href="/css/<?= $estil ?>">
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
                <div class="resposta" id="animalApadrinat">
                    <span>Animal a apadrinar: </span>
                    <?php 
                        if (empty($animalApadrinat)) {
                            echo '<img src="/img/animales/usuarioGato.png" width="400px">';
                        } else {
                            echo '<span id="nomAnimal">' . $dadesAnimals[$animalApadrinat]['nom'] . '</span>';
                            echo '<img src="/img/animales/' . $animalApadrinat . '.jpg" width="400px">';
                        }
                    ?>
                    <table id="taulaDadesAnimals">
                        <tr>
                            <th colspan="2" id="titolTaula">Dades de l'animal:</th>
                        </tr>
                        <tr>
                            <th>Nom científic</th>
                            <td><?= $dadesAnimals[$animalApadrinat]['nomCientific'] ?></td>
                        </tr>
                        <tr>
                            <th>Estat de conservació</th>
                            <td><?= $dadesAnimals[$animalApadrinat]['estat'] ?></td>
                        </tr>
                            <th>Hàbitat</th>
                            <td><?= $dadesAnimals[$animalApadrinat]['habitat'] ?></td>
                        <tr>
                            <th>Alimentació</th>
                            <td><?= $dadesAnimals[$animalApadrinat]['alimentacio'] ?></td>
                        </tr>
                        <tr>
                            <th>Descripció</th>
                            <td><?= $dadesAnimals[$animalApadrinat]['descripcio'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="resposta">
                    <span>Continent: </span>
                    <?php echo ucfirst($continent) ?>
                </div>
                <div class="resposta" id="huellas">
                    <span>Puntuació: </span>
                    <div id="numeroHuellas">
                        <?= $numero . '*' . $rango; ?>
                    </div>
                    <div id="contenedorHuellas">
                        <?php 
                            for ($i=0; $i < ($numero * $rango); $i++) { 
                                echo '<img src="/img/huellas/Pata' . $numero . '.png" width="30px">';
                            }
                        ?>
                    </div>                    
                </div>
                <div class="resposta" id="contenidorAnimalMes">
                    <h2>Animals del mes</h2>
                    <div id="fotosAnimalsMes">
                        <?php
                            if (count($animalsDelMes) < 1) {
                                echo '<img src="/img/animales/usuarioGato.png" width="300px" height="300px">';
                            } else {
                                foreach ($animalsDelMes as $animal) {
                                    echo '<img src="/img/animales/' . $animal . '.jpg" width="300px" height="300px">';
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </main>
        <?= include 'partials/peu.partial.php' ?>
    </body>
</html>