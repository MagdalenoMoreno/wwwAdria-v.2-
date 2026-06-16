<nav id="menuNavegacio">
    <form action="/index.php" method="GET" id="menu">
        <button class="botoMenu" name="apartat" value="inici">Inici</button>
        <?php if (!isset($_SESSION['nomUsuari'])) echo '<button class="botoMenu" name="apartat" value="registre">Registre</button>' ?>
        <button class="botoMenu" name="apartat" value="contacte">Contacte</button>
        <button class="botoMenu" name="apartat" value="apadrina">Apadrina</button>
    </form>
</nav>