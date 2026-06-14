<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <input type="hidden" name="apartat" value="<?php /** @var string $apartat */ echo $apartat; ?>">
    <label for="estil">CSS</label>
    <input type="radio" name="estil" value="roig">Roig
    <input type="radio" name="estil" value="marro">Marro
    <input type="submit" value="Canvia">
</form>
<?php
    /** @var string $data */
    echo '<span id="data">' .  $data . '</span>'; 
?>