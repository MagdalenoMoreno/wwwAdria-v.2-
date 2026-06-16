<?php

    session_start();

    include 'funcions.php';
    include "dadesAnimals.php";
    /** @var array $dadesAnimals */

    $_SESSION['nom']                 = $nom                  = !empty($_POST["nom"])                 ? trim(htmlspecialchars($_POST["nom"]))                 : ($_SESSION['nom']                 ?: 'Valor Buit');
    $_SESSION['cognom']              = $cognom               = !empty($_POST["cognom"])              ? trim(htmlspecialchars($_POST["cognom"]))              : ($_SESSION['cognom']              ?: 'Valor Buit');
    $_SESSION['direccion']           = $direccion            = !empty($_POST["direccion"])           ? trim(htmlspecialchars($_POST["direccion"]))           : ($_SESSION['direccion']           ?: 'Valor Buit');
    $_SESSION['correu']              = $correu               = !empty($_POST["correu"])              ? trim(htmlspecialchars($_POST["correu"]))              : ($_SESSION['correu']              ?: 'Valor Buit');
    $_SESSION['contrasenya']         = $contrasenya          = !empty($_POST["contrasenya"])         ? trim(htmlspecialchars($_POST["contrasenya"]))         : ($_SESSION['contrasenya']         ?: 'Valor Buit');
    $_SESSION['confirmaContrasenya'] = $confirmaContrasenya  = !empty($_POST["confirmaContrasenya"]) ? trim(htmlspecialchars($_POST["confirmaContrasenya"])) : ($_SESSION['confirmaContrasenya'] ?: 'Valor Buit');
    $_SESSION['telefon']             = $telefon              = !empty($_POST["telefon"])             ? trim(htmlspecialchars($_POST["telefon"]))             : ($_SESSION['telefon']             ?: 'Valor Buit');
    $_SESSION['donacio']             = $donacio              = !empty($_POST["donacio"])             ? trim(htmlspecialchars($_POST["donacio"]))             : ($_SESSION['donacio']             ?: 'Valor Buit');
    $_SESSION['animalApadrinat']     = $animalApadrinat      = !empty($_POST["apadrinar"])           ? trim(htmlspecialchars($_POST["apadrinar"]))           : ($_SESSION['animalApadrinat']     ?: '');
    $_SESSION['continent']           = $continent            = !empty($_POST["continent"])           ? trim(htmlspecialchars($_POST["continent"]))           : ($_SESSION['continent']           ?: 'Valor Buit');
    $_SESSION['numero']              = $numero               = !empty($_POST["numero"])              ? trim(htmlspecialchars($_POST["numero"]))              : ($_SESSION['numero']              ?: 1);
    $_SESSION['rango']               = $rango                = !empty($_POST["rango"])               ? trim(htmlspecialchars($_POST["rango"]))               : ($_SESSION['rango']               ?: 1);
    $_SESSION['animalMes']           = $animalsDelMes        = !empty($_POST["animalMes"])           ? $_POST["animalMes"]                                   : ($_SESSION['animalMes']           ?: []);
    
    $apartat = '';
    if (isset($_GET['apartat'])) {
        $_SESSION['apartat'] = $apartat = $_GET['apartat'];
    } elseif (!isset($_SESSION['apartat'])) {
        $_SESSION['apartat'] = $apartat = 'inici';
    }

    $estil = '';
    if (isset($_GET['estil'])) {
        $_SESSION['estil'] = $estil = $_GET['estil'] . '.css';
    } elseif (!empty($_GET['estil'])) {
        $_SESSION['estil'] = $estil = $_POST['estil'] . '.css';
    } else {
        $_SESSION['estil'] = $estil = $_SESSION['estil'] ?? 'estils.css';
    }

    registreAccions('REGISTRE', $correu);

    if ($contrasenya === $confirmaContrasenya) {
        $missatgeInsercio = insereixUsuari($nom, $cognom, $correu, $contrasenya);
    } else {
        header('Location: ../index.php?apartat=registre&error=contrasenya');
        die();
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="/css/estils.css">
        <link rel="stylesheet" href="/css/partials/registre.partial.css">
        <link rel="stylesheet" href="/css/<?= $_SESSION['estil'] ?>">
    </head>
    <body>
        <?php 
            include 'partials/cap.partial.php'; 
            if (!isset($_SESSION['admin']) || $_SESSION['admin'] === false) {
                include 'partials/menu.partial.php';
            }
        ?>
        
        <main id="contenidoPrincipal">
            <div>
                <?php echo "<h2 id='missatgeSql'>" . $missatgeInsercio . "</h2>"; ?>
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
                            echo<<<HTML
                                <span id="nomAnimal">{$dadesAnimals[$animalApadrinat]['nom']}</span>
                                <img src="/img/animales/{$animalApadrinat}.jpg" width="400px">
                                <table id="taulaDadesAnimals">
                                    <tr>
                                        <th colspan="2" id="titolTaula">Dades de l'animal:</th>
                                    </tr>
                                    <tr>
                                        <th>Nom científic</th>
                                        <td>{$dadesAnimals[$animalApadrinat]['nomCientific']}</td>
                                    </tr>
                                    <tr>
                                        <th>Estat de conservació</th>
                                        <td>{$dadesAnimals[$animalApadrinat]['estat']}</td>
                                    </tr>
                                        <th>Hàbitat</th>
                                        <td>{$dadesAnimals[$animalApadrinat]['habitat']}</td>
                                    <tr>
                                        <th>Alimentació</th>
                                        <td>{$dadesAnimals[$animalApadrinat]['alimentacio']}</td>
                                    </tr>
                                    <tr>
                                        <th>Descripció</th>
                                        <td>{$dadesAnimals[$animalApadrinat]['descripcio']}</td>
                                    </tr>
                                </table>
                            HTML;
                        }
                    ?>
                    
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
                                echo '<img src="/img/animales/usuarioGato.png" width="400px" height="300px">';
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
        <?php include 'partials/peu.partial.php' ?>
    </body>
</html>