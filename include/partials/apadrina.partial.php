<?php

    $animals = getAllAnimals();
    
?>

<div>
    <h2 class="titolApartat">Apadrina</h2>
    <h3 class="usuarisRegistrats">Animals disponibles</h3>
    <div id="animalsDisponibles">
        <?php 
            foreach ($animals as $animal) {
                echo '<div class="cardAnimal">';
                    echo '<span class="idAnimal">Id: ' . $animal['id'] . '</span>';
                    echo '<span class="nomComu">' . ucfirst($animal['nomComu']) . '</span>';
                    echo '<img src="/img/animales/' . $animal['imatge'] . '">';
                    echo '<span class="nomCientific">' . $animal['nomCientific'] . '</span>';
                    echo '<span class="descripcio">' . $animal['descripcio'] . '</span>';
                    echo '<span class="donacio">Donació: ' . $animal['donacio'] . '€</span>';
                    echo '
                    <form class="formAnimal" id="formAnimal' . $animal['id'] . '" name="formAnimal' . $animal['id'] . '" action="index.php?apartat=apadrina" method="POST" >
                        <input type="hidden" name="animalAlCarret" value="' . $animal['id'] . '">
                        <div>
                            <span>
                                <label for="quantitatAnimal">Quantitat:</label>
                            </span>
                            <span>
                                <input name="quantitatAnimal" type="number" min="0" step="1">
                            </span>
                        </div>
                        <div>
                            <span>
                                <button name="envia" type="submit">Afegeix al carret</button>
                            </span>
                        </div>
                    </form>';
                echo '</div>';
                
            }
        ?>
    </div>
</div>