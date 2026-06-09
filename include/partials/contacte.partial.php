<div>
    <h2 class="titolApartat">Contacte</h2>
    <form action="/include/processaContacte.php" method="POST" id="formulari">
        <div class="apartatFormulari">
            <label for="correu">Correu Electrònic:</label>
            <input type="email" name="correu" required>
        </div>
        <div class="apartatFormulari">
            <label for="assumpte">Assumpte:</label>
            <input type="text" name="assumpte" required>
        </div>
        <div class="apartatFormulari">
            <label for="missatge">Missatge: </label>
            <textarea placeholder="Escriu ací..." required name="missatge"></textarea>
        </div>
        <div id="botones" class="apartatFormulari">
            <button type="submit">Envia</button>
            <button type="reset">Reset</button>
        </div>
    </form>
</div>