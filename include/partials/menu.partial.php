<nav id="menuNavegacio">
    <form action="/index.php" method="GET" id="menu">
        <?php 
            switch ($_SESSION['apartat']) {
                case 'inici': 
                    echo '<button class="botoMenu seleccionat" name="apartat" value="inici">Inici</button>';
                    if (!isset($_SESSION['nomUsuari'])) echo '<button class="botoMenu" name="apartat" value="registre">Registre</button>';
                    echo '
                        <button class="botoMenu" name="apartat" value="contacte">Contacte</button>
                        <button class="botoMenu" name="apartat" value="apadrina">Apadrina</button>';
                break;

                case 'registre': 
                    echo '<button class="botoMenu" name="apartat" value="inici">Inici</button>';
                    if (!isset($_SESSION['nomUsuari'])) echo '<button class="botoMenu seleccionat" name="apartat" value="registre">Registre</button>';
                    echo '
                        <button class="botoMenu" name="apartat" value="contacte">Contacte</button>
                        <button class="botoMenu" name="apartat" value="apadrina">Apadrina</button>';
                break;

                case 'contacte': 
                    echo '<button class="botoMenu" name="apartat" value="inici">Inici</button>';
                    if (!isset($_SESSION['nomUsuari'])) echo '<button class="botoMenu" name="apartat" value="registre">Registre</button>';
                    echo '
                        <button class="botoMenu seleccionat" name="apartat" value="contacte">Contacte</button>
                        <button class="botoMenu" name="apartat" value="apadrina">Apadrina</button>';
                break;

                case 'apadrina': 
                    echo '<button class="botoMenu" name="apartat" value="inici">Inici</button>';
                    if (!isset($_SESSION['nomUsuari'])) echo '<button class="botoMenu" name="apartat" value="registre">Registre</button>';
                    echo '
                        <button class="botoMenu" name="apartat" value="contacte">Contacte</button>
                        <button class="botoMenu seleccionat" name="apartat" value="apadrina">Apadrina</button>';
                break;
            }
        
        
        ?>
    </form>
</nav>