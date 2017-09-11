<!DOCTYPE html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reg Proveedor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php
  include '../../business/proveedorbusiness/ProveedorBusiness.php';
  ?>
    
</head>
<body align="center">
<?php
$ProveedorBusiness = new ProveedorBusiness();
?>
       <div class="nuevo">
        <form name="form" action="../../business/proveedoraccion/ProveedorAccion.php" method="Post" align="center">
        <strong>
            <p>
                Formulario para insertar Proveedor
            <p>  
        </strong>  
        <p> Nombre: <input type="text" name="personanombre" id="personanombre" placeholder="solo letras"/></p>
        <p> Apellido1: <input type="text" name="personaapellido1" id="personaApellido1" placeholder="solo letras"/></p>
        <p> Apellido2: <input type="text" name="personaapellido2" id="personaApellido2" placeholder="solo letras"/></p>
        <p> Telefono: <input type="text" name="personatelefono" id="personatelefono" placeholder="solo numeros"/></p>
        <p> Correo: <input type="text" name="personacorreo" id="personacorreo" placeholder="solo correo @"></p>
       <!-- <p> Descuento: <input type="text" name="clientedescuento" id="clientedescuento" placeholder="solo numeros"/></p>
        <p> Acumula: <input type="text" name="clienteacumulado" id="clienteacumulado" placeholder="solo numeros"/></p> -->
        <p> zona ID: <input type="text" name="zonaid" id="zonaid" placeholder="solo numeros"/></p>
        <!--<p> Estado: <input type="text" name="clienteestado" id="clienteestado" placeholder="solo 1 o 0"/></p> -->
        <p> Direccion: <input type="text" name="proveedordireccion" id="proveedordireccion" placeholder="solo letras"/></p>

        <br>
        <input name="nuevo" type="submit" id="nuevo" value="Registrar">

    </form>
    </div>
    <?php
    $allBusiness = $ProveedorBusiness->mostrarProveedor();
    echo '<h2>Lista de Proveedores</h2>';
    foreach ($allBusiness as $current) {
        echo '<form  action="../../business/proveedoraccion/ProveedorAccion.php" method="Post" align="center" >';
        echo '<input type="text" name="proveedorid" id="proveedorid" size="5" value="' . $current['proveedorid'] . '" readonly />';
        echo '<input type="text" name="personanombre" id="personanombre" size="5" value="' . $current['personanombre'] . '"/>';
        echo '<input type="text" name="personaapellido1" id="personaapellido1" size="5" value="' . $current['personaapellido1'] . '"/>';
        echo '<input type="text" name="personaapellido2" id="personaapellido2" size="5" value="' . $current['personaapellido2'] . '"/>';
        echo '<input type="text" name="personatelefono" id="personatelefono" size="3"  value="' . $current['personatelefono'] . '"/>';
        echo '<input type="text" name="personacorreo" id="personacorreo"  size="5" value="' . $current['personacorreo'] . '"/>';
        echo '<input type="text" name="proveedordireccion" id="proveedordireccion" value="' . $current['proveedordireccion'] . '"/>';
        echo '<input type="text" name="materiaprimaid" id="materiaprimaid" size="3"  value="' . $current['materiaprimaid'] . '"/>';
        echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
        echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
        echo '</tr>';
        echo '</form>';
    }
                echo '<h2>Buscar un Proveedor</h2>';
                echo '<form method="post" action="RegistroProveedor.php" align="center" >';
                echo '<input type="text" name="proveedorid" id="proveedorid" placeholder="    id/codigo/precio" />';
                echo '<tr>';

                echo '<td><input type="submit" value="Enviar" name="buscar" id="buscar"/></td>';
                echo '</tr>';
                echo '</form>';

    if ($_POST) {
        $proveedorid = $_POST['proveedorid'];
        if (isset($proveedorid)) {
            $buscarBusiness = $ProveedorBusiness->buscarProveedor($proveedorid);
            foreach ($buscarBusiness as $current) {
        echo '<form  action="../../business/proveedoraccion/ProveedorAccion.php" method="Post" align="center" >';
        echo '<input type="text" name="proveedorid" id="proveedorid" size="5" value="' . $current['proveedorid'] . '" readonly />';
        echo '<input type="text" name="personanombre" id="personanombre" size="5" value="' . $current['personanombre'] . '"/>';
        echo '<input type="text" name="personaapellido1" id="personaapellido1" size="5" value="' . $current['personaapellido1'] . '"/>';
        echo '<input type="text" name="personaapellido2" id="personaapellido2" size="5" value="' . $current['personaapellido2'] . '"/>';
        echo '<input type="text" name="personatelefono" id="personatelefono" size="3"  value="' . $current['personatelefono'] . '"/>';
        echo '<input type="text" name="personacorreo" id="personacorreo"  size="5" value="' . $current['personacorreo'] . '"/>';
        echo '<input type="text" name="proveedordireccion" id="proveedordireccion" value="' . $current['proveedordireccion'] . '"/>';
        echo '<input type="text" name="materiaprimaid" id="materiaprimaid" size="3"  value="' . $current['materiaprimaid'] . '"/>';
        echo '<td><input type="submit" value="Actualizar" name="actualizar" id="actualizar"/></td>';
        echo '<td><input type="submit" value="Eliminar" name="eliminar" id="eliminar"/></td>';
        echo '</tr>';
        echo '</form>';
            }
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

    <footer>
    </footer>
</body>
</html>
