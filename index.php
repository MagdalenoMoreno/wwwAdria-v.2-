<?php

$apartat = isset($_POST['apartat']) ? $_POST['apartat']         : '';
$estil   = isset($_POST['estil'])   ? ($_POST['estil'] . '.css') : '';

include 'include/partials/cap.partial.php';
include 'include/funcions.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="/css/estils.css">
        <?php 
            echo $estil;
            if (!empty($estil)) echo '<link rel="stylesheet" href="/css/' . $estil . '">'
        ?>
    </head>
    <body>
        <main id="contenidoPrincipal">
            <?php 
                switch($apartat) {
                    case 'inici': 
                        include './include/partials/inici.partial.php';
                        registreApartat($apartat);
                    break;

                    case 'registre': 
                        include './include/partials/registre.partial.php';
                        echo '<link rel="stylesheet" href="/css/partials/registre.partial.css">';
                        registreApartat($apartat);
                    break;

                    case 'contacte': 
                        include './include/partials/contacte.partial.php';
                        echo '<link rel="stylesheet" href="/css/partials/contacte.partial.css">';
                        registreApartat($apartat);
                    break;

                    case 'apadrina': 
                        include './include/partials/apadrina.partial.php';
                        echo '<link rel="stylesheet" href="/css/partials/apadrina.partial.css">';
                        registreApartat($apartat);
                    break;
                }
            ?>
        </main>

    <?= include './include/partials/peu.partial.php'; ?>

    </body>
</html>