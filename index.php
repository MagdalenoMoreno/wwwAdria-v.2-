<?php

session_start();

include 'include/funcions.php';


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

$error = '';
if (isset($_GET['error'])) {
    $error = trim(htmlspecialchars($_GET['error']));
}

if (isset($_POST['animalAlCarret'])) {
    $_SESSION['animalAlCarret'] = $_POST['animalAlCarret'];
} elseif (!isset($_SESSION['animalAlCarret'])) {
    $_SESSION['animalAlCarret'] = null;
}

if (isset($_POST['quantitatAnimal'])) {
    $_SESSION['quantitatAnimal'] = $_POST['quantitatAnimal'];
} elseif (!isset($_SESSION['quantitatAnimal'])) {
    $_SESSION['quantitatAnimal'] = 0;
}

include 'include/partials/cap.partial.php';

if (!isset($_SESSION['admin']) || $_SESSION['admin'] === false) {
    include 'include/partials/menu.partial.php';
}

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

    <?php include 'include/partials/peu.partial.php'; ?>

    </body>
</html>