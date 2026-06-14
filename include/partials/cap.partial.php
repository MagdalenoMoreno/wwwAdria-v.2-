<?php 
    include 'data.partial.php' 
    
?>
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
    
</header> 
<nav id="menuNavegacio">
    <form action="/index.php" method="POST" id="menu">
        <button class="botoMenu" name="apartat" value="inici">Inici</button>
        <button class="botoMenu" name="apartat" value="registre">Registre</button>
        <button class="botoMenu" name="apartat" value="contacte">Contacte</button>
        <button class="botoMenu" name="apartat" value="apadrina">Apadrina</button>
    </form>
</nav>