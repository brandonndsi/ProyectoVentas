<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Materia Prima</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    include '../../business/materiaprimabusiness/MateriaPrimaBusiness.php';
    ?>

</head>
<body>
    <?php
    $materiaprimabusiness = new MateriaPrimaBusiness();
    $allBusiness = $materiaprimabusiness->mostrarMateriaPrima();
    ?>
    <h2>
        Materia Prima.
    </h2>  
    <form  action="RegistroMateriaPrima.php" method="Post" >
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                </tr>
            </thead>  
            <?php foreach ($allBusiness as $current): ?>         
                <tr>
                    <td><input type="hidden" name="materiaprimaid" value="materiaprimaid"></td>
                    <td><input type="text" id="materiaprimacodigo" name="materiaprimacodigo" class="materiaprimacodigo" value="<?php echo $current['materiaprimacodigo']; ?>" readonly /> </td>
                    <td><input type="text" id="materiaprimanombre" name="materiaprimanombre" class="materiaprimanombre" value="<?php echo $current['materiaprimanombre']; ?>" readonly /> </td>
                    <td><input type="text" id="materiaprimaprecio" name="materiaprimaprecio" class="materiaprimaprecio" value="<?php echo $current['materiaprimaprecio']; ?>" readonly /> </td>

                    <td><a href="?action=editar&id=<?php echo $current['materiaprimaid']; ?> ">Modificar</a></td>
                    <td><a href="?action=eliminar&id=<?php echo $current['materiaprimaid']; ?> ">Eliminar</a></td>
                    <td><a href="?action=ver&id=<?php echo $current['materiaprimaid']; ?> ">ver</a></td>   
                </tr> 
            <?php endforeach ?>
        </table>
        <a href="?action=registrar">Nueva Materia Prima</a>
    </form>

    <?php
    if (isset($_REQUEST['action'])) {

        switch ($_REQUEST['action']) {

            case 'ver':
                $maObtenida = $materiaprimabusiness->buscarMateriaPrima($_REQUEST['id']);
                foreach ($maObtenida as $current) {
                    echo '<form  action="RegistroMateriaPrima.php" method="Post">';
                    echo '<h2>Datos Materia Prima.</h2>';
                    echo '<td><input type="hidden" name="materiaprimaid" value="' . $current['materiaprimaid'] . '"></td>';
                    echo '<p>Codigo: <input type="text" name="materiaprimacodigo" id="materiaprimacodigo" value="' . $current['materiaprimacodigo'] . '" readonly /></p>';
                    echo '<p>Nombre: <input type="text" name="materiaprimanombre" id="materiaprimanombre"  value="' . $current['materiaprimanombre'] . '" readonly /></p>';
                    echo '<p>Precio: <input type="text" name="materiaprimaprecio" id="materiaprimaprecio"  value="' . $current['materiaprimaprecio'] . '" readonly /></p>';
                    echo '<p>Cantidad: <input type="text" name="materiaprimacantidad" id="materiaprimacantidad"  value="' . $current['materiaprimacantidad'] . '" readonly /></p>';
                    echo '<p>Accion: <input type="submit" value="cerrar" name="cerrar" id="cerrar"/></p>';
                    echo '</form>';
                }
                break;

            case 'registrar':

                echo '<form  action="../../business/materiaprimaaccion/MateriaPrimaAccion.php" method="Post">';
                echo '<h2>Nueva Materia Prima</h2>';
                echo '<p>Codigo: <input type="text" name="materiaprimacodigo" id="materiaprimacodigo"/></p>';
                echo '<p>Nombre: <input type="text" name="materiaprimanombre" id="materiaprimanombre"/></p>';
                echo '<p>Precio: <input type="text" name="materiaprimaprecio" id="materiaprimaprecio"/></p>';
                echo '<p>Cantidad: <input type="text" name="materiaprimacantidad" id="materiaprimacantidad"/></p>';
                echo '<p>Accion: <input type="submit" value="Nuevo" name="nuevo" id="nuevo"/></p>';
                echo '</form>';
                break;

            case 'eliminar':

                $materiaprimabusiness->eliminarMateriaPrima($_REQUEST['id']);

                header('Location: RegistroMateriaPrima.php');

                break;

            case 'editar':

                $materiaObtenida = $materiaprimabusiness->buscarMateriaPrima($_REQUEST['id']);
                foreach ($materiaObtenida as $current) {
                    echo '<form  action="../../business/materiaprimaaccion/MateriaPrimaAccion.php" method="Post">';
                    echo '<h2>Editar Materia Prima</h2>';
                    echo '<input type="hidden" name="materiaprimaid" id="materiaprimaid"  value="' . $current['materiaprimaid'] . '"  readonly />';
                    echo '<p>Codigo: <input type="text" name="materiaprimacodigo" id="materiaprimacodigo" value="' . $current['materiaprimacodigo'] . '" /></p>';
                    echo '<p>Nombre: <input type="text" name="materiaprimanombre" id="materiaprimanombre"  value="' . $current['materiaprimanombre'] . '" /></p>';
                    echo '<p>Precio: <input type="text" name="materiaprimaprecio" id="materiaprimaprecio"  value="' . $current['materiaprimaprecio'] . '" /></p>';
                    echo '<p>Cantidad: <input type="text" name="materiaprimacantidad" id="materiaprimacantidad"  value="' . $current['materiaprimacantidad'] . '" /></p>';
                    echo '<p>Accion: <input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></p>';
                    echo '</form>';
                }
                break;
        }
    }
    ?>

    <p> <a href="../../index.php">Regresar</a> </p>

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
