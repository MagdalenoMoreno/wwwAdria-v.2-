<?php
    session_start();

    include 'funcions.php';
    
    $_SESSION['correu']   = !empty($_POST["correu"])   ? trim(htmlspecialchars($_POST["correu"]))   : ($_SESSION['correu']   ?? 'Valor Buit');
    $_SESSION['assumpte'] = !empty($_POST["assumpte"]) ? trim(htmlspecialchars($_POST["assumpte"])) : ($_SESSION['assumpte'] ?? 'Valor Buit');
    $_SESSION['missatge'] = !empty($_POST["missatge"]) ? trim(htmlspecialchars($_POST["missatge"])) : ($_SESSION['missatge'] ?? 'Valor Buit');

    if (isset($_GET['apartat'])) {
        $_SESSION['apartat'] = $_GET['apartat'];
    } elseif (!isset($_SESSION['apartat'])) {
        $_SESSION['apartat'] = 'inici';
    }

    if (isset($_GET['estil'])) {
        $_SESSION['estil'] = $_GET['estil'] . '.css';
    } elseif (!isset($_SESSION['estil'])) {
        $_SESSION['estil'] = 'estils.css';
    }

    registreAccions('CONTACTE', $_SESSION['correu']);

?>

<html>
    <head>
        <link rel="stylesheet" href="/css/estils.css">
        <link rel="stylesheet" href="/css/partials/contacte.partial.css">
        <link rel="stylesheet" href="/css/<?= $_SESSION['estil'] ?>">
        
    </head>
    <body>
        <?= include 'partials/cap.partial.php' ?>
        <main id="contenidoPrincipal">
            <div>
                <h2 class="titolApartat">Dades de Missatge de Contacte</h2>
                <div class="resposta">
                    <span>Correu electònic:  </span>
                    <?php echo $_SESSION['correu'] ?>
                </div>
                <div class="resposta">
                    <span>Assumpte: </span>
                    <?php echo ucfirst($_SESSION['assumpte']) ?>
                </div>
                <div class="resposta" id="missatge">
                    <span>Missatge: </span>
                    <table id="contenidorMissatge">
                        <?php  
                            $arrayMissatge = explode(' ', $_SESSION['missatge']);
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