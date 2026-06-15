<?php

session_start();

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

include 'include/partials/cap.partial.php';
include 'include/funcions.php';
registreApartat($_SESSION['apartat']);
?>
<html>
    <head>
        <link rel="stylesheet" href="/css/estils.css">
        <?php echo '<link rel="stylesheet" href="/css/' . $_SESSION['estil'] . '">'; ?>
        <?php echo '<link rel="stylesheet" href="/css/partials/' . $_SESSION['apartat'] . '.partial.css">'; ?>
    </head>
    <body>
        <main id="contenidoPrincipal">
            <?php 
                $includeFitxer = 'include/partials/' . $_SESSION['apartat'] . '.partial.php';
                include $includeFitxer; 
            ?>
        </main>

    <?= include './include/partials/peu.partial.php'; ?>

    </body>
</html>