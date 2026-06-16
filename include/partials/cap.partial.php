<?php include 'data.partial.php' ?>
<header id="capsalera">
    <div id="divTitulo">
        <img src="/img/animales/tortugaTitulo.png" width="150px" height="150px">
        <div id="titulo">
            <h1>Apadrina un animal en perill d'extinció</h1>
        </div>
        <img src="/img/animales/tortugaTitulo.png" width="150px" height="150px">
    </div>
    <div id="formulariData">
        <?php include 'css.partial.php' ?>
    </div>
    <?php 
        if (!isset($_SESSION['nomUsuari'])) {
            include 'login.partial.php'; 
        }
    ?>
</header>