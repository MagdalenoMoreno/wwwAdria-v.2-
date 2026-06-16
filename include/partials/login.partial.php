<?php
    $ruta = "";
    if (strcmp(basename($_SERVER['PHP_SELF']), "index.php") === 0) {
        $ruta = "include/";
    }
?>

<fieldset id="formulariLogin">
  <legend>Login</legend>
  <form action="<?= $ruta ?>processaLogin.php" method="POST">
    <label for="emailLogin">Correu</label>
    <input type="email" name="emailLogin" required>
    <label for="contrasenya">Contrasenya</label>
    <input type="password" name="passwdLogin" required>
    <button type="submit">Login</button>
  </form>
  <?php 
    if ($error === "contrasenyaLogin" || $error === "connexioBD" || $error === "correuLogin") {
        mostrarError($error);
    }
  ?>
</fieldset>