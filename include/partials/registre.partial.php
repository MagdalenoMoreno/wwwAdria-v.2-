<div>
    <h2 class="titolApartat">Registre</h2>
    <form action="/include/processaRegistre.php" method="POST" id="formulari">
        <div class="apartatFormulari">
            <label for="nom">Nom:</label>
            <input type="text" name="nom" required>
        </div>
        <div class="apartatFormulari">
            <label for="cognom">Cognoms:</label>
            <input type="text" name="cognom">
        </div>
        <div class="apartatFormulari">
            <label for="direccion">Adreça:</label>
            <input type="text" name="direccion">
        </div>
        <div class="apartatFormulari">
            <label for="correu">Correu Electrònic:</label>
            <input type="email" name="correu" required>
        </div>
        <div class="apartatFormulari">
            <label for="contrasenya">Contrasenya:</label>
            <input type="password" name="contrasenya" required>
        </div>
        <div class="apartatFormulari">
            <label for="telefon">Telèfon:</label>
            <input type="tel" name="telefon" pattern="[0-9]{3}[\s-]*[0-9]{3}[\s-]*[0-9]{3}">
        </div>
        <div class="apartatFormulari">
            <label for="donacio">Donació:</label>
            <select name="donacio" id="donacio">
                <option value="" disabled selected>-- Tria una opció --</option>
                <option value="res">Res</option>
                <option value="1">1€</option>
                <option value="20">20€</option>
                <option value="100">100€</option>
            </select>
        </div>
        <div class="apartatFormulari">
            <label for="apadrinar">Animal a apadrinar:</label>
            <select name="apadrinar" id="apadrinar">
                <option value="" disabled selected>-- Tria una opció --</option>
                <option value="orangutan">Orangutan</option>
                <option value="rinoceronte">Rinoceronte</option>
                <option value="tigre">Tigre</option>
                <option value="tortuga">Tortuga</option>
            </select>
        </div>
        <div id="radios" class="apartatFormulari">
            <label for="continent">Continent:</label>
            Europa: <input type="radio" name="continent" value="europa">
            Àsia: <input type="radio" name="continent" value="asia">
            Àfrica: <input type="radio" name="continent" value="africa">
            Amèrica: <input type="radio" name="continent" value="america">
            Oceania: <input type="radio" name="continent" value="oceania">
        </div>
        <div id="estil" class="apartatFormulari">
            <label for="estils">Estils Registre:</label>
            <input type="radio" name="estils" value="roig">Roig
            <input type="radio" name="estils" value="marro">Marró
        </div>
        <div id="puntuar" class="apartatFormulari">
            <label for="puntuacio">Puntua la pàgina (1-5)</label>
            <input type="number" min="1" max="5" name="numero" value="1">
            <input type="range" min="1" max="100" name="rango" value="1">
        </div>
        <div id="botones" class="apartatFormulari">
            <button type="submit">Envia</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</div>