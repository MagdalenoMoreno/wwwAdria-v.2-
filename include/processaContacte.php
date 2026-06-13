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
                    <table id="contenidorMissatge">
                        <?php  
                            $arrayMissatge = explode(' ', $missatge);
                            $columnes = ceil(sqrt(count($arrayMissatge)));
                            $files = $columnes;
                            if (count($arrayMissatge) > 36) {
                                $columnes = 6;
                                $files = count($arrayMissatge) / $columnes;
                            }
                            
                            $contador = 0;
                            for ($i=0; $i < $files; $i++) { 
                                echo '<tr>';
                                for ($j=0; $j < $columnes; $j++) { 
                                    $random = random_int(1, 5);
                                    echo '<td class="fons' . $random . '">';
                                    if (!empty($arrayMissatge[$contador])) {
                                        if (strlen($arrayMissatge[$contador]) >= 10) {
                                            echo '<li class="missatgeLlarg">' . $arrayMissatge[$contador] . '</li>';
                                        } else if (strcasecmp($arrayMissatge[$contador], 'apadrinar') === 0 || strcasecmp($arrayMissatge[$contador], 'animal') === 0) {
                                            echo '<li class="missatgeEspecial">' . $arrayMissatge[$contador] . '</li>';
                                        } else {
                                            echo '<li class="missatgeComu">' . $arrayMissatge[$contador] . '</li>';
                                        }
                                    }

                                    echo '</td>';
                                    $contador++;
                                }
                                echo '</tr>';
                            }
                        ?>
                    </table>
                </div>
            </div>
        </main>
        <?= include 'partials/peu.partial.php' ?>
    </body>
</html>