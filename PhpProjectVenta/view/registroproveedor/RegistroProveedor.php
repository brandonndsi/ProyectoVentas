<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Gestion Proveedor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--CSS-->    
    <link rel="stylesheet" href="../../css/estilo.css">

    <?php
    include '../../business/proveedorbusiness/ProveedorBusiness.php';
    ?>

</head>
<body>
    <?php
    $proveedorBusiness = new ProveedorBusiness();
    $allBusiness = $proveedorBusiness->mostrarProveedor();
    ?>
    <h2>
        Los proveedores
        <a href="?action=registrar" class="btn btn-primary" >Nuevo Proveedor</a>
        <a href="../../index.php"class="btn btn-secondary">Pagina Principal</a>
    </h2> 
    <form  action="RegistroProveedor.php" method="Post">
        <table>
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Apellido1</th>
                    <th>Apellido2</th>
                </tr>
            </thead>           
            <?php foreach ($allBusiness as $current): ?> 
                <tr>
                    <td><input type="hidden" name="proveedorid" id="proveedorid" value="<?php echo $current['proveedorid']; ?>"></td>
                    <td><input type="text" name="personanombre" class="personanombre" value="<?php echo $current['personanombre']; ?>"/> </td>
                    <td><input type="text" name="personaapellido1" class="personaapellido1" value="<?php echo $current['personaapellido1']; ?>"/> </td>
                    <td><input type="text" name="personaapellido2" class="personaapellido2" value="<?php echo $current['personaapellido2']; ?>"/> </td>

                    <td><a href="?action=editar&id=<?php echo $current['proveedorid']; ?> " class="btn btn-primary">Editar</a></td>
                    <td><a href="?action=ver&id=<?php echo $current['proveedorid']; ?> " class="btn btn-info">ver mas</a></td>
                    <td><a href="?action=eliminar&id=<?php echo $current['proveedorid']; ?> " class="btn btn-danger">Eliminar</a></td>                    
                </tr> 
            <?php endforeach ?>
        </table>
    </form>

    <?php
    if (isset($_REQUEST['action'])) {

        switch ($_REQUEST['action']) {

            case 'ver':
                $Obtenida = $proveedorBusiness->buscarProveedor($_REQUEST['id']);
                foreach ($Obtenida as $current) {
                    echo '<form  action="RegistroProveedor.php" method="Post">';
                    echo '<h2>Datos de Proveedor.</h2>';
                    echo '<td><input type="hidden" name="proveedorid" value="' . $current['proveedorid'] . '"></td>';
                    echo '<p>Nombre: <input type="text" name="personanombre" id="personanombre" 
        value="' . $current['personanombre'] . '" readonly /></p>';
                    echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1" 
         value="' . $current['personaapellido1'] . '" readonly /></p>';
                    echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2" 
         value="' . $current['personaapellido2'] . '" readonly /></p>';
                    echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono
        "  value="' . $current['personatelefono'] . '" readonly /></p>';
                    echo '<p>Correo: <input type="text" name="personacorreo" id="personacorreo
        "  value="' . $current['personacorreo'] . '" readonly /></p>';
                    echo '<p>Zona Nombre: <input type="text" name="zonanombre" id="zonanombre"
        "  value="' . $current['zonanombre'] . '"  readonly /></p>';
                    echo '<p>Direccion: <input type="text" name="proveedordireccion" id="proveedordireccion"
        "  value="' . $current['proveedordireccion'] . '"  readonly /></p>';
                    echo '<p><input type="submit" class="btn btn-primary" value="Salir" name="salir" id="salir"/></p>';
                    echo '</form>';
                }
                break;

            case 'registrar':

                echo '<form  action="../../business/proveedoraccion/ProveedorAccion.php" method="Post">';
                echo '<h2>Nuevo Proveedor</h2>';
                echo '<p>Nombre: <input type="text" name="personanombre" id="personanombre"/></p>';
                echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1"/></p>';
                echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2"/></p>';
                echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono"/></p>';
                echo '<p>Correo: <input type="text" name="personacorreo" id="personacorreo"/></p>';
                echo '<p>Zona Nombre: <input type="text" name="zonanombre" id="zonanombre"/></p>';
                echo '<p>Direccion: <input type="text" name="proveedordireccion" id="proveedordireccion"/></p>';
                echo '<p>Productos que suministra: <input type="text" name="materiaprimaid" id="materiaprimaid"/></p>';
                echo '<p><input type="submit" class="btn btn-primary" value="Registrar" name="registrar" id="registrar"/></p>';
                echo '</form>';
                break;

            case 'eliminar':

                $proveedorBusiness->eliminarProveedor($_REQUEST['id']);

                header('Location: RegistroProveedor.php');

                break;

            case 'editar':

                $Obtenida = $proveedorBusiness->buscarProveedor($_REQUEST['id']);
                foreach ($Obtenida as $current) {
                    echo '<form  action="../../business/proveedoraccion/ProveedorAccion.php" method="Post">';
                    echo '<h2>Editar Proveedor</h2>';
                    echo '<td><input type="hidden" name="proveedorid" value="' . $current['proveedorid'] . '"></td>';
                    echo '<p>Nombre: <input type="text" name="personanombre" id="personanombre" 
        value="' . $current['personanombre'] . '"/></p>';
                    echo '<p>Apellido 1: <input type="text" name="personaapellido1" id="personaapellido1" 
         value="' . $current['personaapellido1'] . '"/></p>';
                    echo '<p>Apellido 2: <input type="text" name="personaapellido2" id="personaapellido2" 
         value="' . $current['personaapellido2'] . '"/></p>';
                    echo '<p>Telefono: <input type="text" name="personatelefono" id="personatelefono
        "  value="' . $current['personatelefono'] . '"/></p>';
                    echo '<p>Correo: <input type="text" name="personacorreo" id="personacorreo
        "  value="' . $current['personacorreo'] . '"/></p>';
                    echo '<p>Zona Nombre: <input type="text" name="zonanombre" id="zonanombre"
        "  value="' . $current['zonanombre'] . '"/></p>';
                    echo '<p>Direccion: <input type="text" name="proveedordireccion" id="proveedordireccion"
        "  value="' . $current['proveedordireccion'] . '" /></p>';
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
