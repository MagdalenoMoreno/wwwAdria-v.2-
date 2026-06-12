<?php

    $correu   = (isset($_POST["correu"]) && !empty($_POST["correu"])) ? trim(htmlspecialchars($_POST["correu"])) : 'Valor Buit'; 
    $assumpte = (isset($_POST["assumpte"]) && !empty($_POST["assumpte"])) ? trim(htmlspecialchars($_POST["assumpte"])) : 'Valor Buit';
    $missatge = (isset($_POST["missatge"]) && !empty($_POST["missatge"])) ? trim(htmlspecialchars($_POST["missatge"])) : 'Valor Buit';

?>

<html>
    <head>
        <link rel="stylesheet" href="/css/estils.css">
        <link rel="stylesheet" href="/css/partials/contacte.partial.css">
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
                <div class="resposta" id="missatge">
                    <span>Missatge: </span>
                    <ul id="contenidorMissatge">
                        <?php  
                            $arrayMissatge = explode(' ', $missatge);
                            foreach ($arrayMissatge as $paraula) {
                                if (strlen($paraula) >= 10) {
                                    echo '<li class="missatgeLlarg">' . $paraula . '</li>';
                                } else if (strcasecmp($paraula, 'apadrinar') === 0 || strcasecmp($paraula, 'animal') === 0) {
                                    echo '<li class="missatgeEspecial">' . $paraula . '</li>';
                                } else {
                                    echo '<li class="missatgeComu">' . $paraula . '</li>';
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