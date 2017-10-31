<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Zona</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">
    
    <?php
    include '../../business/zonabusiness/zonaBusiness.php';
    ?>
</head>

<body>
    <?php
    $zonaBusiness = new zonaBusiness();
    $allBusiness = $zonaBusiness->mostrarZona();
    ?>
    <h2>
        Zonas
        <a href="?action=registrar" class="btn btn-primary" >Nueva Zona</a>
        <a href="../ventanaprincipalview/VentanaPrincipalView.php" class="btn btn-secondary">Pagina Principal</a>
    </h2>
    <form  action="RegistroZona.php" method="Post">
        
       <table>
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Nombre</th>
                    <th>Precio</th>

                </tr>
            </thead>           
            <?php foreach ($allBusiness as $current): ?> 
                <tr><td></td>
                    <td><input type="hidden" name="zonaid" id="zonaid" value="<?php echo $current['zonaid']; ?>"></td>
                    <td><input type="text" name="zonanombre" id="zonanombre" size="10" value="<?php echo $current['zonanombre']; ?>" readonly /></td>
                    <td><input type="text" name="zonaprecio" size="10" id="zonaprecio" value="<?php echo $current['zonaprecio']; ?>" readonly /></td>

                    <td><a href="?action=editar&id=<?php echo $current['zonaid']; ?> " class="btn btn-primary">Editar</a></td>
                    <td><a href="?action=ver&id=<?php echo $current['zonaid']; ?> " class="btn btn-info">Ver mas</a></td>
                    <td><a href="?action=eliminar&id=<?php echo $current['zonaid']; ?> " class="btn btn-danger">Eliminar</a></td>

                </tr> 
            <?php endforeach ?>
        </table>
    </form>
    <?php
    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {

            case 'ver':
                $zonaObtenida = $zonaBusiness->buscarZona($_REQUEST['id']);
                foreach ($zonaObtenida as $current) {
                    echo '<form  action="RegistroZona.php" method="Post">';
                    echo '<h2>Datos de Zona</h2>';
                    echo '<p>Nombre: <input type="text" name="zonanombre" id="zonanombre" value="' . $current['zonanombre'] . '" readonly /></p>';
                    echo '<p>Precio: <input type="text" name="zonaprecio" id="zonaprecio"  value="' . $current['zonaprecio'] . '" readonly /></p>';
                    echo '<p><input type="submit" class="btn btn-primary" value="Salir" name="salir" id="salir"/></p>';
                    echo '</form>';
                }
                break;

            case 'registrar':

                echo '<form  action="../../business/zonaaccion/zonaAction.php" method="Post">';
                echo '<h2>Nueva Zona</h2>';
                echo '<p>Nombre: <input type="text" name="zonanombre" id="zonanombre" required pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"></p>';
                echo '<p>Precio: <input type="text" name="zonaprecio" id="zonaprecio" required pattern="[0-9]{3,5}"></p>';
                echo '<p><input type="submit" class="btn btn-primary" value="Registrar" name="registrar" id="registrar"/></p>';
                echo '</form>';
                break;

            case 'eliminar':

                $zonaBusiness->eliminarZona($_REQUEST['id']);

                header('Location: RegistroZona.php');

                break;

            case 'editar':

                $zonaObtenida = $zonaBusiness->buscarZona($_REQUEST['id']);
                foreach ($zonaObtenida as $current) {
                    echo '<form  action="../../business/zonaaccion/zonaAction.php" method="Post">';
                    echo '<h2>Editar Zona</h2>';
                    echo '<input type="hidden" name="zonaid" id="zonaid"  value="' . $current['zonaid'] . '"  readonly />';
                    echo '<p>Nombre: <input type="text" name="zonanombre" id="zonanombre" value="' . $current['zonanombre'] . '" pattern="([a-zA-ZñÑáéíóúÁÉÍÓÚüÜ ]{2,25})"/></p>';
                    echo '<p>Precio: <input type="text" name="zonaprecio" id="zonaprecio"  value="' . $current['zonaprecio'] . '" required pattern="[0-9]{3,5}"/></p>';
                    echo '<p><input type="submit" class="btn btn-primary" value="Actualizar" name="actualizar" id="actualizar"/></p>';
                    echo '</form>';
                }
                break;
        }
    }
    ?>
<tr>
    <td>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyField") {
                echo '<p style="color: red">Campo(s) vacio(s)</p>';
            } else if ($_GET['error'] == "numberFormat") {
                echo '<p style="color: red">Error, formato de numero</p>';
            } else if ($_GET['error'] == "dbError") {
                echo '<center><p style="color: red">Error al procesar la transacción</p></center>';
            }
        } else if (isset($_GET['success'])) {
            echo '<p style="color: green">Transacción realizada</p>';
        }
        ?>
    </td>
</tr>


</body>
</html>