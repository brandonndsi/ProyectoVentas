<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Zona CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
    include '../../business/zonabusiness/zonaBusiness.php';
    ?>
</head>

<body>
    <?php
    $zonaBusiness = new zonaBusiness();
    $allBusiness = $zonaBusiness->mostrarZona();
    ?>
    <h2>Zonas</h2>
        <form  action="RegistroZona.php" method="Post">
        <table><!-- lo que hace es poder inicailizar la tabla -->
        <thead><!-- para poder asignar los valores de la tabla -->
            <tr>
                 <th></th>
                 <th>Nombre</th>
                 <th>Precio</th>
            </tr>
        </thead>

       <?php foreach ($allBusiness as $current): ?>
            <tr>
            <td><input type="hidden" name="zonaid" id="zonaid" value="<?php echo $current['zonaid'];?>"></td>
            <td><input type="text" name="zonanombre" id="zonanombre" size="10" value="<?php echo $current['zonanombre']; ?>" readonly /></td>
            <td><input type="text" name="zonaprecio" size="10" id="zonaprecio" value="<?php echo $current['zonaprecio']; ?>" readonly /></td>

            <td><a href="?action=editar&id=<?php echo $current['zonaid']; ?> ">Modificar</a></td>
            <td><a href="?action=eliminar&id=<?php echo $current['zonaid']; ?> ">Eliminar</a></td>
            <td><a href="?action=ver&id=<?php echo $current['zonaid']; ?> ">ver</a></td>
            </tr>
        <?php endforeach ?>
            </table>
            <a href="?action=registrar">Nueva Zona</a>
        </form>
        <?php
        if(isset($_REQUEST['action'])){
    switch($_REQUEST['action']){

        case 'ver':
             $zonaObtenida= $zonaBusiness->buscarZona($_REQUEST['id']);
            foreach ($zonaObtenida as $current) {
        echo '<form  action="RegistroZona.php" method="Post">';
        echo '<h2>Datos de Zona</h2>';
        echo '<p>Nombre: <input type="text" name="zonanombre" id="zonanombre" value="' . $current['zonanombre'] . '" readonly /></p>';
        echo '<p>Precio: <input type="text" name="zonaprecio" id="zonaprecio"  value="' . $current['zonaprecio'] . '" readonly /></p>';
        echo '<p>Accion: <input type="submit" value="cerrar" name="cerrar" id="cerrar"/></p>';
        echo '</form>';
            }
            break;

        case 'registrar':

        echo '<form  action="../../business/zonaaccion/zonaAction.php" method="Post">';
        echo '<h2>Nueva Zona</h2>';
        echo '<p>Nombre: <input type="text" name="zonanombre" id="zonanombre"></p>';
        echo '<p>Precio: <input type="text" name="zonaprecio" id="zonaprecio"></p>';
        echo '<p>Accion: <input type="submit" value="Nuevo" name="nuevo" id="nuevo"/></p>';
        echo '</form>';
            break;

        case 'eliminar':

            $zonaBusiness->eliminarZona($_REQUEST['id']);

            header('Location: RegistroZona.php');

            break;

        case 'editar':

            $zonaObtenida= $zonaBusiness->buscarZona($_REQUEST['id']);
            foreach ($zonaObtenida as $current) {
        echo '<form  action="../../business/zonaaccion/zonaAction.php" method="Post">';
        echo '<h2>Editar Zona</h2>';
        echo '<input type="hidden" name="zonaid" id="zonaid"  value="' . $current['zonaid'] . '"  readonly />';
        echo '<p>Nombre: <input type="text" name="zonanombre" id="zonanombre" value="' . $current['zonanombre'] . '"/></p>';
        echo '<p>Precio: <input type="text" name="zonaprecio" id="zonaprecio"  value="' . $current['zonaprecio'] . '"/></p>';
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