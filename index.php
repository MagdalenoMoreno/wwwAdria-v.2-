<?php

$apartat = '';

if (isset($_GET['apartat'])) {
    $apartat = $_GET['apartat'];
}

include 'include/partials/cap.partial.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="./css/estils.css">
    </head>
    <body>
        <main id="contenidoPrincipal">
            <?php 
                switch($apartat) {
                    case 'inici': include './include/partials/inici.partial.php';
                        break;

                    case 'registre': include './include/partials/registre.partial.php';
                                    echo '<link rel="stylesheet" href="/css/partials/registre.partial.css">';
                        break;

                    case 'contacte': include './include/partials/contacte.partial.php';
                                    echo '<link rel="stylesheet" href="/css/partials/contacte.partial.css">';
                        break;

                    case 'apadrina': include './include/partials/apadrina.partial.php';
                                    echo '<link rel="stylesheet" href="/css/partials/apadrina.partial.css">';
                        break;
                }
            ?>
        </main>

    <?= include './include/partials/peu.partial.php'; ?>

    </body>
</html>