<?php

    $correu   = (isset($_POST["correu"]) && !empty($_POST["correu"])) ? trim(htmlspecialchars($_POST["correu"])) : 'Valor Buit'; 
    $assumpte = (isset($_POST["assumpte"]) && !empty($_POST["assumpte"])) ? trim(htmlspecialchars($_POST["assumpte"])) : 'Valor Buit';
    $missatge = (isset($_POST["missatge"]) && !empty($_POST["missatge"])) ? trim(htmlspecialchars($_POST["missatge"])) : 'Valor Buit';

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
                <h2 class="titolApartat">Dades de Missatge de Contacte</h2>
                <div class="resposta">
                    <span>Correu electònic:  </span>
                    <?php echo $correu ?>
                </div>
                <div class="resposta">
                    <span>Assumpte: </span>
                    <?php echo ucfirst($assumpte) ?>
                </div>
                <div class="resposta">
                    <span>Missatge: </span>
                    <?php echo ucfirst($missatge) ?>
                </div>
            </div>
        </main>
        <?= include 'partials/peu.partial.php' ?>
    </body>
</html>