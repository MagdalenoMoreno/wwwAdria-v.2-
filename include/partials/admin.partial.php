<?php


    $success      = isset($_GET["success"])      ? trim(htmlspecialchars($_GET["success"])) : null;
    $user         = isset($_GET["user"])         ? trim(htmlspecialchars($_GET["user"]))    : null;
    $mostrarLog   = isset($_GET["mostrarLog"])   ? $_GET["mostrarLog"]                      : 'false';
    $accions      = ['LOGOUT' => 'logout', 
                     'REGISTRE' => 'registre', 
                     'CONTACTE' => 'contacte', 
                     'ELIMINAR USUARI' => 'eliminar', 
                     'ACCÉS CORRECTE' => 'accesCorrecte', 
                     'ACCÉS INCORRECTE' => 'accesIncorrecte']

?>

<div>
    <h2 class="titolApartat">Administració</h2>
    <h3 class="usuarisRegistrats">Usuaris Registrats</h2>
    <div id="mensajeBorrado">
        <?php  
            if ($success == true) {
                echo '<h1 class="eliminatUsuari">Usuari ' . $user . ' eliminat correctament</h1>';
            } else if ($success === false) {
                echo '<h1 class="eliminatUsuari">Error en la base de dades</h1>';
            }
        
        ?>
    </div>
    <table id="administracio">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Correu</th>
            <th>Contrasenya</th>
            <th>Acció</th>
        </tr>
        <?php 
            $allUsuaris = getAllUsers();
            foreach ($allUsuaris as $usuari) {
                echo $usuari['id'] == 1 ? '<tr class="trAdmin">' : '<tr>';
                    echo '<td>' . $usuari['id'] . '</td>';
                    echo '<td>' . $usuari['nom'] . '</td>';
                    echo '<td>' . $usuari['email'] . '</td>';
                    echo '<td>' . substr($usuari['contrasenya'], 0, 15) . '...</td>';
                    if ($usuari['id'] == 1) {
                        echo '<td><img src="/img/iconos/admin.png" width="50px"></td>';
                    } else {
                        echo '<td><a href="include/partials/eliminaUsuari.php?id=' . $usuari['id'] . '"><img src="/img/iconos/papelera.png" width="50px"></a></td>';
                    }
                echo '</tr>';
            }
        ?>
    </table>
    <?php 
        if ($mostrarLog === 'true') {
            $lineas = file($_SERVER['DOCUMENT_ROOT'] . '/log/accionsUsuari.log');
            echo '<div id="logs">';
                foreach ($lineas as $linea) {
                    foreach ($accions as $key => $value) {
                        if (str_contains($linea, $key)) {
                            echo '<span class="spanLog ' . $value . '">' . $linea . '</span>';
                            break;

                        }
                    }
                }
            echo '</div>';
            echo '<a href="/index.php?apartat=admin&mostrarLog=false" id="mostrarLog">Ocultar Logs</a>';
        } else if ($mostrarLog === 'false') {
            echo '<a href="/index.php?apartat=admin&mostrarLog=true" id="mostrarLog">Mostrar Logs</a>';
        }
    
    ?>
    
</div>