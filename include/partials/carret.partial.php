<?php

    $animal = getAnimalById($_SESSION['animalAlCarret']);

?>

<div id="divCarret">
    <span id="titolCarret">Informació Carret</span>
    <span class="informacioCarret"><span>Id: </span><?= $animal['id'] ?></span>
    <span class="informacioCarret"><span><?= ucfirst($animal['nomComu']) ?></span></span>
    <span class="informacioCarret"><span>Donació: </span><?= $animal['donacio'] ?> €</span>
    <span class="informacioCarret"><span>Quantitat: </span><?= $_SESSION['quantitatAnimal'] ?></span>
    <span class="informacioCarret"><span>Total: </span><?= ($_SESSION['quantitatAnimal'] * $animal['donacio']) ?>€</span>
</div>